<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Üst Bilgi Barı -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-200 mb-8 flex justify-between items-center">
        <div>
            @if($selectedVehicle)
                <h1 class="text-xl font-bold text-slate-800">
                    <span class="text-blue-600">{{ $selectedVehicle->carModel->carBrand->name ?? '' }} {{ $selectedVehicle->carModel->name }}</span> ({{ $selectedVehicle->engine_type }}) uyumlu parçalar
                </h1>
            @else
                <h1 class="text-xl font-bold text-slate-800">Tüm Yedek Parçalar</h1>
            @endif
            <p class="text-sm text-slate-500 mt-1">Toplam {{ $products->total() }} ürün bulundu.</p>
        </div>
        <div>
            <a href="/" class="text-sm bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-lg transition font-medium">Yeni Araç Seç</a>
        </div>
    </div>

    <!-- Ürün Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @forelse($products as $product)
            <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-100 hover:shadow-lg hover:border-blue-300 transition group flex flex-col">
                <!-- Resim Alanı (İlk resmi veya placeholder'ı göster) -->
                <div class="h-48 bg-slate-50 rounded-xl mb-4 flex items-center justify-center overflow-hidden">
                    <span class="text-4xl">⚙️</span>
                </div>
                
                <!-- Ürün Bilgileri -->
                <div class="flex-grow">
                    <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">
                        {{ $product->brand ? $product->brand->name : 'Genel' }}
                    </div>
                    <h3 class="text-sm font-semibold text-slate-800 mb-2 leading-tight group-hover:text-blue-600 transition"><a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a></h3>
                </div>
                
                <!-- Fiyat ve Sepet -->
                <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                    <div class="text-lg font-black text-slate-900">₺{{ number_format($product->price, 2, ',', '.') }}</div>
                    <button wire:click="addToCart({{ $product->id }})" wire:loading.attr="disabled" wire:target="addToCart({{ $product->id }})" class="bg-blue-50 text-blue-600 p-2 rounded-lg group-hover:bg-blue-600 group-hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" /></svg>
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white p-12 text-center rounded-2xl border border-slate-200">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Bu araca uygun parça bulunamadı.</h3>
                <p class="text-slate-500">Seçtiğiniz araç modeli için henüz yedek parça eklenmemiş. Lütfen daha sonra tekrar kontrol edin.</p>
            </div>
        @endforelse
    </div>
    
    <!-- Sayfalama (Pagination) -->
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
