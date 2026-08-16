<?php

namespace App\Services\Vehicles;

use App\DTOs\FitmentResultDto;
use App\Enums\CompatibilityStatus;
use App\Models\Product;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Builder;

class VehicleCompatibilityService
{
    public function checkCompatibility(Product $product, int|Vehicle $vehicle): FitmentResultDto
    {
        $vehicleModel = is_int($vehicle) ? Vehicle::find($vehicle) : $vehicle;

        if (!$vehicleModel) {
            return new FitmentResultDto(
                status: CompatibilityStatus::INCOMPATIBLE,
                isCompatible: false,
                notes: 'Araç bilgisi bulunamadı.'
            );
        }

        if ($product->is_universal) {
            return new FitmentResultDto(
                status: CompatibilityStatus::UNIVERSAL,
                isCompatible: true,
                notes: 'Bu ürün tüm araçlar için standart/evrenseldir.',
                vehicle: $vehicleModel
            );
        }

        $fitment = $product->vehicles()
            ->where('vehicle_id', $vehicleModel->id)
            ->first();

        if ($fitment) {
            return new FitmentResultDto(
                status: CompatibilityStatus::COMPATIBLE,
                isCompatible: true,
                notes: $fitment->pivot->notes,
                vehicle: $vehicleModel
            );
        }

        return new FitmentResultDto(
            status: CompatibilityStatus::INCOMPATIBLE,
            isCompatible: false,
            notes: 'Bu parça seçtiğiniz araç ile eşleşmemektedir.',
            vehicle: $vehicleModel
        );
    }

    public function applyVehicleFilter(Builder $query, int $vehicleId): Builder
    {
        return $query->where(function (Builder $q) use ($vehicleId) {
            $q->where('is_universal', true)
              ->orWhereHas('vehicles', function (Builder $vehicleQuery) use ($vehicleId) {
                  $vehicleQuery->where('vehicles.id', $vehicleId);
              });
        });
    }
}
