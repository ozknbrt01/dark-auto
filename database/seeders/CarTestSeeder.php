<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarEngine;

class CarTestSeeder extends Seeder
{
    public function run(): void
    {
        // 1. VOLKSWAGEN
        $vw = CarBrand::firstOrCreate(['name' => 'Volkswagen']);
        
        $passat = CarModel::firstOrCreate(['car_brand_id' => $vw->id, 'name' => 'Passat']);
        CarEngine::firstOrCreate(['car_model_id' => $passat->id, 'engine_type' => '1.6 TDI B8 Kasa', 'year_start' => 2015, 'year_end' => 2021, 'fuel_type' => 'Dizel']);
        CarEngine::firstOrCreate(['car_model_id' => $passat->id, 'engine_type' => '1.5 TSI B8.5 Kasa', 'year_start' => 2019, 'year_end' => 2023, 'fuel_type' => 'Benzin']);
        
        $golf = CarModel::firstOrCreate(['car_brand_id' => $vw->id, 'name' => 'Golf']);
        CarEngine::firstOrCreate(['car_model_id' => $golf->id, 'engine_type' => '1.4 TSI Mk7', 'year_start' => 2013, 'year_end' => 2020, 'fuel_type' => 'Benzin']);

        // 2. BMW
        $bmw = CarBrand::firstOrCreate(['name' => 'BMW']);
        
        $f30 = CarModel::firstOrCreate(['car_brand_id' => $bmw->id, 'name' => '3 Serisi']);
        CarEngine::firstOrCreate(['car_model_id' => $f30->id, 'engine_type' => '320i ED F30', 'year_start' => 2012, 'year_end' => 2019, 'fuel_type' => 'Benzin']);
        CarEngine::firstOrCreate(['car_model_id' => $f30->id, 'engine_type' => '320d F30', 'year_start' => 2012, 'year_end' => 2019, 'fuel_type' => 'Dizel']);

        // 3. FIAT
        $fiat = CarBrand::firstOrCreate(['name' => 'Fiat']);
        
        $egea = CarModel::firstOrCreate(['car_brand_id' => $fiat->id, 'name' => 'Egea']);
        CarEngine::firstOrCreate(['car_model_id' => $egea->id, 'engine_type' => '1.4 Fire', 'year_start' => 2015, 'year_end' => 2024, 'fuel_type' => 'Benzin']);
        CarEngine::firstOrCreate(['car_model_id' => $egea->id, 'engine_type' => '1.3 Multijet', 'year_start' => 2015, 'year_end' => 2024, 'fuel_type' => 'Dizel']);
        
        // 4. RENAULT
        $renault = CarBrand::firstOrCreate(['name' => 'Renault']);
        
        $megane = CarModel::firstOrCreate(['car_brand_id' => $renault->id, 'name' => 'Megane']);
        CarEngine::firstOrCreate(['car_model_id' => $megane->id, 'engine_type' => '1.5 dCi Megane 4', 'year_start' => 2016, 'year_end' => 2024, 'fuel_type' => 'Dizel']);
    }
}
