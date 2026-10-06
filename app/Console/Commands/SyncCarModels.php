<?php

namespace App\Console\Commands;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SyncCarModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-car-models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync car models from NHTSA API for all car brands in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $brands = CarBrand::all();
        $this->info("Found {$brands->count()} brands. Starting sync...");

        foreach ($brands as $brand) {
            $this->info("Fetching models for {$brand->name}...");

            $response = Http::get("https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMake/" . urlencode($brand->name) . "?format=json");

            if ($response->successful()) {
                $data = $response->json();
                $results = $data['Results'] ?? [];
                
                $count = 0;
                foreach ($results as $result) {
                    $modelName = $result['Model_Name'] ?? null;
                    
                    if ($modelName) {
                        $slug = Str::slug($brand->name . ' ' . $modelName);
                        CarModel::firstOrCreate(
                            ['slug' => $slug],
                            [
                                'name' => $modelName,
                                'car_brand_id' => $brand->id,
                            ]
                        );
                        $count++;
                    }
                }
                $this->info("Saved {$count} models for {$brand->name}.");
            } else {
                $this->error("Failed to fetch models for {$brand->name}. Status: " . $response->status());
            }

            // Sleep to protect server and prevent API block
            sleep(1);
        }

        $this->info('Başarıyla tamamlandı');
    }
}
