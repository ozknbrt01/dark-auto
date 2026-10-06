<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;

class VendorDashboard extends Component
{
    public $shippingCompany = [];
    public $trackingNumber = [];

    public function render()
    {
        $user = auth()->user();
        $vendor = $user->vendor; // assuming user has vendor relationship, or we can fetch by vendor_id if not present. Let's assume vendor model exists.
        
        if (!$vendor) {
            // Check if vendor exists in DB based on user_id
            $vendor = \App\Models\Vendor::where('user_id', $user->id)->first();
            if(!$vendor) {
                // If it's a many-to-many from users to vendors, we'll get the first one
                $vendor = $user->vendors()->first();
            }
            if (!$vendor) {
                abort(403, 'Satıcı yetkiniz bulunmuyor.');
            }
        }

        $todaysSales = OrderItem::where('vendor_id', $vendor->id)
            ->whereDate('created_at', today())
            ->sum('total_price');

        $pendingOrdersCount = OrderItem::where('vendor_id', $vendor->id)
            ->whereHas('order', function ($q) {
                $q->where('status', 'pending');
            })
            ->count();

        $lowStockCount = Product::where('vendor_id', $vendor->id)
            ->where('stock_quantity', '<=', 5)
            ->count();

        $totalEarnings = OrderItem::where('vendor_id', $vendor->id)
            ->sum('total_price');

        // ADIM 2: SATICI SORGUSUNU EN SAĞLAM HALİYLE YAZ
        // Satıcı ID'si (Burada Vendor tablosu varsa onun id'si, yoksa auth()->id() kullanılır)
        $vendorId = $vendor ? $vendor->id : auth()->id();

        $pendingOrders = \App\Models\Order::whereHas('items', function ($query) use ($vendorId) {
            $query->whereHas('product', function ($q) use ($vendorId) {
                // Eğer ürünler tablosunda satıcıyı 'vendor_id' ile tutuyorsanız:
                $q->where('vendor_id', $vendorId);
            });
        })
        ->with(['user', 'items' => function($query) use ($vendorId) {
            $query->whereHas('product', function($q) use ($vendorId) {
                $q->where('vendor_id', $vendorId);
            })->with('product');
        }])
        ->where('status', 'pending')
        ->latest()
        ->get();

        return view('livewire.vendor-dashboard', [
            'vendor' => $vendor,
            'todaysSales' => $todaysSales,
            'pendingOrdersCount' => $pendingOrdersCount,
            'lowStockCount' => $lowStockCount,
            'totalEarnings' => $totalEarnings,
            'pendingOrders' => $pendingOrders,
        ])->layout('layouts.store');
    }

    public function shipOrder($orderId)
    {
        $order = Order::find($orderId);
        if($order) {
            $company = $this->shippingCompany[$orderId] ?? null;
            $tracking = $this->trackingNumber[$orderId] ?? null;

            $order->update([
                'status' => 'shipped',
                'shipping_company' => $company,
                'tracking_number' => $tracking
            ]);
            session()->flash('message', 'Sipariş kargoya verildi olarak güncellendi.');
        }
    }

    public function cancelOrder($orderId)
    {
        $order = Order::find($orderId);
        if($order) {
            $order->update(['status' => 'cancelled']);
            session()->flash('error', 'Sipariş iptal edildi.');
        }
    }
}
