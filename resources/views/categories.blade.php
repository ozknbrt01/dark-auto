<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kategoriler - Dark Auto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-200 antialiased bg-slate-900 min-h-screen flex flex-col">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 w-full flex-grow">
        
        <!-- Üst Bar -->
        <div class="mb-10 flex justify-between items-center border-b border-slate-800 pb-6">
            <a href="/" class="text-3xl font-black text-amber-500 tracking-widest uppercase">DARK AUTO</a>
            <a href="/" class="text-sm text-slate-400 hover:text-amber-500 transition font-bold uppercase tracking-wide">Ana Sayfaya Dön</a>
        </div>

        <!-- Başlık -->
        <div class="text-center mb-16">
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white uppercase tracking-widest mb-4">Premium <span class="text-amber-500">Katalog</span></h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto">Aracınızın DNA'sını oluşturan tüm donanımlar. Tavizsiz kalite standartlarından geçmiş sistem grupları.</p>
        </div>

        <!-- Kategoriler Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <!-- Kat 1 -->
            <a href="{{ route('vitrin.arama', ['kategori' => 'fren-sistemi']) }}" class="group block relative h-48 rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 hover:border-amber-500 transition-all duration-300 shadow-lg text-center flex flex-col justify-center items-center">
                <div class="text-5xl mb-3 group-hover:scale-110 transition-transform duration-300">🏎️</div>
                <h3 class="text-lg font-bold text-white uppercase tracking-wider group-hover:text-amber-500 transition-colors">Fren Sistemi</h3>
            </a>

            <!-- Kat 2 -->
            <a href="{{ route('vitrin.arama', ['kategori' => 'motor-mekanik']) }}" class="group block relative h-48 rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 hover:border-amber-500 transition-all duration-300 shadow-lg text-center flex flex-col justify-center items-center">
                <div class="text-5xl mb-3 group-hover:scale-110 transition-transform duration-300">⚙️</div>
                <h3 class="text-lg font-bold text-white uppercase tracking-wider group-hover:text-amber-500 transition-colors">Motor & Mekanik</h3>
            </a>

            <!-- Kat 3 -->
            <a href="{{ route('vitrin.arama', ['kategori' => 'suspansiyon']) }}" class="group block relative h-48 rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 hover:border-amber-500 transition-all duration-300 shadow-lg text-center flex flex-col justify-center items-center">
                <div class="text-5xl mb-3 group-hover:scale-110 transition-transform duration-300">🚥</div>
                <h3 class="text-lg font-bold text-white uppercase tracking-wider group-hover:text-amber-500 transition-colors">Süspansiyon</h3>
            </a>

            <!-- Kat 4 -->
            <a href="{{ route('vitrin.arama', ['kategori' => 'sivi-bakim']) }}" class="group block relative h-48 rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 hover:border-amber-500 transition-all duration-300 shadow-lg text-center flex flex-col justify-center items-center">
                <div class="text-5xl mb-3 group-hover:scale-110 transition-transform duration-300">🛢️</div>
                <h3 class="text-lg font-bold text-white uppercase tracking-wider group-hover:text-amber-500 transition-colors">Sıvı & Bakım</h3>
            </a>

            <!-- Kat 5 -->
            <a href="{{ route('vitrin.arama', ['kategori' => 'filtreler']) }}" class="group block relative h-48 rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 hover:border-amber-500 transition-all duration-300 shadow-lg text-center flex flex-col justify-center items-center">
                <div class="text-5xl mb-3 group-hover:scale-110 transition-transform duration-300">🌬️</div>
                <h3 class="text-lg font-bold text-white uppercase tracking-wider group-hover:text-amber-500 transition-colors">Filtre Grubu</h3>
            </a>

            <!-- Kat 6 -->
            <a href="{{ route('vitrin.arama', ['kategori' => 'elektrik-aydinlatma']) }}" class="group block relative h-48 rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 hover:border-amber-500 transition-all duration-300 shadow-lg text-center flex flex-col justify-center items-center">
                <div class="text-5xl mb-3 group-hover:scale-110 transition-transform duration-300">⚡</div>
                <h3 class="text-lg font-bold text-white uppercase tracking-wider group-hover:text-amber-500 transition-colors">Elektrik & Aydınlatma</h3>
            </a>

            <!-- Kat 7 -->
            <a href="{{ route('vitrin.arama', ['kategori' => 'egzoz']) }}" class="group block relative h-48 rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 hover:border-amber-500 transition-all duration-300 shadow-lg text-center flex flex-col justify-center items-center">
                <div class="text-5xl mb-3 group-hover:scale-110 transition-transform duration-300">💨</div>
                <h3 class="text-lg font-bold text-white uppercase tracking-wider group-hover:text-amber-500 transition-colors">Egzoz Sistemi</h3>
            </a>

            <!-- Kat 8 -->
            <a href="{{ route('vitrin.arama', ['kategori' => 'dis-trim']) }}" class="group block relative h-48 rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 hover:border-amber-500 transition-all duration-300 shadow-lg text-center flex flex-col justify-center items-center">
                <div class="text-5xl mb-3 group-hover:scale-110 transition-transform duration-300">🛡️</div>
                <h3 class="text-lg font-bold text-white uppercase tracking-wider group-hover:text-amber-500 transition-colors">Dış Trim & Karoser</h3>
            </a>

        </div>
    </div>
</body>
</html>
