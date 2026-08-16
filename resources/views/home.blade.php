@extends('layouts.store')

@section('title', 'OtoMarket - Otomotiv Yedek Parça & Araç Uyumluluk Pazaryeri')

@section('content')
<div class="space-y-16">

    <!-- Hero Bölümü & Canlı Araç Seçici -->
    <section class="relative pt-12 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <!-- Arka Plan Görsel & Gradient Efektleri -->
        <div class="absolute inset-0 bg-gradient-to-b from-blue-600/10 via-transparent to-transparent pointer-events-none"></div>
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[350px] bg-blue-500/10 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="max-w-5xl mx-auto text-center relative z-10">
            
            <div class="inline-flex items-center gap-2 bg-slate-800/80 border border-slate-700/80 text-xs font-semibold px-4 py-1.5 rounded-full text-slate-300 mb-6 shadow-sm">
                <span class="text-amber-400">⚡</span>
                <span>Yapay Zeka Destekli Fitment & OEM Doğrulama</span>
            </div>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.15] mb-6">
                Otomobiliniz İçin <span class="bg-gradient-to-r from-blue-400 via-indigo-300 to-amber-400 bg-clip-text text-fill-transparent text-transparent">Doğru Parçayı</span> Anında Bulun
            </h1>

            <p class="text-base sm:text-lg text-slate-400 max-w-2xl mx-auto mb-10 leading-relaxed">
                Aracınızın marka, model ve motorunu seçin; binlerce satıcı arasından aracınıza <strong class="text-white font-semibold">%100 birebir uyumlu</strong> orijinal ve eşdeğer yedek parçaları görüntüleyin.
            </p>

            <!-- Livewire Araç Seçici Bileşeni (Vehicle Selector) -->
            <div class="max-w-4xl mx-auto text-left">
                @livewire('vehicle-selector')
            </div>

        </div>
    </section>

    <!-- Güven & Avantaj Rozetleri (Features) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            
            <div class="bg-[#12192b]/60 border border-slate-800 p-5 rounded-2xl flex items-center gap-4 hover:border-slate-700 transition">
                <div class="w-12 h-12 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 text-2xl flex-shrink-0">
                    🎯
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white">%100 Uyum Garantisi</h4>
                    <p class="text-xs text-slate-400 mt-0.5">Şasi ve motor koduna göre kusursuz fitment.</p>
                </div>
            </div>

            <div class="bg-[#12192b]/60 border border-slate-800 p-5 rounded-2xl flex items-center gap-4 hover:border-slate-700 transition">
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 text-2xl flex-shrink-0">
                    🏷️
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white">Orijinal OEM Kodları</h4>
                    <p class="text-xs text-slate-400 mt-0.5">Parçanın fabrika çıkış kodu ile arama yapın.</p>
                </div>
            </div>

            <div class="bg-[#12192b]/60 border border-slate-800 p-5 rounded-2xl flex items-center gap-4 hover:border-slate-700 transition">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 text-2xl flex-shrink-0">
                    🚚
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white">Hızlı & Güvenli Teslimat</h4>
                    <p class="text-xs text-slate-400 mt-0.5">Yetkili satıcılardan doğrudan kargo imkanı.</p>
                </div>
            </div>

            <div class="bg-[#12192b]/60 border border-slate-800 p-5 rounded-2xl flex items-center gap-4 hover:border-slate-700 transition">
                <div class="w-12 h-12 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-purple-400 text-2xl flex-shrink-0">
                    🛡️
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white">14 Gün Kolay İade</h4>
                    <p class="text-xs text-slate-400 mt-0.5">Uymayan parçalarda koşulsuz iade güvencesi.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Popüler Kategoriler -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-white">Popüler Parça Kategorileri</h3>
                <p class="text-xs text-slate-400 mt-0.5">En sık aranan araç bakım ve onarım parçaları</p>
            </div>
            <a href="#" class="text-xs font-semibold text-blue-400 hover:text-blue-300 transition flex items-center gap-1">
                <span>Tümünü Gör</span>
                <span>&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-3.5">
            
            <a href="#" class="group bg-[#131b2e] border border-slate-800/80 hover:border-blue-500/50 p-4 rounded-2xl text-center transition flex flex-col items-center justify-center gap-2.5">
                <div class="w-12 h-12 rounded-xl bg-slate-800 flex items-center justify-center text-2xl group-hover:scale-110 transition">
                    🛑
                </div>
                <span class="text-xs font-semibold text-slate-200 group-hover:text-white">Fren Balataları & Disk</span>
            </a>

            <a href="#" class="group bg-[#131b2e] border border-slate-800/80 hover:border-blue-500/50 p-4 rounded-2xl text-center transition flex flex-col items-center justify-center gap-2.5">
                <div class="w-12 h-12 rounded-xl bg-slate-800 flex items-center justify-center text-2xl group-hover:scale-110 transition">
                    💨
                </div>
                <span class="text-xs font-semibold text-slate-200 group-hover:text-white">Filtre Setleri</span>
            </a>

            <a href="#" class="group bg-[#131b2e] border border-slate-800/80 hover:border-blue-500/50 p-4 rounded-2xl text-center transition flex flex-col items-center justify-center gap-2.5">
                <div class="w-12 h-12 rounded-xl bg-slate-800 flex items-center justify-center text-2xl group-hover:scale-110 transition">
                    ⚙️
                </div>
                <span class="text-xs font-semibold text-slate-200 group-hover:text-white">Debriyaj & Şanzıman</span>
            </a>

            <a href="#" class="group bg-[#131b2e] border border-slate-800/80 hover:border-blue-500/50 p-4 rounded-2xl text-center transition flex flex-col items-center justify-center gap-2.5">
                <div class="w-12 h-12 rounded-xl bg-slate-800 flex items-center justify-center text-2xl group-hover:scale-110 transition">
                    🛢️
                </div>
                <span class="text-xs font-semibold text-slate-200 group-hover:text-white">Motor Yağları</span>
            </a>

            <a href="#" class="group bg-[#131b2e] border border-slate-800/80 hover:border-blue-500/50 p-4 rounded-2xl text-center transition flex flex-col items-center justify-center gap-2.5">
                <div class="w-12 h-12 rounded-xl bg-slate-800 flex items-center justify-center text-2xl group-hover:scale-110 transition">
                    💡
                </div>
                <span class="text-xs font-semibold text-slate-200 group-hover:text-white">Aydınlatma & Farlar</span>
            </a>

            <a href="#" class="group bg-[#131b2e] border border-slate-800/80 hover:border-blue-500/50 p-4 rounded-2xl text-center transition flex flex-col items-center justify-center gap-2.5">
                <div class="w-12 h-12 rounded-xl bg-slate-800 flex items-center justify-center text-2xl group-hover:scale-110 transition">
                    🔋
                </div>
                <span class="text-xs font-semibold text-slate-200 group-hover:text-white">Ateşleme & Buji</span>
            </a>

        </div>
    </section>

    <!-- Öne Çıkan Parçalar Vitrini (Products Showcase) -->
    <section id="products" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-white">En Son Eklenen Parçalar</h3>
                <p class="text-xs text-slate-400 mt-0.5">Onaylı satıcılarımızdan güncel stoklu ürünler</p>
            </div>
            <span class="text-xs bg-slate-800 text-slate-300 px-3 py-1 rounded-full font-mono">
                Toplam {{ $productCount }} Ürün
            </span>
        </div>

        @if($featuredProducts->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                    <div class="bg-[#12192b]/80 border border-slate-800/80 hover:border-blue-500/40 rounded-2xl p-5 transition flex flex-col justify-between group">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-3">
                                <span class="text-[11px] font-mono font-bold bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded border border-blue-500/20">
                                    OEM: {{ $product->oem_code }}
                                </span>
                                <span class="text-[10px] text-slate-400">
                                    {{ $product->vendor?->store_name }}
                                </span>
                            </div>

                            <h4 class="text-sm font-bold text-white group-hover:text-blue-400 transition line-clamp-2">
                                {{ $product->title }}
                            </h4>
                            <p class="text-xs text-slate-400 mt-1 font-mono">SKU: {{ $product->sku }}</p>

                            @if($product->vehicles->isNotEmpty())
                                <div class="mt-3 text-[11px] text-emerald-400 bg-emerald-500/10 px-2.5 py-1 rounded-lg border border-emerald-500/20 inline-flex items-center gap-1">
                                    <span>✓</span>
                                    <span>{{ $product->vehicles->count() }} Farklı Araca Uyumlu</span>
                                </div>
                            @endif
                        </div>

                        <div class="mt-5 pt-4 border-t border-slate-800 flex items-center justify-between gap-3">
                            <div>
                                <span class="text-xs text-slate-400 block -mb-0.5">Fiyat</span>
                                <span class="text-lg font-black text-amber-400 font-mono">
                                    ₺{{ number_format($product->price, 2, ',', '.') }}
                                </span>
                            </div>
                            <div class="w-36">
                                @livewire('add-to-cart-button', ['productId' => $product->id], key('prod-home-' . $product->id))
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-[#12192b]/40 border border-dashed border-slate-800 rounded-2xl p-12 text-center">
                <div class="text-4xl mb-3">📦</div>
                <h4 class="text-base font-bold text-white mb-1">Henüz Vitrinde Ürün Bulunmuyor</h4>
                <p class="text-xs text-slate-400 max-w-md mx-auto mb-4">
                    Admin paneli üzerinden veya satıcı panelinden yeni parçalar ekleyerek vitrini zenginleştirebilirsiniz.
                </p>
                <a href="/admin/products/create" class="inline-flex items-center gap-1.5 text-xs bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold px-4 py-2 rounded-xl transition">
                    <span>+ İlk Ürünü Ekle</span>
                </a>
            </div>
        @endif
    </section>

</div>
@endsection
