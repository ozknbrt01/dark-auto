    <div class="bg-white rounded-lg border border-gray-200 p-8 shadow-sm min-h-[400px]">

        <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                Kayıtlı Araçlarım
            </h2>
        </div>

        @if($isAdding)
            <!-- ARAÇ EKLEME FORMU (Saf Livewire) -->
            <div class="bg-gray-50 border border-gray-300 rounded-lg p-6 mb-6 shadow-inner">
                <h3 class="font-bold text-gray-800 mb-4 text-sm">Araç Bilgilerini Girin</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Marka (Zorunlu)</label>
                        <select wire:model="selectedBrand" class="w-full border-gray-300 rounded-md shadow-sm text-sm focus:border-black focus:ring-black">
                            <option value="">Seçiniz...</option>
                            @foreach($brands ?? [] as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('selectedBrand') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Model (Zorunlu - Örn: Passat)</label>
                        <input type="text" wire:model="manualModel" placeholder="Aracınızın modeli..." class="w-full border-gray-300 rounded-md shadow-sm text-sm focus:border-black focus:ring-black">
                        @error('manualModel') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Motor / Yıl (Örn: 1.6 TDI 2018)</label>
                        <input type="text" wire:model="manualEngine" placeholder="Motor ve yıl bilgisi..." class="w-full border-gray-300 rounded-md shadow-sm text-sm focus:border-black focus:ring-black">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Plaka (İsteğe Bağlı)</label>
                        <input type="text" wire:model="plate" placeholder="34 ABC 123" class="w-full border-gray-300 rounded-md shadow-sm text-sm focus:border-black focus:ring-black">
                    </div>
                </div>
                
                <div class="mt-6 flex gap-2">
                    <button wire:click="saveVehicle" type="button" class="font-bold py-1.5 px-4 text-xs rounded transition hover:opacity-90 flex items-center gap-1" style="background-color: #22c55e !important; color: #ffffff !important; border: none; letter-spacing: 0.5px;">
                        <span wire:loading.remove wire:target="saveVehicle">KAYDET</span>
                        <span wire:loading wire:target="saveVehicle">BEKLEYİN...</span>
                    </button>
                    <button wire:click="$set('isAdding', false)" type="button" class="font-bold py-1.5 px-4 text-xs rounded transition hover:opacity-90" style="background-color: #d1d5db !important; color: #1f2937 !important; border: none; letter-spacing: 0.5px;">
                        İPTAL
                    </button>
                </div>
            </div>
        @else
            <!-- LİSTELEME VE YENİ EKLE BUTONU -->
            @if(count($userVehicles ?? []) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($userVehicles as $vehicle)
                        <div class="border border-gray-200 rounded-lg p-4 bg-gray-50 flex items-center justify-between shadow-sm">
                            <div>
                                <h3 class="font-bold text-gray-800 text-sm">{{ $vehicle->carBrand->name ?? '' }} {{ $vehicle->model_name ?? '' }}</h3>
                                <p class="text-xs text-gray-500">{{ $vehicle->engine_name ?? '' }}</p>
                                @if($vehicle->plate_number)
                                    <p class="text-[10px] font-bold text-gray-700 mt-1 bg-white border border-gray-300 px-2 py-0.5 rounded inline-block">{{ $vehicle->plate_number }}</p>
                                @endif
                            </div>
                            <button wire:click="deleteVehicle({{ $vehicle->id }})" class="text-red-500 hover:text-red-700 p-2 text-xs font-bold transition">
                                SİL
                            </button>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-6 flex justify-start">
                    <button wire:click="$set('isAdding', true)" type="button" class="px-4 py-1.5 text-xs rounded transition inline-flex items-center gap-1.5 hover:opacity-80 shadow-sm" style="background-color: #000000 !important; color: #ffffff !important; border: none; letter-spacing: 0.5px;">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        YENİ ARAÇ EKLE
                    </button>
                </div>
            @else
                <!-- BOŞ DURUM -->
                <div class="text-center py-12 bg-gray-50 border border-dashed border-gray-200 rounded-lg">
                    <h3 class="text-sm font-bold text-gray-500 mb-3">Henüz garajınızda araç yok.</h3>
                    <button wire:click="$set('isAdding', true)" type="button" class="px-4 py-1.5 text-xs rounded transition inline-flex items-center gap-1.5 hover:opacity-80 shadow-sm" style="background-color: #000000 !important; color: #ffffff !important; border: none; letter-spacing: 0.5px;">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        İLK ARACINI EKLE
                    </button>
                </div>
            @endif
        @endif
    </div>
