@extends('layouts.store')

@section('title', $category->name . ' - Kategorisindeki Ürünler')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Breadcrumb Navigasyon -->
    <nav class="flex items-center gap-2 text-xs text-secondary-dark">
        <a href="/" class="hover:text-white transition">Ana Sayfa</a>
        <span>/</span>
        <a href="{{ route('products.index') }}" class="hover:text-white transition">Kategoriler</a>
        <span>/</span>
        <span class="text-gray-800 font-medium">{{ $category->name }}</span>
    </nav>

    <!-- Kategori Başlığı -->
    <div class="bg-white/90 border border-secondary/30/90 rounded-2xl p-6 relative overflow-hidden backdrop-blur-md">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="space-y-1">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white">
                    <span class="text-primary">{{ $category->name }}</span> Kategorisindeki Ürünler
                </h1>
                <p class="text-xs sm:text-sm text-secondary-dark">
                    Bu kategoride {{ $products->total() }} aktif parça listeleniyor.
                </p>
            </div>
            
            <div class="flex items-center gap-2 flex-shrink-0">
                <a href="{{ route('products.search') }}" class="text-xs font-semibold text-slate-950 bg-primary hover:bg-red-300 px-4 py-2.5 rounded-xl transition flex items-center gap-1.5 shadow-md shadow-amber-400/20">
                    <span>🔍 Tüm Ürünlerde Ara</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Ürün Listeleme Izgarası (Grid) -->
    @if($products->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white/90 border border-secondary/20 hover:border-amber-500/50 rounded-2xl p-5 transition-all duration-200 flex flex-col justify-between group shadow-lg shadow-black/20 hover:shadow-amber-500/10">
                    
                    <!-- Ürün Başlık & Etiketler -->
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-3">
                            <span class="text-xs font-mono font-bold bg-primary/10 text-primary px-2.5 py-1 rounded-lg border border-amber-500/20 flex items-center gap-1">
                                <span class="text-[10px] text-secondary-dark font-sans">OEM:</span>
                                <span>{{ $product->oem_code }}</span>
                            </span>

                            <span class="text-[11px] text-secondary-dark truncate max-w-[120px]" title="{{ $product->vendor?->store_name }}">
                                🏪 {{ $product->vendor?->store_name ?? 'Yetkili Satıcı' }}
                            </span>
                        </div>

                        <!-- Ürün Görsel Placeholder -->
                        <div class="w-full h-36 bg-gray-50 rounded-xl mb-4 flex items-center justify-center text-slate-600 border border-secondary/20 group-hover:border-secondary/20 transition relative overflow-hidden">
                            <span class="text-4xl group-hover:scale-110 transition duration-300">⚙️</span>
                            @if($product->is_universal)
                                <span class="absolute top-2 left-2 bg-purple-500/20 text-purple-300 text-[10px] font-bold px-2 py-0.5 rounded border border-purple-500/30">
                                    Evrensel Parça
                                </span>
                            @endif
                        </div>

                        <h3 class="text-sm font-bold text-white group-hover:text-primary transition line-clamp-2 leading-snug">
                            {{ $product->title }}
                        </h3>

                        <div class="mt-2 flex items-center justify-between text-xs text-secondary-dark font-mono">
                            <span>SKU: {{ $product->sku }}</span>
                            @if($product->stock_quantity > 0)
                                <span class="text-secondary-dark font-sans text-[11px] flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Stokta Var
                                </span>
                            @else
                                <span class="text-rose-400 font-sans text-[11px]">Tükendi</span>
                            @endif
                        </div>
                    </div>

                    <!-- Fiyat ve Sepete Ekle Butonu -->
                    <div class="mt-5 pt-4 border-t border-secondary/20">
                        <div class="flex items-baseline justify-between mb-3">
                            <span class="text-xs text-secondary-dark">Birim Fiyat</span>
                            <span class="text-xl font-black text-primary font-mono">
                                ₺{{ number_format($product->price, 2, ',', '.') }}
                            </span>
                        </div>

                        @livewire('add-to-cart-button', ['productId' => $product->id], key('prod-cat-' . $product->id))
                    </div>

                </div>
            @endforeach
        </div>

        <!-- Sayfalama (Pagination) -->
        <div class="pt-6">
            {{ $products->links() }}
        </div>
    @else
        <!-- Sonuç Bulunamadı Kartı -->
        <div class="bg-white/60 border border-dashed border-secondary/30 rounded-3xl p-12 text-center max-w-2xl mx-auto space-y-4">
            <div class="w-16 h-16 rounded-2xl bg-primary/10 border border-amber-500/20 text-primary flex items-center justify-center text-3xl mx-auto">
                📦
            </div>
            
            <h3 class="text-lg font-bold text-white">Bu Kategoride Henüz Ürün Bulunmuyor</h3>
            
            <p class="text-xs sm:text-sm text-secondary-dark leading-relaxed">
                <span class="text-primary font-bold">{{ $category->name }}</span> kategorisine henüz bir ürün eklenmemiş veya ürünler aktif değil.
            </p>

            <div class="pt-4 flex flex-wrap justify-center gap-3">
                <a href="/" class="bg-primary hover:bg-primary text-white text-xs font-semibold px-5 py-2.5 rounded-xl transition">
                    Ana Sayfaya Dön
                </a>
            </div>
        </div>
    @endif

</div>
@endsection
