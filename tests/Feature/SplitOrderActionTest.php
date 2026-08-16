<?php

namespace Tests\Feature;

use App\Actions\Orders\CreateSplitOrderAction;
use App\Enums\SubOrderStatus;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Tests\TestCase;

class SplitOrderActionTest extends TestCase
{
    public function test_it_creates_master_order_and_splits_sub_orders_per_vendor(): void
    {
        // 1. İki farklı satıcı oluştur
        $userA = User::create(['name' => 'Vendor A Owner', 'email' => 'vendorA@test.com', 'password' => 'pass123']);
        $vendorA = Vendor::create([
            'user_id' => $userA->id,
            'store_name' => 'Bosch Yetkili Bayi',
            'slug' => 'bosch-bayi',
            'commission_rate' => 10.00, // %10
            'status' => 'active',
        ]);

        $userB = User::create(['name' => 'Vendor B Owner', 'email' => 'vendorB@test.com', 'password' => 'pass123']);
        $vendorB = Vendor::create([
            'user_id' => $userB->id,
            'store_name' => 'Castrol Madeni Yağlar',
            'slug' => 'castrol-magaza',
            'commission_rate' => 15.00, // %15
            'status' => 'active',
        ]);

        // 2. Ürünleri oluştur
        $productA = Product::create([
            'vendor_id' => $vendorA->id,
            'title' => 'Bosch Buji Seti',
            'oem_code' => 'FR7DC+',
            'slug' => 'bosch-buji-seti',
            'sku' => 'BSH-01',
            'price' => 500.00,
            'stock_quantity' => 20,
            'is_universal' => true,
            'status' => 'published',
        ]);

        $productB = Product::create([
            'vendor_id' => $vendorB->id,
            'title' => 'Castrol Edge 5W-30 4L',
            'oem_code' => 'CAS-5W30-4L',
            'slug' => 'castrol-edge-5w30',
            'sku' => 'CST-04',
            'price' => 1000.00,
            'stock_quantity' => 15,
            'is_universal' => true,
            'status' => 'published',
        ]);

        // 3. Müşteri sepeti: 2 adet Buji (1.000 TL), 1 adet Yağ (1.000 TL) -> Toplam: 2.000 TL
        $cartItems = [
            ['product_id' => $productA->id, 'quantity' => 2],
            ['product_id' => $productB->id, 'quantity' => 1],
        ];

        $customerData = [
            'customer_name' => 'Ahmet Yılmaz',
            'customer_email' => 'ahmet@example.com',
            'customer_phone' => '05551234567',
            'shipping_address' => ['address' => 'Kadıköy, İstanbul'],
            'billing_address' => ['address' => 'Kadıköy, İstanbul'],
            'user_id' => null,
        ];

        $paymentData = [
            'method' => 'credit_card',
            'transaction_id' => 'TXN_TEST_12345',
        ];

        // 4. Action'ı Çalıştır
        $action = new CreateSplitOrderAction();
        $order = $action->execute($customerData, $cartItems, $paymentData);

        // 5. Doğrulamalar (Assertions)
        // Ana Sipariş Kontrolleri
        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals(2000.00, (float) $order->grand_total);
        $this->assertEquals('paid', $order->payment_status);
        $this->assertEquals('Ahmet Yılmaz', $order->customer_name);

        // 2 Ayrı Satıcı için 2 Alt Sipariş (Sub-Order) oluşmalı
        $this->assertCount(2, $order->subOrders);

        // Vendor A Alt Siparişi: 1.000 TL, %10 komisyon -> 100 TL komisyon, 900 TL hakediş
        $subOrderA = $order->subOrders()->where('vendor_id', $vendorA->id)->first();
        $this->assertNotNull($subOrderA);
        $this->assertEquals(1000.00, (float) $subOrderA->subtotal);
        $this->assertEquals(100.00, (float) $subOrderA->commission_amount);
        $this->assertEquals(900.00, (float) $subOrderA->vendor_earnings);
        $this->assertEquals(SubOrderStatus::PENDING, $subOrderA->status);
        $this->assertCount(1, $subOrderA->items);

        // Vendor B Alt Siparişi: 1.000 TL, %15 komisyon -> 150 TL komisyon, 850 TL hakediş
        $subOrderB = $order->subOrders()->where('vendor_id', $vendorB->id)->first();
        $this->assertNotNull($subOrderB);
        $this->assertEquals(1000.00, (float) $subOrderB->subtotal);
        $this->assertEquals(150.00, (float) $subOrderB->commission_amount);
        $this->assertEquals(850.00, (float) $subOrderB->vendor_earnings);

        // Stokların düştüğünü doğrula
        $this->assertEquals(18, $productA->fresh()->stock_quantity);
        $this->assertEquals(14, $productB->fresh()->stock_quantity);
    }
}
