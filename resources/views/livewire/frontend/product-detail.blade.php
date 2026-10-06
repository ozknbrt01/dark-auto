<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    @if (session()->has('message'))
        <div class="mb-6 bg-emerald-50 text-emerald-600 p-4 rounded-xl font-semibold border border-emerald-200 flex items-center justify-between">
            {{ session('message') }}
            <a href="{{ route('cart.show') }}" class="bg-emerald-600 text-white px-4 py-1.5 rounded-lg text-sm">Sepete Git</a>
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden flex flex-col md:flex-row">
        
        <!-- Sol: Ürün Görseli -->
        <div class="w-full md:w-1/2 bg-slate-50 p-12 flex items-center justify-center border-b md:border-b-0 md:border-r border-slate-200 min-h-[400px]">
            <div class="text-9xl">⚙️</div>
        </div>

        <!-- Sağ: Ürün Bilgileri ve Satın Alma -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col">
            <div class="text-sm font-bold text-blue-600 uppercase tracking-wider mb-2">
                {{ $product->brand ? $product->brand->name : 'Genel Marka' }}
            </div>
            
            <h1 class="text-3xl font-black text-slate-900 mb-4">{{ $product->name }}</h1>
            
            <div class="text-4xl font-black text-slate-900 mb-6 border-b border-slate-100 pb-6">
                ₺{{ number_format($product->price, 2, ',', '.') }}
            </div>
            
            <p class="text-slate-600 mb-8 leading-relaxed">
                {{ $product->description ?? 'Bu ürün için henüz bir açıklama girilmemiştir. %100 uyum garantisiyle güvenle sipariş verebilirsiniz.' }}
            </p>

            <div class="mt-auto flex gap-4">
                <div class="w-24">
                    <input type="number" wire:model="quantity" min="1" class="w-full h-14 border border-slate-300 rounded-xl px-4 text-center text-lg font-bold focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <button wire:click="addToCart" wire:loading.attr="disabled" wire:target="addToCart" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white h-14 rounded-xl font-bold text-lg transition flex items-center justify-center gap-2 shadow-lg shadow-blue-600/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    Sepete Ekle
                </button>
            </div>
        </div>
    </div>

    <!-- Alt: Uyumlu Araçlar Listesi -->
    <div class="mt-12 bg-white rounded-3xl shadow-sm border border-slate-200 p-8">
        <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
            <span class="text-2xl">✅</span> Uyumlu Araçlar
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @forelse($product->carEngines as $engine)
                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 flex items-center gap-3">
                    <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                    <div class="font-medium text-slate-700 text-sm">
                        {{ $engine->carModel->carBrand->name }} {{ $engine->carModel->name }} ({{ $engine->engine_type }})
                    </div>
                </div>
            @empty
                <div class="text-slate-500 italic col-span-3">Uyumlu araç bilgisi girilmemiş.</div>
            @endforelse
        </div>
    </div>
</div>
