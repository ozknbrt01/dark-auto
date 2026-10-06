<!DOCTYPE html>
<html lang="tr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'OtoMarket - Otomotiv Yedek Parça & Aksesuar Pazaryeri')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#0f172a',
                        },
                        accent: {
                            400: '#fbbf24',
                            500: '#f59e0b',
                            600: '#d97706',
                        }
                    }
                }
            }
        }
    </script>
    
    @livewireStyles
</head>
<body class="bg-[#0b0f19] text-slate-100 min-h-full flex flex-col antialiased selection:bg-blue-500 selection:text-white">

    <!-- Üst Bilgi Çubuğu (Top Bar) -->
    <div class="bg-[#070a12] border-b border-slate-800/80 text-xs py-2 px-4 text-slate-400">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1.5 text-emerald-400 font-medium">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    100.000+ OEM Parça ve Araç Uyumluluk Motoru Aktif
                </span>
                <span class="hidden sm:inline text-slate-600">|</span>
                <span class="hidden sm:inline">Tüm Türkiye'ye Hızlı Kargo</span>
            </div>
            <div class="flex items-center gap-4">
                <!-- Satıcı ve Yönetici linkleri kaldırıldı -->
            </div>
        </div>
    </div>

    <!-- Ana Navigasyon (Navbar) -->
    <header class="bg-[#0e1424]/90 backdrop-blur-md sticky top-0 z-50 border-b border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 gap-4">
                
                <!-- Logo -->
                <a href="/" class="flex items-center gap-3 group flex-shrink-0">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-blue-600 to-amber-500 flex items-center justify-center shadow-lg shadow-blue-500/20 group-hover:scale-105 transition">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="text-2xl font-black tracking-tight text-white flex items-center gap-1">
                            OTO<span class="text-amber-400">MARKET</span>
                        </span>
                        <span class="text-[10px] tracking-widest text-slate-400 uppercase font-semibold block -mt-1">Yedek Parça Pazaryeri</span>
                    </div>
                </a>

                <!-- Orta OEM & Parça Arama Çubuğu -->
                <div class="flex-1 max-w-2xl hidden md:block">
                    <form action="{{ route('vitrin.arama') }}" method="GET" class="relative">
                        <div class="relative flex items-center">
                            <input 
                                type="text" 
                                name="search_term" 
                                value="{{ request('search_term', request('q')) }}"
                                placeholder="OEM Kodu, Parça Adı veya Barkod ile arayın... (Örn: 06A 115 561 B)" 
                                class="w-full bg-[#161f36] border border-slate-700/80 rounded-xl py-3 pl-11 pr-28 text-sm text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            >
                            <div class="absolute left-3.5 text-slate-400 pointer-events-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <button 
                                type="submit" 
                                class="absolute right-1.5 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white font-medium text-xs px-4 py-2 rounded-lg transition shadow-md shadow-blue-600/30 flex items-center gap-1"
                            >
                                <span>OEM Ara</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Sağ Menü Butonları -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('sepetim') }}" class="relative text-slate-300 hover:text-amber-500 transition flex items-center gap-1 mr-2">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="absolute -top-2 -right-3 bg-red-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">2</span>
                        </div>
                        <span class="text-sm font-medium">Sepetim</span>
                    </a>
                    <a href="{{ route('login') }}" class="text-slate-200 hover:text-white font-medium text-sm transition">
                        Giriş Yap
                    </a>
                    <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-sm transition">
                        Kaydol
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Ana Sayfa İçeriği -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Alt Bilgi (Footer) -->
    <x-footer />

    @livewireScripts
</body>
</html>
