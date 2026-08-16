<?php

namespace Tests\Unit;

use App\Enums\CompatibilityStatus;
use App\Models\Product;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Vendor;
use App\Services\Vehicles\VehicleCompatibilityService;
use Tests\TestCase;

class VehicleCompatibilityTest extends TestCase
{
    protected VehicleCompatibilityService $service;
    protected Vendor $vendor;
    protected Vehicle $golf7;
    protected Vehicle $bmw3;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new VehicleCompatibilityService();

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'vendor@test.com',
            'password' => 'secret123',
            'is_active' => true,
        ]);

        $this->vendor = Vendor::create([
            'user_id' => $user->id,
            'store_name' => 'Auto Parts Store',
            'slug' => 'auto-parts-store',
            'commission_rate' => 10.00,
            'status' => 'active',
        ]);

        $this->golf7 = Vehicle::create([
            'make' => 'Volkswagen',
            'model' => 'Golf',
            'generation' => 'Mk7',
            'year_from' => 2012,
            'year_to' => 2020,
            'engine' => '1.4 TSI 125 HP',
        ]);

        $this->bmw3 = Vehicle::create([
            'make' => 'BMW',
            'model' => '3 Serisi',
            'generation' => 'F30',
            'year_from' => 2012,
            'year_to' => 2018,
            'engine' => '320i 184 HP',
        ]);
    }

    public function test_it_detects_universal_products_as_compatible(): void
    {
        $universalProduct = Product::create([
            'vendor_id' => $this->vendor->id,
            'title' => 'Antifriz 3L Kırmızı',
            'oem_code' => 'G12-PLUS',
            'sku' => 'ANT-001',
            'price' => 250.00,
            'stock_quantity' => 50,
            'is_universal' => true,
            'status' => 'published',
        ]);

        $result = $this->service->checkCompatibility($universalProduct, $this->golf7);

        $this->assertTrue($result->isCompatible);
        $this->assertEquals(CompatibilityStatus::UNIVERSAL, $result->status);
    }

    public function test_it_verifies_vehicle_specific_fitment(): void
    {
        $brakePad = Product::create([
            'vendor_id' => $this->vendor->id,
            'title' => 'Golf 7 Ön Fren Balatası',
            'oem_code' => '5Q0698151B',
            'sku' => 'BRK-007',
            'price' => 850.00,
            'stock_quantity' => 10,
            'is_universal' => false,
            'status' => 'published',
        ]);

        $brakePad->vehicles()->attach($this->golf7->id, ['notes' => 'Sadece ön aks için geçerlidir']);

        // Golf 7 ile Uyumlu olmalı
        $golfResult = $this->service->checkCompatibility($brakePad, $this->golf7);
        $this->assertTrue($golfResult->isCompatible);
        $this->assertEquals(CompatibilityStatus::COMPATIBLE, $golfResult->status);
        $this->assertEquals('Sadece ön aks için geçerlidir', $golfResult->notes);

        // BMW ile Uyumsuz olmalı
        $bmwResult = $this->service->checkCompatibility($brakePad, $this->bmw3);
        $this->assertFalse($bmwResult->isCompatible);
        $this->assertEquals(CompatibilityStatus::INCOMPATIBLE, $bmwResult->status);
    }
}
