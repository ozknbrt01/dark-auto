<?php

namespace App\Livewire;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarEngine;
use App\Models\UserVehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GarageManager extends Component
{
    public array $makes = [];
    public array $models = [];
    public array $variants = [];

    public ?int $selectedMake = null;
    public ?int $selectedModel = null;
    public ?int $selectedVehicleId = null;

    public function mount(): void
    {
        $this->loadMakes();
    }

    public function loadMakes(): void
    {
        $this->makes = CarBrand::query()
            ->orderBy('name')
            ->get()
            ->toArray();
    }

    public function updatedSelectedMake(?int $value): void
    {
        $this->selectedModel = null;
        $this->selectedVehicleId = null;
        $this->models = [];
        $this->variants = [];

        if (!empty($value)) {
            $this->models = CarModel::query()
                ->where('car_brand_id', $value)
                ->orderBy('name')
                ->get()
                ->toArray();
        }
    }

    public function updatedSelectedModel(?int $value): void
    {
        $this->selectedVehicleId = null;
        $this->variants = [];

        if (!empty($value) && !empty($this->selectedMake)) {
            $this->variants = CarEngine::query()
                ->where('car_model_id', $value)
                ->orderBy('year_start', 'desc')
                ->get()
                ->map(function ($engine) {
                    $yearRange = $engine->year_end ? "{$engine->year_start} - {$engine->year_end}" : "{$engine->year_start} - Günümüz";
                    $chassisInfo = $engine->chassis ? "{$engine->chassis} " : "";
                    
                    return [
                        'id' => $engine->id,
                        'label' => "{$chassisInfo}({$yearRange}) {$engine->engine_type} {$engine->fuel_type}",
                    ];
                })
                ->toArray();
        }
    }

    public function addVehicle()
    {
        $this->validate([
            'selectedMake' => 'required',
            'selectedModel' => 'required',
            'selectedVehicleId' => 'required|exists:car_engines,id',
        ], [
            'selectedMake.required' => 'Lütfen bir araç markası seçin.',
            'selectedModel.required' => 'Lütfen bir araç modeli seçin.',
            'selectedVehicleId.required' => 'Lütfen kasa, yıl veya motor seçeneğini belirleyin.',
            'selectedVehicleId.exists' => 'Seçilen araç sistemde bulunamadı.',
        ]);

        $user = Auth::user();
        
        // Araç zaten ekli mi kontrol et
        if ($user->vehicles()->where('car_engine_id', $this->selectedVehicleId)->exists()) {
            session()->flash('error', 'Bu araç zaten garajınızda bulunuyor.');
            return;
        }
        
        $user->vehicles()->create([
            'car_brand_id' => $this->selectedMake,
            'car_model_id' => $this->selectedModel,
            'car_engine_id' => $this->selectedVehicleId,
            'year' => null,
        ]);

        session()->flash('success', 'Araç başarıyla garajınıza eklendi.');
        
        // Seçimleri temizle
        $this->clearSelection();
    }

    public function removeVehicle($vehicleId)
    {
        $user = Auth::user();
        $user->vehicles()->where('id', $vehicleId)->delete();
        
        session()->flash('success', 'Araç garajınızdan silindi.');
    }

    public function setDefaultVehicle($vehicleId)
    {
        session()->flash('success', 'Varsayılan aracınız güncellendi.');
    }

    public function clearSelection(): void
    {
        $this->selectedMake = null;
        $this->selectedModel = null;
        $this->selectedVehicleId = null;
        $this->models = [];
        $this->variants = [];
    }

    public function render()
    {
        return view('livewire.garage-manager', [
            'myVehicles' => Auth::user()->vehicles()->with(['carBrand', 'carModel', 'carEngine'])->get()
        ]);
    }
}
