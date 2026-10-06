<div class="bg-slate-900 min-h-screen py-12 text-slate-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb / Başlık Alanı -->
        <div class="mb-8 border-b border-slate-700 pb-4">
            <h1 class="text-3xl font-bold text-white capitalize">Ürünler</h1>
            <p class="text-slate-400 text-sm mt-1">Bu kategorideki tüm ürünleri inceliyorsunuz.</p>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sol Kolon: Filtreler (1/4) -->
            <div class="w-full md:w-1/4">
                <div class="bg-slate-800 rounded-lg p-4 border border-slate-700 sticky top-24">
                    <h3 class="text-lg font-bold text-white mb-4 border-b border-slate-700 pb-2">Filtreler</h3>
                    
                    <!-- Marka Filtresi -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-white mb-2 text-sm">Marka</h4>
                        <div class="space-y-2">
                            <label class="flex items-center gap-2 text-sm cursor-pointer hover:text-white">
                                <input type="checkbox" class="rounded bg-slate-900 border-slate-700 text-amber-500 focus:ring-amber-500"> Bosch
                            </label>
                            <label class="flex items-center gap-2 text-sm cursor-pointer hover:text-white">
                                <input type="checkbox" class="rounded bg-slate-900 border-slate-700 text-amber-500 focus:ring-amber-500"> Valeo
                            </label>
                            <label class="flex items-center gap-2 text-sm cursor-pointer hover:text-white">
                                <input type="checkbox" class="rounded bg-slate-900 border-slate-700 text-amber-500 focus:ring-amber-500"> TRW
                            </label>
                        </div>
                    </div>

                    <!-- Model Filtresi -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-white mb-2 text-sm">Araç Modeli</h4>
                        <select class="w-full bg-slate-900 border border-slate-700 rounded-md py-1.5 px-3 text-sm focus:ring-amber-500 focus:border-amber-500">
                            <option>Tümü</option>
                            <option>Golf</option>
                            <option>Passat</option>
                            <option>Focus</option>
                        </select>
                    </div>

                    <!-- Fiyat Aralığı -->
                    <div>
                        <h4 class="font-semibold text-white mb-2 text-sm">Fiyat Aralığı (₺)</h4>
                        <div class="flex items-center gap-2">
                            <input type="number" placeholder="Min" class="w-full bg-slate-900 border border-slate-700 rounded-md py-1.5 px-2 text-sm focus:ring-amber-500 focus:border-amber-500">
                            <span class="text-slate-500">-</span>
                            <input type="number" placeholder="Max" class="w-full bg-slate-900 border border-slate-700 rounded-md py-1.5 px-2 text-sm focus:ring-amber-500 focus:border-amber-500">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sağ Kolon: Ürünler (3/4) -->
            <div class="w-full md:w-3/4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @for ($i = 0; $i < 6; $i++)
                    <a href="{{ route('urun.detay', 'bosch-fren-disk-takimi') }}" class="bg-slate-800 border border-slate-700 rounded-lg p-4 hover:border-amber-500 transition flex flex-col group block">
                        <!-- Resim Alanı -->
                        <div class="bg-slate-700 h-40 rounded-md mb-4 flex items-center justify-center text-slate-500 group-hover:bg-slate-600 transition">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        
                        <h3 class="text-white font-bold mb-1 line-clamp-2 group-hover:text-amber-500 transition">Örnek Ürün Adı {{$i + 1}}</h3>
                        <p class="text-slate-400 text-xs mb-3 font-mono">OEM: 1K0 {{$i}}23 456 A</p>
                        
                        <div class="mt-auto">
                            <div class="text-amber-500 text-lg font-bold font-mono mb-4">₺{{ number_format(1500 + ($i * 150), 2, ',', '.') }}</div>
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold w-full py-2 rounded transition">
                                Sepete Ekle
                            </button>
                        </div>
                    </a>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
