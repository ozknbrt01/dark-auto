<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Tests\TestCase;

class VendorPanelTenancyTest extends TestCase
{
    protected User $vendorUserA;
    protected User $vendorUserB;
    protected Vendor $vendorA;
    protected Vendor $vendorB;
    protected Product $productA;
    protected Product $productB;

    protected function setUp(): void
    {
        parent::setUp();

        $this->vendorUserA = User::create([
            'name' => 'Ahmet Usta',
            'email' => 'ahmet@bosch.com',
            'password' => 'secret123',
            'role' => 'vendor',
            'is_vendor' => true,
        ]);

        $this->vendorA = Vendor::create([
            'user_id' => $this->vendorUserA->id,
            'store_name' => 'Bosch Fren Merkezi',
            'slug' => 'bosch-fren',
            'status' => 'active',
        ]);

        $this->vendorUserB = User::create([
            'name' => 'Mehmet Usta',
            'email' => 'mehmet@castrol.com',
            'password' => 'secret123',
            'role' => 'vendor',
            'is_vendor' => true,
        ]);

        $this->vendorB = Vendor::create([
            'user_id' => $this->vendorUserB->id,
            'store_name' => 'Castrol Madeni Yağlar',
            'slug' => 'castrol-magaza',
            'status' => 'active',
        ]);

        $this->productA = Product::create([
            'vendor_id' => $this->vendorA->id,
            'title' => 'Bosch Ön Fren Balatası',
            'oem_code' => '5Q0698151B',
            'sku' => 'BSH-01',
            'price' => 750.00,
            'status' => 'published',
        ]);

        $this->productB = Product::create([
            'vendor_id' => $this->vendorB->id,
            'title' => 'Castrol Edge 5W-30',
            'oem_code' => 'CAS-5W30',
            'sku' => 'CST-01',
            'price' => 1200.00,
            'status' => 'published',
        ]);
    }

    public function test_vendor_login_page_renders_successfully(): void
    {
        $response = $this->get('/vendor/login');

        $response->assertStatus(200);
        $response->assertSee('Satıcı Yönetim Portalı');
    }

    public function test_vendor_tenant_authorization_works_correctly(): void
    {
        $this->assertTrue($this->vendorUserA->canAccessTenant($this->vendorA));
        $this->assertFalse($this->vendorUserA->canAccessTenant($this->vendorB));

        $this->assertTrue($this->vendorUserB->canAccessTenant($this->vendorB));
        $this->assertFalse($this->vendorUserB->canAccessTenant($this->vendorA));
    }

    public function test_vendor_can_view_only_their_assigned_tenants(): void
    {
        $tenants = $this->vendorUserA->getTenants(filament()->getPanel('vendor'));

        $this->assertTrue($tenants->contains('id', $this->vendorA->id));
        $this->assertFalse($tenants->contains('id', $this->vendorB->id));
    }

    public function test_vendor_order_isolation_by_vendor_id(): void
    {
        $order = Order::create([
            'order_number' => 'ORD-TEST-001',
            'total_amount' => 1950.00,
            'status' => 'pending',
            'shipping_address' => 'Kadıköy, İstanbul',
        ]);

        $order->items()->create([
            'product_id' => $this->productA->id,
            'vendor_id' => $this->vendorA->id,
            'quantity' => 1,
            'unit_price' => 750.00,
            'total_price' => 750.00,
        ]);

        $order->items()->create([
            'product_id' => $this->productB->id,
            'vendor_id' => $this->vendorB->id,
            'quantity' => 1,
            'unit_price' => 1200.00,
            'total_price' => 1200.00,
        ]);

        // Vendor A'nın göreceği siparişler
        $vendorAOrders = Order::whereHas('items', fn ($q) => $q->where('vendor_id', $this->vendorA->id))->get();
        $this->assertCount(1, $vendorAOrders);
        $this->assertEquals(750.00, $vendorAOrders->first()->items()->where('vendor_id', $this->vendorA->id)->sum('total_price'));

        // Vendor B'nin göreceği siparişler
        $vendorBOrders = Order::whereHas('items', fn ($q) => $q->where('vendor_id', $this->vendorB->id))->get();
        $this->assertCount(1, $vendorBOrders);
        $this->assertEquals(1200.00, $vendorBOrders->first()->items()->where('vendor_id', $this->vendorB->id)->sum('total_price'));
    }
}
