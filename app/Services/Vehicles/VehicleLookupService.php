<?php

namespace App\Services\Vehicles;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class VehicleLookupService
{
    /**
     * Benzersiz marka listesini getirir
     */
    public function getActiveMakes(): array
    {
        return Cache::remember('vehicle_makes_distinct', 86400, function () {
            return Vehicle::query()
                ->select('make')
                ->distinct()
                ->orderBy('make')
                ->pluck('make')
                ->toArray();
        });
    }

    /**
     * Seçilen markaya ait benzersiz modelleri getirir
     */
    public function getModelsByMake(string $make): array
    {
        return Cache::remember("vehicle_models_{$make}", 86400, function () use ($make) {
            return Vehicle::query()
                ->where('make', $make)
                ->select('model')
                ->distinct()
                ->orderBy('model')
                ->pluck('model')
                ->toArray();
        });
    }

    /**
     * Modele ve opsiyonel yıla göre spesifik araç / motor varyantlarını getirir
     */
    public function getVehiclesByModelAndYear(string $make, string $model, ?int $year = null): Collection
    {
        $query = Vehicle::query()
            ->where('make', $make)
            ->where('model', $model);

        if ($year) {
            $query->forYear($year);
        }

        return $query->orderBy('generation')
            ->orderBy('year_from')
            ->orderBy('engine')
            ->get();
    }
}
