<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarEngine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TestEnginesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testData = [
            [
                'brand' => 'Fiat',
                'model' => 'Egea',
                'chassis' => 'Tip 356',
                'year_start' => 2015,
                'year_end' => 2024,
                'engine' => '1.3 Multijet',
                'fuel' => 'Dizel'
            ],
            [
                'brand' => 'BMW',
                'model' => '3 Serisi',
                'chassis' => 'F30',
                'year_start' => 2012,
                'year_end' => 2019,
                'engine' => '2.0d',
                'fuel' => 'Dizel'
            ],
            [
                'brand' => 'Renault',
                'model' => 'Megane',
                'chassis' => 'Megane 4',
                'year_start' => 2016,
                'year_end' => 2024,
                'engine' => '1.5 dCi',
                'fuel' => 'Dizel'
            ]
        ];

        foreach ($testData as $data) {
            $brand = CarBrand::firstOrCreate(
                ['slug' => Str::slug($data['brand'])],
                ['name' => $data['brand']]
            );

            $model = CarModel::firstOrCreate(
                ['slug' => Str::slug($data['brand'] . ' ' . $data['model'])],
                [
                    'name' => $data['model'], 
                    'car_brand_id' => $brand->id
                ]
            );

            CarEngine::firstOrCreate(
                [
                    'car_model_id' => $model->id,
                    'chassis' => $data['chassis'],
                    'engine_type' => $data['engine'],
                ],
                [
                    'year_start' => $data['year_start'],
                    'year_end' => $data['year_end'],
                    'fuel_type' => $data['fuel'],
                ]
            );
        }
    }
}
