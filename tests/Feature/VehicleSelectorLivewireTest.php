<?php

namespace Tests\Feature;

use App\Livewire\VehicleSelector;
use App\Models\Vehicle;
use Livewire\Livewire;
use Tests\TestCase;

class VehicleSelectorLivewireTest extends TestCase
{
    public function test_home_page_renders_livewire_vehicle_selector_component(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeLivewire(VehicleSelector::class);
        $response->assertSee('Aracınıza Birebir Uyumlu Parçayı Bulun');
    }

    public function test_vehicle_selector_cascades_makes_models_and_redirects_to_search(): void
    {
        $golf7 = Vehicle::create([
            'make' => 'Volkswagen',
            'model' => 'Golf',
            'generation' => 'Mk7',
            'year_from' => 2012,
            'year_to' => 2020,
            'engine' => '1.4 TSI 125 HP',
        ]);

        $bmw3 = Vehicle::create([
            'make' => 'BMW',
            'model' => '3 Serisi',
            'generation' => 'F30',
            'year_from' => 2012,
            'year_to' => 2018,
            'engine' => '320i',
        ]);

        Livewire::test(VehicleSelector::class)
            ->assertSee('Volkswagen')
            ->assertSee('BMW')
            // 1. Marka Seçildi
            ->set('selectedMake', 'Volkswagen')
            ->assertSet('models', ['Golf'])
            // 2. Model Seçildi
            ->set('selectedModel', 'Golf')
            ->assertCount('variants', 1)
            // 3. Kasa/Motor Seçildi ve Parça Bul butonuna basıldığında Arama Sonuçları sayfasına yönlendirir
            ->set('selectedVehicleId', $golf7->id)
            ->call('findParts')
            ->assertRedirect(route('products.search', ['vehicle_id' => $golf7->id]));
    }
}
