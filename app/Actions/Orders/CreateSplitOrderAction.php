<?php

namespace App\Actions\Orders;

use App\Enums\SubOrderStatus;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubOrder;
use App\Models\Vendor;
use Exception;
use Illuminate\Support\Facades\DB;

class CreateSplitOrderAction
{
    public function execute(array $customerData, array $cartItems, array $paymentData): Order
    {
        return DB::transaction(function () use ($customerData, $cartItems, $paymentData) {
            $productIds = collect($cartItems)->pluck('product_id')->toArray();
            $products = Product::with(['vendor'])->whereIn('id', $productIds)->lockForUpdate()->get()->keyBy('id');

            $grandSubtotal = 0;
            $itemsGroupedByVendor = [];

            foreach ($cartItems as $item) {
                $product = $products->get($item['product_id']);

                if (!$product) {
                    throw new Exception("Ürün bulunamadı (ID: {$item['product_id']})");
                }

                if ($product->stock_quantity < $item['quantity']) {
                    throw new Exception("'{$product->name}' için yeterli stok bulunmuyor. Kalan stok: {$product->stock_quantity}");
                }

                $itemTotal = $product->price * $item['quantity'];
                $grandSubtotal += $itemTotal;

                $itemsGroupedByVendor[$product->vendor_id][] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->price,
                    'total_price' => $itemTotal,
                ];

                $product->decrement('stock_quantity', $item['quantity']);
            }

            $orderNumber = 'ORD-' . strtoupper(date('Ymd')) . '-' . rand(1000, 9999);
            $order = Order::create([
                'order_number' => $orderNumber,
                'user_id' => $customerData['user_id'] ?? null,
                'subtotal' => $grandSubtotal,
                'shipping_total' => 0.00,
                'discount_total' => 0.00,
                'grand_total' => $grandSubtotal,
                'payment_status' => 'paid',
                'payment_method' => $paymentData['method'] ?? 'credit_card',
                'payment_transaction_id' => $paymentData['transaction_id'] ?? null,
                'status' => 'processing',
                'customer_name' => $customerData['customer_name'],
                'customer_email' => $customerData['customer_email'],
                'customer_phone' => $customerData['customer_phone'],
                'shipping_address' => $customerData['shipping_address'],
                'billing_address' => $customerData['billing_address'],
                'notes' => $customerData['notes'] ?? null,
            ]);

            $subOrderIndex = 1;
            foreach ($itemsGroupedByVendor as $vendorId => $vendorItems) {
                $vendor = Vendor::findOrFail($vendorId);
                $subOrderSubtotal = collect($vendorItems)->sum('total_price');

                $commissionRate = $vendor->commission_rate;
                $commissionAmount = round(($subOrderSubtotal * $commissionRate) / 100, 2);
                $vendorEarnings = $subOrderSubtotal - $commissionAmount;

                $subOrderNumber = "{$orderNumber}-{$subOrderIndex}";
                $subOrderIndex++;

                $subOrder = SubOrder::create([
                    'sub_order_number' => $subOrderNumber,
                    'order_id' => $order->id,
                    'vendor_id' => $vendor->id,
                    'subtotal' => $subOrderSubtotal,
                    'shipping_fee' => 0.00,
                    'commission_rate' => $commissionRate,
                    'commission_amount' => $commissionAmount,
                    'vendor_earnings' => $vendorEarnings,
                    'status' => SubOrderStatus::PENDING,
                ]);

                foreach ($vendorItems as $vItem) {
                    $subOrder->items()->create([
                        'order_id' => $order->id,
                        'product_id' => $vItem['product']->id,
                        'vendor_id' => $vendor->id,
                        'product_name' => $vItem['product']->title,
                        'sku' => $vItem['product']->sku,
                        'brand_name' => $vItem['product']->vendor?->store_name ?? 'OEM',
                        'unit_price' => $vItem['unit_price'],
                        'quantity' => $vItem['quantity'],
                        'total_price' => $vItem['total_price'],
                    ]);
                }
            }

            return $order;
        });
    }
}
