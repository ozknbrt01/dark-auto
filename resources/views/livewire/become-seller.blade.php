<div class="bg-slate-900 min-h-screen py-10 px-4 text-slate-300 flex items-center justify-center">
    <div class="bg-slate-800 border border-slate-700 rounded-xl p-8 max-w-3xl w-full shadow-lg">
        <h1 class="text-white text-2xl font-bold mb-6 text-center">Mağazanızı Açın, Satışa Başlayın</h1>
        
        @if (session()->has('message'))
            <div class="bg-green-900 border border-green-500 text-green-200 px-4 py-3 rounded-lg mb-6 shadow-md text-center">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="submit">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Ad Soyad -->
                <div>
                    <label class="block text-slate-300 text-sm font-semibold mb-2">Ad Soyad</label>
                    <input type="text" wire:model="full_name" placeholder="Adınız ve Soyadınız" class="w-full bg-slate-900 border border-slate-700 text-white rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                    @error('full_name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
                
                <!-- TC Kimlik -->
                <div>
                    <label class="block text-slate-300 text-sm font-semibold mb-2">TC Kimlik Numarası</label>
                    <input type="text" wire:model="tc_identity" placeholder="11 Haneli TC Kimlik Numaranız" class="w-full bg-slate-900 border border-slate-700 text-white rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                    @error('tc_identity') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
                
                <!-- Vergi Numarası -->
                <div>
                    <label class="block text-slate-300 text-sm font-semibold mb-2">Vergi Numarası</label>
                    <input type="text" wire:model="tax_number" placeholder="Vergi Numaranız (Opsiyonel)" class="w-full bg-slate-900 border border-slate-700 text-white rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                    @error('tax_number') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
                
                <!-- Doğum Yılı -->
                <div>
                    <label class="block text-slate-300 text-sm font-semibold mb-2">Doğum Yılı</label>
                    <input type="text" wire:model="birth_year" placeholder="Örn: 1990" class="w-full bg-slate-900 border border-slate-700 text-white rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                    @error('birth_year') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="bg-slate-900 border border-slate-700 rounded-lg p-4 mb-6">
                <label class="flex items-start gap-3 cursor-pointer">
                    <input type="checkbox" wire:model="accepted_terms" class="mt-1 w-5 h-5 rounded border-slate-700 bg-slate-800 text-amber-500 focus:ring-amber-500">
                    <span class="text-slate-300 text-sm leading-relaxed">Mağaza açma sözleşmesini okudum, anladım ve kabul ediyorum.</span>
                </label>
                @error('accepted_terms') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
            
            <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold py-3 w-full rounded-md mt-6 transition shadow-lg">
                Başvuruyu Gönder
            </button>
        </form>
    </div>
</div>
