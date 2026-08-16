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
                <a href="/vendor/login" class="hover:text-amber-400 transition flex items-center gap-1">
                    <span>🏪</span> Satıcı Girişi
                </a>
                <span class="text-slate-600">|</span>
                <a href="/admin/login" class="hover:text-blue-400 transition flex items-center gap-1">
                    <span>👑</span> Yönetici Girişi
                </a>
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
                    <form action="{{ route('products.search') }}" method="GET" class="relative">
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
                <div class="flex items-center gap-3">
                    @livewire('cart-counter')

                    <a href="/admin" class="hidden sm:flex items-center gap-2 text-xs font-semibold bg-slate-800/80 hover:bg-slate-700 text-slate-200 border border-slate-700/60 px-3.5 py-2 rounded-xl transition">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Yönetici</span>
                    </a>

                    <a href="/vendor" class="flex items-center gap-2 text-xs font-semibold bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 px-3.5 py-2 rounded-xl transition shadow-lg shadow-amber-500/20">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <span>Satıcı</span>
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
    <footer class="bg-[#070a12] border-t border-slate-800/80 text-slate-400 py-12 mt-16 text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <span class="text-xl font-black text-white flex items-center gap-1 mb-3">
                        OTO<span class="text-amber-400">MARKET</span>
                    </span>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Türkiye'nin lider otomotiv yedek parça ve aksesuar pazaryeri. Birebir araç uyumluluk garantisi ve 100.000+ OEM referansı.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-3 text-sm">Popüler Kategoriler</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="#" class="hover:text-white transition">Fren Sistemi & Balatalar</a></li>
                        <li><a href="#" class="hover:text-white transition">Filtre Setleri (Yağ, Hava, Polen)</a></li>
                        <li><a href="#" class="hover:text-white transition">Debriyaj & Şanzıman</a></li>
                        <li><a href="#" class="hover:text-white transition">Süspansiyon & Amortisör</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-3 text-sm">Pazaryeri & Satıcılar</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="/vendor/login" class="hover:text-white transition">Mağaza Aç / Satıcı Ol</a></li>
                        <li><a href="/vendor" class="hover:text-white transition">Satıcı Yönetim Portalı</a></li>
                        <li><a href="#" class="hover:text-white transition">Komisyon Oranları & Şartlar</a></li>
                        <li><a href="#" class="hover:text-white transition">Kargo Entegrasyonları</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-3 text-sm">Güvenli Alışveriş</h4>
                    <div class="bg-slate-900/80 border border-slate-800 p-3.5 rounded-xl text-xs space-y-2">
                        <div class="flex items-center gap-2 text-emerald-400 font-medium">
                            <span>🛡️</span> 256-Bit SSL Koruması
                        </div>
                        <div class="flex items-center gap-2 text-blue-400 font-medium">
                            <span>🚗</span> Birebir Fitment Garantisi
                        </div>
                        <div class="flex items-center gap-2 text-amber-400 font-medium">
                            <span>📦</span> Hızlı Teslimat & Kolay İade
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-800/60 pt-6 text-center text-xs text-slate-500">
                &copy; {{ date('Y') }} OtoMarket Pazaryeri Platformu. Tüm hakları saklıdır. Laravel & Livewire v3 ile güçlendirilmiştir.
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
