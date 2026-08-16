<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function show(): View
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        return view('checkout', compact('cart', 'total'));
    }

    public function store(Request $request): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Sepetinizde ürün bulunmuyor.');
        }

        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'customer_email' => 'required|email|max:100',
            'customer_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string|max:500',
            'notes' => 'nullable|string|max:500',
        ], [
            'customer_name.required' => 'Lütfen adınızı ve soyadınızı girin.',
            'customer_email.required' => 'Lütfen geçerli bir e-posta adresi girin.',
            'customer_phone.required' => 'Lütfen telefon numaranızı girin.',
            'shipping_address.required' => 'Lütfen teslimat adresinizi eksiksiz girin.',
        ]);

        $totalAmount = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        $order = DB::transaction(function () use ($validated, $cart, $totalAmount) {
            $orderNumber = 'ORD-' . strtoupper(date('Ymd')) . '-' . rand(1000, 9999);

            $order = Order::create([
                'order_number' => $orderNumber,
                'user_id' => auth()->id() ?? null,
                'subtotal' => $totalAmount,
                'total_amount' => $totalAmount,
                'grand_total' => $totalAmount,
                'shipping_total' => 0.00,
                'discount_total' => 0.00,
                'payment_status' => 'pending',
                'payment_method' => 'cash_on_delivery',
                'status' => 'pending',
                'shipping_address' => $validated['shipping_address'],
                'billing_address' => $validated['shipping_address'],
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($cart as $item) {
                $order->items()->create([
                    'product_id' => $item['product_id'],
                    'vendor_id' => $item['vendor_id'],
                    'quantity' => (int) $item['quantity'],
                    'unit_price' => (float) $item['price'],
                    'total_price' => (float) ($item['price'] * $item['quantity']),
                    'product_name' => $item['title'] ?? null,
                    'sku' => $item['sku'] ?? null,
                ]);
            }

            return $order;
        });

        session()->forget('cart');

        return redirect()->route('order.success', ['orderNumber' => $order->order_number]);
    }

    public function success(string $orderNumber): View
    {
        $order = Order::with(['items.product', 'items.vendor'])
            ->where('order_number', $orderNumber)
            ->firstOrFail();

        return view('order-success', compact('order'));
    }
}
