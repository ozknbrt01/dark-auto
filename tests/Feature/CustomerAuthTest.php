<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CustomerAuthTest extends TestCase
{
    public function test_register_page_renders_successfully(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Yeni Hesap Oluştur');
        $response->assertSee('Kayıt Ol');
    }

    public function test_customer_can_register_with_valid_data(): void
    {
        $response = $this->post('/register', [
            'name' => 'Caner Müşteri',
            'email' => 'caner@musteri.com',
            'phone' => '0544 999 88 77',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('home'));

        $this->assertAuthenticated();

        $user = User::where('email', 'caner@musteri.com')->first();
        $this->assertNotNull($user);
        $this->assertEquals('Caner Müşteri', $user->name);
        $this->assertEquals('0544 999 88 77', $user->phone);
        $this->assertEquals(UserRole::CUSTOMER->value, $user->role);
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    public function test_customer_registration_fails_with_invalid_data(): void
    {
        User::create([
            'name' => 'Existing User',
            'email' => 'exist@musteri.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
        ]);

        $response = $this->post('/register', [
            'name' => '',
            'email' => 'exist@musteri.com',
            'password' => 'pass1',
            'password_confirmation' => 'pass2',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
        $this->assertGuest();
    }

    public function test_login_page_renders_successfully(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Müşteri Girişi');
        $response->assertSee('Giriş Yap');
    }

    public function test_customer_can_login_with_valid_credentials(): void
    {
        $user = User::create([
            'name' => 'Mehmet Yılmaz',
            'email' => 'mehmet@test.com',
            'password' => Hash::make('secret123'),
            'role' => 'customer',
        ]);

        $response = $this->post('/login', [
            'email' => 'mehmet@test.com',
            'password' => 'secret123',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_customer_cannot_login_with_invalid_credentials(): void
    {
        User::create([
            'name' => 'Mehmet Yılmaz',
            'email' => 'mehmet@test.com',
            'password' => Hash::make('secret123'),
            'role' => 'customer',
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => 'mehmet@test.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_customer_can_logout(): void
    {
        $user = User::create([
            'name' => 'Ahmet Çıkış',
            'email' => 'ahmet@cikis.com',
            'password' => Hash::make('secret123'),
            'role' => 'customer',
        ]);

        $response = $this->actingAs($user)->post('/logout');

        $response->assertRedirect(route('home'));
        $this->assertGuest();
    }

    public function test_guest_is_redirected_to_login_when_accessing_customer_orders(): void
    {
        $response = $this->get('/customer/orders');
        $response->assertRedirect(route('login'));
    }

    public function test_customer_orders_page_displays_only_own_orders(): void
    {
        $customerA = User::create(['name' => 'Müşteri A', 'email' => 'a@test.com', 'password' => Hash::make('123456'), 'role' => 'customer']);
        $customerB = User::create(['name' => 'Müşteri B', 'email' => 'b@test.com', 'password' => Hash::make('123456'), 'role' => 'customer']);

        $vendor = Vendor::create([
            'user_id' => $customerA->id,
            'store_name' => 'Test Vendor',
            'slug' => 'test-vendor',
            'commission_rate' => 10.00,
            'status' => 'active',
        ]);

        $product = Product::create([
            'vendor_id' => $vendor->id,
            'title' => 'Örnek Parça',
            'oem_code' => 'OEM-123456',
            'sku' => 'EXP-01',
            'price' => 500.00,
            'stock_quantity' => 10,
            'status' => 'published',
        ]);

        // Customer A'nın siparişi
        $orderA = Order::create([
            'order_number' => 'ORD-AAA-1111',
            'user_id' => $customerA->id,
            'total_amount' => 500.00,
            'grand_total' => 500.00,
            'shipping_address' => 'Adres A',
            'customer_name' => 'Müşteri A',
            'status' => 'pending',
        ]);
        $orderA->items()->create([
            'product_id' => $product->id,
            'vendor_id' => $vendor->id,
            'product_name' => $product->title,
            'quantity' => 1,
            'unit_price' => 500.00,
            'total_price' => 500.00,
        ]);

        // Customer B'nin siparişi
        $orderB = Order::create([
            'order_number' => 'ORD-BBB-2222',
            'user_id' => $customerB->id,
            'total_amount' => 1000.00,
            'grand_total' => 1000.00,
            'shipping_address' => 'Adres B',
            'customer_name' => 'Müşteri B',
            'status' => 'completed',
        ]);
        $orderB->items()->create([
            'product_id' => $product->id,
            'vendor_id' => $vendor->id,
            'product_name' => $product->title,
            'quantity' => 2,
            'unit_price' => 500.00,
            'total_price' => 1000.00,
        ]);

        // Customer A oturum açıp /customer/orders sayfasına girdiğinde:
        $responseA = $this->actingAs($customerA)->get('/customer/orders');
        $responseA->assertStatus(200);
        $responseA->assertSee('ORD-AAA-1111');
        $responseA->assertSee('Müşteri A');
        $responseA->assertDontSee('ORD-BBB-2222');

        // Customer B oturum açıp /customer/orders sayfasına girdiğinde:
        $responseB = $this->actingAs($customerB)->get('/customer/orders');
        $responseB->assertStatus(200);
        $responseB->assertSee('ORD-BBB-2222');
        $responseB->assertDontSee('ORD-AAA-1111');
    }
}
