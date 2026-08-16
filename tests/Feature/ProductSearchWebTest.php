<?php

namespace Tests\Feature;

use App\Livewire\VehicleSelector;
use App\Models\Product;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Vendor;
use Livewire\Livewire;
use Tests\TestCase;

class ProductSearchWebTest extends TestCase
{
    protected Vendor $vendor;
    protected Vehicle $golf7;
    protected Vehicle $bmw3;
    protected Product $brakePad;
    protected Product $sparkPlug;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::create(['name' => 'Store Owner', 'email' => 'store@test.com', 'password' => '123456']);
        $this->vendor = Vendor::create(['user_id' => $user->id, 'store_name' => 'Orijinal Parça Merkezi', 'slug' => 'orijinal-parca']);

        $this->golf7 = Vehicle::create([
            'make' => 'Volkswagen',
            'model' => 'Golf',
            'generation' => 'Mk7',
            'year_from' => 2012,
            'year_to' => 2020,
            'engine' => '1.4 TSI',
        ]);

        $this->bmw3 = Vehicle::create([
            'make' => 'BMW',
            'model' => '3 Serisi',
            'generation' => 'F30',
            'year_from' => 2012,
            'year_to' => 2018,
            'engine' => '320i',
        ]);

        $this->brakePad = Product::create([
            'vendor_id' => $this->vendor->id,
            'title' => 'Golf 7 Ön Fren Balatası',
            'oem_code' => '5Q0698151B',
            'sku' => 'BRK-5Q0',
            'price' => 850.00,
            'stock_quantity' => 10,
            'status' => 'published',
        ]);
        $this->brakePad->vehicles()->attach($this->golf7->id);

        $this->sparkPlug = Product::create([
            'vendor_id' => $this->vendor->id,
            'title' => 'BMW F30 İridyum Buji',
            'oem_code' => '12120037582',
            'sku' => 'NGK-F30',
            'price' => 450.00,
            'stock_quantity' => 20,
            'status' => 'published',
        ]);
        $this->sparkPlug->vehicles()->attach($this->bmw3->id);
    }

    public function test_it_filters_products_by_vehicle_id(): void
    {
        $response = $this->get(route('products.search', ['vehicle_id' => $this->golf7->id]));

        $response->assertStatus(200);
        $response->assertSee('Volkswagen Golf Mk7');
        $response->assertSee('Golf 7 Ön Fren Balatası');
        $response->assertSee('5Q0698151B');
        $response->assertDontSee('BMW F30 İridyum Buji');
    }

    public function test_it_filters_products_by_oem_or_title_search_term(): void
    {
        // 1. OEM Kodu ile arama
        $responseOem = $this->get(route('products.search', ['search_term' => '5Q0698151B']));
        $responseOem->assertStatus(200);
        $responseOem->assertSee('Golf 7 Ön Fren Balatası');
        $responseOem->assertDontSee('BMW F30 İridyum Buji');

        // 2. Parça Adı ile arama
        $responseTitle = $this->get(route('products.search', ['search_term' => 'İridyum Buji']));
        $responseTitle->assertStatus(200);
        $responseTitle->assertSee('BMW F30 İridyum Buji');
        $responseTitle->assertDontSee('Golf 7 Ön Fren Balatası');
    }

    public function test_livewire_vehicle_selector_redirects_to_search_results(): void
    {
        Livewire::test(VehicleSelector::class)
            ->set('selectedMake', 'Volkswagen')
            ->set('selectedModel', 'Golf')
            ->set('selectedVehicleId', $this->golf7->id)
            ->call('findParts')
            ->assertRedirect(route('products.search', ['vehicle_id' => $this->golf7->id]));
    }
}
