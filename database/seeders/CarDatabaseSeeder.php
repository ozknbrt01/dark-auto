<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Fiat
        $fiat = CarBrand::create(['name' => 'Fiat', 'slug' => 'fiat']);
        
        $egea = $fiat->carModels()->create([
            'name' => 'Egea',
            'slug' => 'egea'
        ]);

        $egea->carEngines()->createMany([
            ['year_start' => 2015, 'year_end' => 2024, 'engine_type' => '1.4 Fire', 'fuel_type' => 'Benzin'],
            ['year_start' => 2015, 'year_end' => 2024, 'engine_type' => '1.6 Multijet', 'fuel_type' => 'Dizel'],
        ]);

        // Renault
        $renault = CarBrand::create(['name' => 'Renault', 'slug' => 'renault']);
        
        $megane = $renault->carModels()->create([
            'name' => 'Megane',
            'slug' => 'megane'
        ]);

        $megane->carEngines()->createMany([
            ['year_start' => 2016, 'year_end' => 2023, 'engine_type' => '1.5 dCi', 'fuel_type' => 'Dizel'],
            ['year_start' => 2016, 'year_end' => 2023, 'engine_type' => '1.3 TCe', 'fuel_type' => 'Benzin'],
        ]);
    }
}
