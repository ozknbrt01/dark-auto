<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarEngine;
use Illuminate\Support\Str;

class MasterMarketSeeder extends Seeder
{
    public function run(): void
    {
        $marketData = [
            'Fiat' => [
                'Egea' => [
                    ['chassis' => 'Tip 356', 'year_start' => 2015, 'year_end' => null, 'engine_type' => '1.4 Fire', 'fuel_type' => 'Benzin'],
                    ['chassis' => 'Tip 356', 'year_start' => 2015, 'year_end' => null, 'engine_type' => '1.3 Multijet', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Tip 356', 'year_start' => 2015, 'year_end' => null, 'engine_type' => '1.6 Multijet', 'fuel_type' => 'Dizel'],
                ],
                'Linea' => [
                    ['chassis' => 'Tip 323', 'year_start' => 2007, 'year_end' => 2018, 'engine_type' => '1.3 Multijet', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Tip 323', 'year_start' => 2007, 'year_end' => 2018, 'engine_type' => '1.4 Fire', 'fuel_type' => 'Benzin'],
                ],
                'Doblo' => [
                    ['chassis' => 'D3', 'year_start' => 2010, 'year_end' => 2022, 'engine_type' => '1.3 Multijet', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'D3', 'year_start' => 2010, 'year_end' => 2022, 'engine_type' => '1.6 Multijet', 'fuel_type' => 'Dizel'],
                ]
            ],
            'Renault' => [
                'Megane' => [
                    ['chassis' => 'Megane 2', 'year_start' => 2002, 'year_end' => 2008, 'engine_type' => '1.5 dCi', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Megane 3', 'year_start' => 2009, 'year_end' => 2015, 'engine_type' => '1.5 dCi', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Megane 4', 'year_start' => 2016, 'year_end' => null, 'engine_type' => '1.5 dCi', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Megane 4', 'year_start' => 2016, 'year_end' => null, 'engine_type' => '1.3 TCe', 'fuel_type' => 'Benzin'],
                ],
                'Clio' => [
                    ['chassis' => 'Clio 4', 'year_start' => 2012, 'year_end' => 2019, 'engine_type' => '1.5 dCi', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Clio 4', 'year_start' => 2012, 'year_end' => 2019, 'engine_type' => '0.9 TCe', 'fuel_type' => 'Benzin'],
                    ['chassis' => 'Clio 5', 'year_start' => 2019, 'year_end' => null, 'engine_type' => '1.0 TCe', 'fuel_type' => 'Benzin'],
                ],
                'Symbol' => [
                    ['chassis' => 'Thalia 2', 'year_start' => 2008, 'year_end' => 2013, 'engine_type' => '1.5 dCi', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Thalia 3', 'year_start' => 2013, 'year_end' => 2021, 'engine_type' => '1.5 dCi', 'fuel_type' => 'Dizel'],
                ]
            ],
            'Volkswagen' => [
                'Passat' => [
                    ['chassis' => 'B7', 'year_start' => 2010, 'year_end' => 2014, 'engine_type' => '1.6 TDI', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'B7', 'year_start' => 2010, 'year_end' => 2014, 'engine_type' => '1.4 TSI', 'fuel_type' => 'Benzin'],
                    ['chassis' => 'B8', 'year_start' => 2015, 'year_end' => 2023, 'engine_type' => '1.6 TDI', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'B8', 'year_start' => 2015, 'year_end' => 2023, 'engine_type' => '1.5 TSI', 'fuel_type' => 'Benzin'],
                ],
                'Golf' => [
                    ['chassis' => 'Mk6', 'year_start' => 2008, 'year_end' => 2012, 'engine_type' => '1.6 TDI', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Mk7', 'year_start' => 2012, 'year_end' => 2020, 'engine_type' => '1.6 TDI', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Mk8', 'year_start' => 2020, 'year_end' => null, 'engine_type' => '1.0 eTSI', 'fuel_type' => 'Yarı Hibrit'],
                ],
                'Polo' => [
                    ['chassis' => '6R', 'year_start' => 2009, 'year_end' => 2017, 'engine_type' => '1.4', 'fuel_type' => 'Benzin'],
                    ['chassis' => '6R', 'year_start' => 2009, 'year_end' => 2017, 'engine_type' => '1.2 TSI', 'fuel_type' => 'Benzin'],
                    ['chassis' => 'AW', 'year_start' => 2017, 'year_end' => null, 'engine_type' => '1.0 TSI', 'fuel_type' => 'Benzin'],
                ]
            ],
            'Honda' => [
                'Civic' => [
                    ['chassis' => 'FD6', 'year_start' => 2006, 'year_end' => 2012, 'engine_type' => '1.6 i-VTEC', 'fuel_type' => 'Benzin/LPG'],
                    ['chassis' => 'FB7', 'year_start' => 2012, 'year_end' => 2016, 'engine_type' => '1.6 i-VTEC', 'fuel_type' => 'Benzin/LPG'],
                    ['chassis' => 'FC5', 'year_start' => 2016, 'year_end' => 2021, 'engine_type' => '1.6 i-VTEC', 'fuel_type' => 'Benzin/LPG'],
                    ['chassis' => 'FC5', 'year_start' => 2016, 'year_end' => 2021, 'engine_type' => '1.5 VTEC Turbo', 'fuel_type' => 'Benzin'],
                    ['chassis' => 'FE1', 'year_start' => 2021, 'year_end' => null, 'engine_type' => '1.5 VTEC Turbo', 'fuel_type' => 'Benzin'],
                ]
            ],
            'Ford' => [
                'Focus' => [
                    ['chassis' => 'Mk2', 'year_start' => 2004, 'year_end' => 2011, 'engine_type' => '1.6 TDCi', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Mk3', 'year_start' => 2011, 'year_end' => 2018, 'engine_type' => '1.6 TDCi', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Mk4', 'year_start' => 2018, 'year_end' => null, 'engine_type' => '1.5 EcoBlue', 'fuel_type' => 'Dizel'],
                ],
                'Courier' => [
                    ['chassis' => 'Mk1', 'year_start' => 2014, 'year_end' => 2023, 'engine_type' => '1.5 TDCi', 'fuel_type' => 'Dizel'],
                ]
            ],
            'Toyota' => [
                'Corolla' => [
                    ['chassis' => 'E140/E150', 'year_start' => 2006, 'year_end' => 2013, 'engine_type' => '1.4 D-4D', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'E160', 'year_start' => 2013, 'year_end' => 2019, 'engine_type' => '1.4 D-4D', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'E160', 'year_start' => 2013, 'year_end' => 2019, 'engine_type' => '1.6 Valvematic', 'fuel_type' => 'Benzin'],
                    ['chassis' => 'E210', 'year_start' => 2019, 'year_end' => null, 'engine_type' => '1.8 Hybrid', 'fuel_type' => 'Hibrit'],
                ]
            ],
            'Opel' => [
                'Astra' => [
                    ['chassis' => 'Astra H', 'year_start' => 2004, 'year_end' => 2014, 'engine_type' => '1.3 CDTI', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Astra J', 'year_start' => 2009, 'year_end' => 2015, 'engine_type' => '1.6 CDTI', 'fuel_type' => 'Dizel'],
                    ['chassis' => 'Astra K', 'year_start' => 2015, 'year_end' => 2021, 'engine_type' => '1.6 CDTI', 'fuel_type' => 'Dizel'],
                ]
            ]
        ];

        foreach ($marketData as $brandName => $models) {
            // HATA ÖNLEME: Marka oluşturulurken slug eksik olmasın diye slug da ekledim.
            $brand = CarBrand::firstOrCreate(
                ['slug' => Str::slug($brandName)],
                ['name' => $brandName]
            );

            foreach ($models as $modelName => $engines) {
                $slug = Str::slug($brandName . ' ' . $modelName);
                $model = CarModel::firstOrCreate(
                    ['slug' => $slug],
                    ['name' => $modelName, 'car_brand_id' => $brand->id]
                );

                foreach ($engines as $engine) {
                    CarEngine::firstOrCreate([
                        'car_model_id' => $model->id,
                        'chassis' => $engine['chassis'],
                        'year_start' => $engine['year_start'],
                        'engine_type' => $engine['engine_type'],
                        'fuel_type' => $engine['fuel_type'],
                    ], [
                        'year_end' => $engine['year_end'] ?? null,
                    ]);
                }
            }
        }
    }
}
