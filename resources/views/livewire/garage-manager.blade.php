<div class="space-y-8">
    
    <!-- Garajımdaki Araçlar Listesi -->
    <div class="bg-white/80 border border-secondary/20 rounded-2xl p-6">
        <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
            <span class="text-primary">🚗</span> Garajımdaki Araçlar
        </h3>

        @if($myVehicles->isEmpty())
            <div class="text-center py-8">
                <div class="text-5xl mb-3 opacity-50">🚘</div>
                <p class="text-secondary-dark text-sm">Garajınızda henüz kayıtlı bir araç bulunmuyor.<br>Aşağıdan aracınızı ekleyerek size özel parça önerileri alabilirsiniz.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($myVehicles as $vehicle)
                    <div class="bg-gray-50 border border-secondary/20 rounded-xl p-4 flex items-start justify-between group">
                        
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <h4 class="font-bold text-gray-900 text-base">
                                    {{ $vehicle->carBrand->name ?? '' }} {{ $vehicle->carModel->name ?? '' }}
                                </h4>
                            </div>
                            
                            <p class="text-xs text-secondary-dark mb-3">
                                @if($vehicle->carEngine->chassis ?? false) {{ $vehicle->carEngine->chassis }} @endif 
                                ({{ $vehicle->carEngine->year_start ?? '' }} - {{ $vehicle->carEngine->year_end ?? 'Günümüz' }}) <br>
                                Motor: <span class="text-gray-700 font-mono">{{ $vehicle->carEngine->engine_type ?? '' }} / {{ $vehicle->carEngine->fuel_type ?? '' }}</span>
                            </p>

                            <div class="flex items-center gap-2">
                                <a 
                                    href="{{ route('products.search', ['vehicle_id' => $vehicle->car_engine_id]) }}"
                                    class="text-[11px] font-medium text-primary hover:text-white bg-primary/10 hover:bg-primary px-3 py-1.5 rounded-lg transition"
                                >
                                    Parça Bul
                                </a>
                            </div>
                        </div>

                        <!-- Sil Butonu -->
                        <button 
                            wire:click="removeVehicle({{ $vehicle->id }})"
                            wire:confirm="Bu aracı garajınızdan silmek istediğinize emin misiniz?"
                            class="text-secondary hover:text-rose-400 p-2 rounded-lg hover:bg-rose-500/10 transition"
                            title="Garajdan Sil"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>

                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Yeni Araç Ekleme Formu -->
    <div class="bg-white/80 border border-secondary/20 rounded-2xl p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
            <span class="text-primary">➕</span> Yeni Araç Ekle
        </h3>

        <!-- Uyarı/Başarı Mesajları -->
        @if (session()->has('success'))
            <div class="mb-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-700 px-4 py-3 rounded-xl text-sm flex items-center gap-2">
                <span>✓</span> {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="mb-4 bg-rose-500/10 border border-rose-500/20 text-rose-600 px-4 py-3 rounded-xl text-sm flex items-center gap-2">
                <span>⚠</span> {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            
            <!-- Marka Seçimi -->
            <div class="space-y-1.5">
                <label class="text-xs font-semibold text-gray-700">Marka</label>
                <div class="relative">
                    <select wire:model.live="selectedMake" class="w-full bg-gray-50 border border-secondary/30 text-sm text-gray-800 rounded-xl px-4 py-3 appearance-none focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
                        <option value="">Seçiniz</option>
                        @foreach($makes as $make)
                            <option value="{{ $make['id'] }}">{{ $make['name'] }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                        <span wire:loading wire:target="selectedMake" class="w-4 h-4 rounded-full border-2 border-slate-500 border-t-amber-500 animate-spin mr-2"></span>
                        <svg class="w-4 h-4 text-secondary-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Model Seçimi -->
            <div class="space-y-1.5">
                <label class="text-xs font-semibold text-gray-700">Model</label>
                <div class="relative">
                    <select wire:model.live="selectedModel" class="w-full bg-gray-50 border border-secondary/30 text-sm text-gray-800 rounded-xl px-4 py-3 appearance-none focus:outline-none focus:ring-2 focus:ring-amber-500 transition disabled:opacity-50 disabled:cursor-not-allowed" @if(empty($models)) disabled @endif>
                        <option value="">Seçiniz</option>
                        @foreach($models as $model)
                            <option value="{{ $model['id'] }}">{{ $model['name'] }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                        <span wire:loading wire:target="selectedModel" class="w-4 h-4 rounded-full border-2 border-slate-500 border-t-amber-500 animate-spin mr-2"></span>
                        <svg class="w-4 h-4 text-secondary-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Kasa / Motor / Yıl Seçimi -->
            <div class="space-y-1.5">
                <label class="text-xs font-semibold text-gray-700">Kasa / Yıl / Motor</label>
                <div class="relative">
                    <select wire:model.live="selectedVehicleId" class="w-full bg-gray-50 border border-secondary/30 text-sm text-gray-800 rounded-xl px-4 py-3 appearance-none focus:outline-none focus:ring-2 focus:ring-amber-500 transition disabled:opacity-50 disabled:cursor-not-allowed" @if(empty($variants)) disabled @endif>
                        <option value="">Seçiniz</option>
                        @foreach($variants as $variant)
                            <option value="{{ $variant['id'] }}">{{ $variant['label'] }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-secondary-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
                @error('selectedVehicleId') <span class="text-[10px] text-rose-400 mt-1 block">{{ $message }}</span> @enderror
            </div>
            
        </div>

        <div class="flex items-center justify-end">
            <button 
                wire:click="addVehicle"
                class="bg-primary hover:bg-primary text-white font-bold text-sm px-6 py-3 rounded-xl transition shadow-lg shadow-amber-500/20 flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed"
                wire:loading.attr="disabled"
                @if(!$selectedVehicleId) disabled @endif
            >
                <span wire:loading.remove wire:target="addVehicle">Garaja Ekle</span>
                <span wire:loading wire:target="addVehicle" class="flex items-center gap-2">
                    <span class="w-4 h-4 rounded-full border-2 border-white border-t-transparent animate-spin"></span> Ekleniyor...
                </span>
            </button>
        </div>

    </div>
</div>
