<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class VehicleSelector extends Component
{
    public array $makes = [];
    public array $models = [];
    public array $variants = [];

    public ?string $selectedMake = null;
    public ?string $selectedModel = null;
    public ?int $selectedVehicleId = null;

    public ?Vehicle $selectedVehicle = null;

    public function mount(): void
    {
        $this->makes = Vehicle::query()
            ->select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make')
            ->toArray();
    }

    public function updatedSelectedMake(?string $value): void
    {
        $this->selectedModel = null;
        $this->selectedVehicleId = null;
        $this->selectedVehicle = null;
        $this->models = [];
        $this->variants = [];

        if (!empty($value)) {
            $this->models = Vehicle::query()
                ->where('make', $value)
                ->select('model')
                ->distinct()
                ->orderBy('model')
                ->pluck('model')
                ->toArray();
        }
    }

    public function updatedSelectedModel(?string $value): void
    {
        $this->selectedVehicleId = null;
        $this->selectedVehicle = null;
        $this->variants = [];

        if (!empty($value) && !empty($this->selectedMake)) {
            $this->variants = Vehicle::query()
                ->where('make', $this->selectedMake)
                ->where('model', $value)
                ->orderBy('year_from', 'desc')
                ->get()
                ->map(function ($vehicle) {
                    $yearRange = $vehicle->year_to ? "{$vehicle->year_from} - {$vehicle->year_to}" : "{$vehicle->year_from} - Günümüz";
                    $details = array_filter([$vehicle->generation, "({$yearRange})", $vehicle->engine]);
                    
                    return [
                        'id' => $vehicle->id,
                        'label' => implode(' ', $details),
                    ];
                })
                ->toArray();
        }
    }

    public function findParts()
    {
        $this->validate([
            'selectedMake' => 'required',
            'selectedModel' => 'required',
            'selectedVehicleId' => 'required|exists:vehicles,id',
        ], [
            'selectedMake.required' => 'Lütfen bir araç markası seçin.',
            'selectedModel.required' => 'Lütfen bir araç modeli seçin.',
            'selectedVehicleId.required' => 'Lütfen kasa, yıl veya motor seçeneğini belirleyin.',
            'selectedVehicleId.exists' => 'Seçilen araç sistemde bulunamadı.',
        ]);

        return $this->redirect(route('products.search', ['vehicle_id' => $this->selectedVehicleId]), navigate: true);
    }

    public function clearSelection(): void
    {
        $this->selectedMake = null;
        $this->selectedModel = null;
        $this->selectedVehicleId = null;
        $this->selectedVehicle = null;
        $this->models = [];
        $this->variants = [];
    }

    public function render()
    {
        return view('livewire.vehicle-selector');
    }
}
