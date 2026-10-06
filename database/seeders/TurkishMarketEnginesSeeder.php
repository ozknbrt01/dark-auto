<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarEngine;
use App\Models\CarModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TurkishMarketEnginesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            'Fiat' => [
                'Egea' => [
                    ['chassis' => 'Tip 356', 'year_start' => 2015, 'engine_type' => '1.4 Fire', 'fuel_type' => 'Benzin'],
                    ['chassis' => 'Tip 356', 'year_start' => 2015, 'engine_type' => '1.3 Multijet', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Tip 356', 'year_start' => 2015, 'engine_type' => '1.6 Multijet', 'fuel_type' => 'Dizel'],
                ]
            ],
            'Renault' => [
                'Megane' => [
                    ['chassis' => 'Megane 2', 'year_start' => 2002, 'year_end' => 2008, 'engine_type' => '1.5 dCi', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Megane 3', 'year_start' => 2009, 'year_end' => 2015, 'engine_type' => '1.5 dCi', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Megane 4', 'year_start' => 2016, 'year_end' => null, 'engine_type' => '1.3 TCe', 'fuel_type' => 'Benzin'],
                    ['chassis' => 'Megane 4', 'year_start' => 2016, 'year_end' => null, 'engine_type' => '1.5 dCi', 'fuel_type' => 'Dizel'],
                ]
            ],
            'Volkswagen' => [
                'Passat' => [
                    ['chassis' => 'B6', 'year_start' => 2005, 'year_end' => 2010, 'engine_type' => '1.6 FSI', 'fuel_type' => 'Benzin'],
                    ['chassis' => 'B7', 'year_start' => 2010, 'year_end' => 2014, 'engine_type' => '1.6 TDI', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'B8', 'year_start' => 2015, 'year_end' => null, 'engine_type' => '1.5 TSI', 'fuel_type' => 'Benzin'],
                    ['chassis' => 'B8', 'year_start' => 2015, 'year_end' => null, 'engine_type' => '1.6 TDI', 'fuel_type' => 'Dizel'],
                ]
            ],
            'Honda' => [
                'Civic' => [
                    ['chassis' => 'FD6', 'year_start' => 2006, 'year_end' => 2012, 'engine_type' => '1.6 i-VTEC', 'fuel_type' => 'Benzin/LPG'],
                    ['chassis' => 'FB7', 'year_start' => 2012, 'year_end' => 2016, 'engine_type' => '1.6 i-VTEC', 'fuel_type' => 'Benzin/LPG'],
                    ['chassis' => 'FC5', 'year_start' => 2016, 'year_end' => 2021, 'engine_type' => '1.6 i-VTEC', 'fuel_type' => 'Benzin/LPG'],
                    ['chassis' => 'FC5', 'year_start' => 2016, 'year_end' => 2021, 'engine_type' => '1.5 VTEC Turbo', 'fuel_type' => 'Benzin'],
                ]
            ],
            'Ford' => [
                'Focus' => [
                    ['chassis' => 'Mk2', 'year_start' => 2004, 'year_end' => 2011, 'engine_type' => '1.6 TDCi', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Mk3', 'year_start' => 2011, 'year_end' => 2018, 'engine_type' => '1.6 TDCi', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Mk3.5', 'year_start' => 2014, 'year_end' => 2018, 'engine_type' => '1.5 TDCi', 'fuel_type' => 'Dizel'],
                ]
            ]
        ];

        foreach ($cars as $brandName => $models) {
            $brand = CarBrand::firstOrCreate(
                ['slug' => Str::slug($brandName)],
                ['name' => $brandName]
            );

            foreach ($models as $modelName => $engines) {
                $model = CarModel::firstOrCreate(
                    ['slug' => Str::slug($brandName . ' ' . $modelName)],
                    ['name' => $modelName, 'car_brand_id' => $brand->id]
                );

                foreach ($engines as $engineData) {
                    CarEngine::firstOrCreate(
                        [
                            'car_model_id' => $model->id,
                            'chassis' => $engineData['chassis'] ?? null,
                            'engine_type' => $engineData['engine_type'],
                        ],
                        [
                            'year_start' => $engineData['year_start'],
                            'year_end' => $engineData['year_end'] ?? null,
                            'fuel_type' => $engineData['fuel_type'] ?? null,
                        ]
                    );
                }
            }
        }
    }
}
