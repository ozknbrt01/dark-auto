<?php

namespace Tests\Feature;

use App\Livewire\AddToCartButton;
use App\Livewire\CartCounter;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Livewire\Livewire;
use Tests\TestCase;

class CartAndCheckoutTest extends TestCase
{
    protected User $user;
    protected Vendor $vendorA;
    protected Vendor $vendorB;
    protected Product $productA;
    protected Product $productB;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create(['name' => 'Owner', 'email' => 'owner@test.com', 'password' => '123456']);

        $this->vendorA = Vendor::create([
            'user_id' => $this->user->id,
            'store_name' => 'Bosch Fren Merkezi',
            'slug' => 'bosch-fren',
            'commission_rate' => 10.00,
            'status' => 'active',
        ]);

        $this->vendorB = Vendor::create([
            'user_id' => $this->user->id,
            'store_name' => 'Castrol Madeni Yağlar',
            'slug' => 'castrol-magaza',
            'commission_rate' => 15.00,
            'status' => 'active',
        ]);

        $this->productA = Product::create([
            'vendor_id' => $this->vendorA->id,
            'title' => 'Bosch Ön Fren Balatası',
            'oem_code' => '5Q0698151B',
            'sku' => 'BSH-01',
            'price' => 750.00,
            'stock_quantity' => 20,
            'status' => 'published',
        ]);

        $this->productB = Product::create([
            'vendor_id' => $this->vendorB->id,
            'title' => 'Castrol Edge 5W-30 Motor Yağı',
            'oem_code' => 'CAS-5W30',
            'sku' => 'CST-01',
            'price' => 1250.00,
            'stock_quantity' => 15,
            'status' => 'published',
        ]);
    }

    public function test_livewire_add_to_cart_button_adds_to_session_with_vendor_id(): void
    {
        Livewire::test(AddToCartButton::class, ['productId' => $this->productA->id])
            ->call('addToCart')
            ->assertDispatched('cart-updated');

        $cart = session()->get('cart', []);
        $this->assertArrayHasKey($this->productA->id, $cart);
        $this->assertEquals($this->vendorA->id, $cart[$this->productA->id]['vendor_id']);
        $this->assertEquals(750.00, $cart[$this->productA->id]['price']);
    }

    public function test_cart_counter_reacts_to_cart_updated_event(): void
    {
        session()->put('cart', [
            $this->productA->id => [
                'product_id' => $this->productA->id,
                'vendor_id' => $this->vendorA->id,
                'vendor_name' => $this->vendorA->store_name,
                'title' => $this->productA->title,
                'oem_code' => $this->productA->oem_code,
                'sku' => $this->productA->sku,
                'price' => 750.00,
                'quantity' => 2,
            ]
        ]);

        Livewire::test(CartCounter::class)
            ->assertSet('count', 2)
            ->assertSet('total', 1500.00)
            ->assertSee('2');
    }

    public function test_checkout_creates_order_and_order_items_with_vendor_id(): void
    {
        // Sepette 2 farklı satıcıdan ürün olsun (Sepet Toplamı: 750 * 2 + 1250 * 1 = 2.750 TL)
        session()->put('cart', [
            $this->productA->id => [
                'product_id' => $this->productA->id,
                'vendor_id' => $this->vendorA->id,
                'vendor_name' => $this->vendorA->store_name,
                'title' => $this->productA->title,
                'oem_code' => $this->productA->oem_code,
                'sku' => $this->productA->sku,
                'price' => 750.00,
                'quantity' => 2,
            ],
            $this->productB->id => [
                'product_id' => $this->productB->id,
                'vendor_id' => $this->vendorB->id,
                'vendor_name' => $this->vendorB->store_name,
                'title' => $this->productB->title,
                'oem_code' => $this->productB->oem_code,
                'sku' => $this->productB->sku,
                'price' => 1250.00,
                'quantity' => 1,
            ],
        ]);

        $response = $this->post(route('checkout.store'), [
            'customer_name' => 'Ali Demir',
            'customer_email' => 'ali@demir.com',
            'customer_phone' => '0532 111 22 33',
            'shipping_address' => 'Çankaya, Ankara',
            'notes' => 'Kapıda ödeme lütfen.',
        ]);

        $order = Order::latest()->first();
        $this->assertNotNull($order);
        $this->assertEquals(2750.00, (float) $order->total_amount);
        $this->assertEquals('Ali Demir', $order->customer_name);
        $this->assertEquals('pending', $order->status);

        // 2 farklı satıcı için 2 kalem oluşmuş olmalı
        $this->assertCount(2, $order->items);
        $this->assertDatabaseHas('order_items', [
            'order_id' => $order->id,
            'vendor_id' => $this->vendorA->id,
            'product_id' => $this->productA->id,
            'quantity' => 2,
            'unit_price' => 750.00,
        ]);
        $this->assertDatabaseHas('order_items', [
            'order_id' => $order->id,
            'vendor_id' => $this->vendorB->id,
            'product_id' => $this->productB->id,
            'quantity' => 1,
            'unit_price' => 1250.00,
        ]);

        // Sepet sıfırlanmış olmalı
        $this->assertEmpty(session()->get('cart', []));

        // Başarı sayfasına yönlendirmeli
        $response->assertRedirect(route('order.success', ['orderNumber' => $order->order_number]));
    }
}
