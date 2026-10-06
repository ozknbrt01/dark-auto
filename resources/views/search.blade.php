<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arama Sonuçları - Dark Auto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-200 antialiased bg-slate-900 min-h-screen">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        
        <!-- Üst Bar -->
        <div class="mb-8 flex justify-between items-center border-b border-slate-700 pb-4">
            <a href="/" class="text-3xl font-bold text-amber-500 tracking-wider">DARK AUTO</a>
            <a href="/" class="text-sm text-slate-400 hover:text-amber-500 transition uppercase tracking-wide">Ana Sayfaya Dön</a>
        </div>

        <!-- Arama Başlığı -->
        <div class="mb-10">
            <h1 class="text-2xl sm:text-3xl font-bold text-white uppercase tracking-wide">
                @if(request('marka') || request('model'))
                    {{ request('marka') }} {{ request('model') }} {{ request('yil') }} <span class="text-amber-500">İçin Uyumlu Parçalar</span>
                @else
                    Tüm <span class="text-amber-500">Premium Parçalar</span>
                @endif
            </h1>
            <p class="text-slate-400 mt-2">Dark Auto standartlarından geçmiş, %100 uyum garantili sonuçlar.</p>
        </div>

        <!-- İçerik Grid -->
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sol Filtreler (Sidebar) -->
            <div class="w-full lg:w-1/4">
                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700">
                    <h3 class="text-lg font-bold text-amber-500 mb-4 uppercase">Filtreler</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm text-slate-300 mb-1">Kategori</label>
                            <select class="w-full bg-slate-900 border-slate-700 text-slate-200 rounded-md focus:border-amber-500 focus:ring-amber-500">
                                <option>Tümü</option>
                                <option>Fren Sistemi</option>
                                <option>Motor Parçaları</option>
                                <option>Süspansiyon</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm text-slate-300 mb-1">Marka Filtresi</label>
                            <select class="w-full bg-slate-900 border-slate-700 text-slate-200 rounded-md focus:border-amber-500 focus:ring-amber-500">
                                <option>Brembo</option>
                                <option>Bosch</option>
                                <option>Castrol</option>
                            </select>
                        </div>
                        <button class="w-full bg-slate-700 hover:bg-slate-600 text-white font-bold py-3 rounded-lg mt-4 transition border border-slate-600 uppercase tracking-wider text-sm">Filtreleri Uygula</button>
                    </div>
                </div>
            </div>

            <!-- Sağ Ürün Vitrini (Örnek Ürünler) -->
            <div class="w-full lg:w-3/4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Ürün 1 -->
                <div class="bg-slate-800 rounded-xl border border-slate-700 overflow-hidden hover:border-amber-500 transition duration-300 group shadow-lg">
                    <div class="h-48 bg-slate-900 flex items-center justify-center p-4 border-b border-slate-700">
                        <div class="text-amber-500 text-5xl">⚙️</div>
                    </div>
                    <div class="p-5">
                        <div class="text-xs text-amber-500 font-bold mb-1 tracking-wider uppercase">Brembo</div>
                        <h4 class="text-white font-semibold mb-2 group-hover:text-amber-500 transition line-clamp-2">Premium Çelik Fren Diski Seti</h4>
                        <p class="text-sm text-green-500 mb-4 font-semibold">%100 Uyum Garantisi</p>
                        <div class="flex justify-between items-center mt-auto">
                            <span class="text-xl font-bold text-white">4.250 TL</span>
                            <button class="bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold py-2 px-4 rounded transition">İncele</button>
                        </div>
                    </div>
                </div>

                <!-- Ürün 2 -->
                <div class="bg-slate-800 rounded-xl border border-slate-700 overflow-hidden hover:border-amber-500 transition duration-300 group shadow-lg">
                    <div class="h-48 bg-slate-900 flex items-center justify-center p-4 border-b border-slate-700">
                        <div class="text-amber-500 text-5xl">🔩</div>
                    </div>
                    <div class="p-5">
                        <div class="text-xs text-amber-500 font-bold mb-1 tracking-wider uppercase">Bosch</div>
                        <h4 class="text-white font-semibold mb-2 group-hover:text-amber-500 transition line-clamp-2">İridyum Performans Buji Takımı</h4>
                        <p class="text-sm text-green-500 mb-4 font-semibold">%100 Uyum Garantisi</p>
                        <div class="flex justify-between items-center mt-auto">
                            <span class="text-xl font-bold text-white">1.850 TL</span>
                            <button class="bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold py-2 px-4 rounded transition">İncele</button>
                        </div>
                    </div>
                </div>
                
                <!-- Ürün 3 -->
                <div class="bg-slate-800 rounded-xl border border-slate-700 overflow-hidden hover:border-amber-500 transition duration-300 group shadow-lg">
                    <div class="h-48 bg-slate-900 flex items-center justify-center p-4 border-b border-slate-700">
                        <div class="text-amber-500 text-5xl">🛢️</div>
                    </div>
                    <div class="p-5">
                        <div class="text-xs text-amber-500 font-bold mb-1 tracking-wider uppercase">Castrol</div>
                        <h4 class="text-white font-semibold mb-2 group-hover:text-amber-500 transition line-clamp-2">Edge 5W-30 Tam Sentetik Motor Yağı</h4>
                        <p class="text-sm text-green-500 mb-4 font-semibold">Üstün Performans</p>
                        <div class="flex justify-between items-center mt-auto">
                            <span class="text-xl font-bold text-white">1.250 TL</span>
                            <button class="bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold py-2 px-4 rounded transition">İncele</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
