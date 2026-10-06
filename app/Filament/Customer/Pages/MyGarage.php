<?php
namespace App\Filament\Customer\Pages;

use Filament\Pages\Page;
use App\Models\CarBrand;
use App\Models\UserVehicle;

class MyGarage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.customer.pages.my-garage';
    protected static string $layout = 'components.customer-layout';

    public $userVehicles = [];
    public $brands = [];

    public $selectedBrand = '';
    public $manualModel = '';
    public $manualEngine = '';
    public $plate = '';
    
    public bool $isAdding = false; 

    public function mount()
    {
        $this->loadVehicles();
        $this->brands = CarBrand::orderBy('name')->get();
    }

    public function loadVehicles()
    {
        $userId = filament()->auth()->id() ?? auth()->id();
        $this->userVehicles = UserVehicle::with(['carBrand'])->where('user_id', $userId)->get();
    }

    public function saveVehicle()
    {
        $this->validate([
            'selectedBrand' => 'required',
            'manualModel' => 'required',
        ], [
            'selectedBrand.required' => 'Lütfen bir marka seçin.',
            'manualModel.required' => 'Lütfen modeli yazın.',
        ]);

        try {
            $userId = filament()->auth()->id() ?? auth()->id();

            UserVehicle::forceCreate([
                'user_id' => $userId,
                'car_brand_id' => $this->selectedBrand,
                'model_name' => $this->manualModel,
                'engine_name' => $this->manualEngine,
                'plate_number' => $this->plate,
            ]);

            $this->reset(['selectedBrand', 'manualModel', 'manualEngine', 'plate']);
            $this->isAdding = false; 
            $this->loadVehicles();

        } catch (\Exception $e) {
            dd("VERİTABANI KAYIT HATASI: " . $e->getMessage());
        }
    }

    public function deleteVehicle($id)
    {
        $userId = filament()->auth()->id() ?? auth()->id();
        UserVehicle::where('id', $id)->where('user_id', $userId)->delete();
        $this->loadVehicles();
    }
}
