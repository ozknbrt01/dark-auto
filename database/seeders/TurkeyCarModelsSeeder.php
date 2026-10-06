<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TurkeyCarModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $turkeyCars = [
            'Tofaş' => ['Şahin', 'Doğan', 'Kartal', 'Serçe'],
            'Togg' => ['T10X'],
            'Fiat' => ['Egea', 'Linea', 'Fiorino', 'Doblo', 'Albea', 'Tempra', 'Uno'],
            'Renault' => ['Megane', 'Clio', 'Symbol', 'Fluence', 'Kangoo', 'Toros', 'Broadway', 'Taliant', 'Austral'],
            'Dacia' => ['Duster', 'Sandero', 'Logan', 'Spring', 'Jogger'],
            'Chery' => ['Tiggo 8 Pro', 'Tiggo 7 Pro', 'Omoda 5'],
            'Skoda' => ['Superb', 'Octavia', 'Fabia', 'Kodiaq', 'Kamiq', 'Scala'],
            'Seat' => ['Leon', 'Ibiza', 'Arona', 'Ateca', 'Tarraco', 'Toledo'],
            'Peugeot' => ['3008', '2008', '208', '508', 'Partner', 'Rifter', '301', '308'],
            'Alfa Romeo' => ['Giulietta', 'Tonale', 'Stelvio', 'Giulia', '159'],
            'Land Rover' => ['Range Rover', 'Range Rover Sport', 'Defender', 'Discovery', 'Freelander'],
            'Aston Martin' => ['Vantage', 'DB11', 'DBS', 'DBX', 'Vanquish'],
            'DS Automobiles' => ['DS 7', 'DS 4', 'DS 9', 'DS 3']
        ];

        foreach ($turkeyCars as $brandName => $models) {
            $brand = CarBrand::where('name', $brandName)->first();
            
            if (!$brand) {
                $brand = CarBrand::create([
                    'name' => $brandName,
                    'slug' => Str::slug($brandName)
                ]);
            }

            foreach ($models as $modelName) {
                $slug = Str::slug($brandName . ' ' . $modelName);
                
                CarModel::firstOrCreate(
                    ['slug' => $slug], 
                    [
                        'name' => $modelName, 
                        'car_brand_id' => $brand->id
                    ]
                );
            }
        }
    }
}
