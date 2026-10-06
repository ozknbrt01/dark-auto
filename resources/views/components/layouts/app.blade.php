<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oto Parça - Parça Bul</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-slate-900 text-slate-200 font-sans antialiased flex flex-col min-h-screen">
    
    <!-- Şık Header (Üst Menü) -->
    <header class="bg-slate-800 border-b border-slate-700 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="text-2xl font-black text-white tracking-tighter">OTO<span class="text-amber-400">PARÇA</span></a>
            
            <!-- Sağ Menü -->
            <div class="flex items-center gap-6">
                <a href="{{ route('sepetim') }}" class="relative p-2 text-slate-200 hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    <span class="absolute top-0 right-0 -mt-1 -mr-1 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">
                        {{ count(session('cart', [])) }}
                    </span>
                </a>
                <a href="/vendor/login" class="text-sm font-medium text-slate-200 hover:text-white transition">Mağaza Girişi</a>
                <a href="{{ route('login') }}" class="text-sm bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-bold transition">Giriş Yap</a>
            </div>
        </div>
    </header>

    <!-- Ana İçerik (Livewire sayfaları buraya enjekte edilecek) -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer (Alt Bilgi) -->
    <x-footer />

    @livewireScripts
</body>
</html>
