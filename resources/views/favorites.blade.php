@extends('layouts.vip')

@section('panel-icerik')
<!-- Üst Başlık ve İstatistik -->
<div class="border-b border-slate-700 pb-5 mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
    <div>
        <h2 class="text-2xl sm:text-3xl font-black text-white uppercase tracking-widest flex items-center gap-3">
            <span class="text-red-500">❤️</span> Favori Parçalarım
        </h2>
        <p class="text-slate-400 font-medium mt-2">Gözüne kestirdiğin lüks donanımlar ve radarındaki parçalar.</p>
    </div>
    <div class="hidden sm:block">
        <span class="bg-slate-800 border border-slate-700 text-slate-300 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-widest">2 Ürün Kayıtlı</span>
    </div>
</div>

<!-- ÜRÜN VİTRİNİ (GRID YAPI) -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-6 sm:gap-8">
    
    <!-- 1. ÜRÜN KARTI -->
    <div class="bg-slate-800 rounded-2xl border border-slate-700 overflow-hidden hover:border-amber-500/50 transition-all duration-500 group shadow-xl relative flex flex-col">
        <!-- Favori İkonu (Aktif Kırmızı) -->
        <div class="absolute top-4 right-4 z-20">
            <button class="text-red-500 hover:text-slate-400 transition-colors drop-shadow-lg" title="Favorilerden Çıkar">
                <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            </button>
        </div>
        
        <!-- Ürün Görsel Alanı (Mockup) -->
        <div class="h-56 bg-slate-900 flex items-center justify-center p-6 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-800 to-transparent z-0"></div>
            <!-- Hafif Parlama Efekti -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 bg-amber-500/10 rounded-full blur-3xl z-0 group-hover:bg-amber-500/20 transition-all duration-500"></div>
            <span class="text-7xl z-10 opacity-80 group-hover:scale-110 group-hover:opacity-100 transition-all duration-500 drop-shadow-2xl">🏎️</span>
        </div>
        
        <!-- Ürün Bilgileri -->
        <div class="p-6 flex flex-col flex-grow">
            <div class="flex justify-between items-center mb-2">
                <div class="text-[10px] font-black text-amber-500 tracking-widest uppercase bg-amber-500/10 px-2 py-1 rounded border border-amber-500/20">Stokta: 3 Adet</div>
                <div class="text-[10px] font-black text-slate-400 tracking-widest uppercase">BMW G20</div>
            </div>
            
            <h3 class="text-xl font-bold text-white uppercase mb-2 leading-tight line-clamp-2">Akrapovic Titanyum Egzoz Sistemi</h3>
            <p class="text-slate-400 text-sm mb-6 flex-grow">Karbon fiber uçlu, aktif valf sistemli premium egzoz donanımı. Sadece performans tutkunları için.</p>
            
            <div class="flex items-center justify-between border-t border-slate-700/50 pt-5">
                <span class="text-2xl font-black text-white tracking-wider">125.000 ₺</span>
                <button class="add-to-cart-btn bg-slate-700 hover:bg-amber-500 hover:text-slate-900 text-white w-12 h-12 rounded-lg flex items-center justify-center transition-all duration-300 border border-slate-600 hover:border-amber-500 shadow-lg group-hover:shadow-[0_0_15px_rgba(245,158,11,0.3)]" title="Sepete Ekle">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- 2. ÜRÜN KARTI -->
    <div class="bg-slate-800 rounded-2xl border border-slate-700 overflow-hidden hover:border-amber-500/50 transition-all duration-500 group shadow-xl relative flex flex-col">
        <div class="absolute top-4 right-4 z-20">
            <button class="text-red-500 hover:text-slate-400 transition-colors drop-shadow-lg">
                <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            </button>
        </div>
        
        <div class="h-56 bg-slate-900 flex items-center justify-center p-6 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-800 to-transparent z-0"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 bg-amber-500/10 rounded-full blur-3xl z-0 group-hover:bg-amber-500/20 transition-all duration-500"></div>
            <span class="text-7xl z-10 opacity-80 group-hover:scale-110 group-hover:opacity-100 transition-all duration-500 drop-shadow-2xl">⚙️</span>
        </div>
        
        <div class="p-6 flex flex-col flex-grow">
            <div class="flex justify-between items-center mb-2">
                <div class="text-[10px] font-black text-rose-500 tracking-widest uppercase bg-rose-500/10 px-2 py-1 rounded border border-rose-500/20">Son 1 Ürün</div>
                <div class="text-[10px] font-black text-slate-400 tracking-widest uppercase">Tüm Modeller</div>
            </div>
            
            <h3 class="text-xl font-bold text-white uppercase mb-2 leading-tight line-clamp-2">M Performance Karbon Direksiyon</h3>
            <p class="text-slate-400 text-sm mb-6 flex-grow">Alcantara kaplama ve karbon fiber detaylı orijinal M direksiyon simidi. Yarış hissiyatını kokpite taşıyın.</p>
            
            <div class="flex items-center justify-between border-t border-slate-700/50 pt-5">
                <span class="text-2xl font-black text-white tracking-wider">42.800 ₺</span>
                <button class="add-to-cart-btn bg-slate-700 hover:bg-amber-500 hover:text-slate-900 text-white w-12 h-12 rounded-lg flex items-center justify-center transition-all duration-300 border border-slate-600 hover:border-amber-500 shadow-lg group-hover:shadow-[0_0_15px_rgba(245,158,11,0.3)]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </button>
            </div>
        </div>
    </div>

</div>
@endsection
