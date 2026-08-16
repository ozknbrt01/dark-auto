<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Vendor;
use Tests\TestCase;

class VehicleApiTest extends TestCase
{
    public function test_it_returns_makes_models_and_vehicles_via_api(): void
    {
        $golf7 = Vehicle::create([
            'make' => 'Volkswagen',
            'model' => 'Golf',
            'generation' => 'Mk7',
            'year_from' => 2012,
            'year_to' => 2020,
            'engine' => '1.4 TSI 125 HP',
        ]);

        // 1. Markalar endpoint'i
        $responseMakes = $this->getJson('/api/v1/vehicles/makes');
        $responseMakes->assertStatus(200);
        $responseMakes->assertJsonFragment(['Volkswagen']);

        // 2. Modeller endpoint'i
        $responseModels = $this->getJson("/api/v1/vehicles/makes/Volkswagen/models");
        $responseModels->assertStatus(200);
        $responseModels->assertJsonFragment(['Golf']);

        // 3. Varyantlar / Motorlar endpoint'i
        $responseVariants = $this->getJson("/api/v1/vehicles/makes/Volkswagen/models/Golf/variants?year=2015");
        $responseVariants->assertStatus(200);
        $responseVariants->assertJsonFragment(['engine' => '1.4 TSI 125 HP']);
    }

    public function test_it_checks_product_fitment_via_ajax_endpoint(): void
    {
        $user = User::create(['name' => 'Vendor User', 'email' => 'vendor@test.com', 'password' => 'secret123']);
        $vendor = Vendor::create(['user_id' => $user->id, 'store_name' => 'Test Vendor', 'slug' => 'test-vendor']);

        $vehicle = Vehicle::create([
            'make' => 'Volkswagen',
            'model' => 'Golf',
            'generation' => 'Mk7',
            'year_from' => 2012,
            'year_to' => 2020,
            'engine' => '1.4 TSI',
        ]);

        $product = Product::create([
            'vendor_id' => $vendor->id,
            'title' => 'Golf 7 Disk',
            'oem_code' => '5Q0615301F',
            'sku' => 'DSK-01',
            'price' => 1200.00,
            'stock_quantity' => 5,
            'is_universal' => false,
            'status' => 'published',
        ]);

        $product->vehicles()->attach($vehicle->id, ['notes' => 'Hava kanallı disk']);

        $response = $this->postJson("/api/v1/products/{$product->id}/check-fitment", [
            'vehicle_id' => $vehicle->id,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'compatible',
                'is_compatible' => true,
                'notes' => 'Hava kanallı disk',
            ]);
    }
}
