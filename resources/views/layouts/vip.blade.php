<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VIP Panel - Dark Auto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-200 antialiased bg-slate-900 min-h-screen flex flex-col">

    <header class="border-b border-slate-800 bg-slate-900/90 backdrop-blur-md sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="/" class="text-3xl font-black text-amber-500 tracking-widest uppercase shadow-amber-500/20 drop-shadow-lg">DARK AUTO</a>
            <div class="flex items-center space-x-6">
                <!-- SEPET İKONU -->
                @php $cartCount = session('cart_count', 0); @endphp
                <a href="{{ route('cart') }}" class="relative text-slate-300 hover:text-amber-500 transition flex items-center gap-2 group">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    <span class="hidden sm:inline-block font-bold tracking-wide uppercase text-sm">Sepet</span>
                    <span id="cart-badge" class="{{ $cartCount > 0 ? 'flex' : 'hidden' }} absolute -top-2 -right-2 sm:-top-2 sm:-right-2 bg-red-500 text-white text-[10px] font-black w-5 h-5 items-center justify-center rounded-full border-2 border-slate-900 shadow-[0_0_10px_rgba(239,68,68,0.5)] transition-all">
                        {{ $cartCount }}
                    </span>
                </a>
                <div class="h-6 w-px bg-slate-700 hidden sm:block"></div>
                <!-- PROFİL -->
                <span class="text-slate-400 font-medium hidden sm:inline-block tracking-wide">
                    Hoş Geldiniz, <span class="text-white font-bold uppercase">{{ session('user_name', Auth::user()->name ?? 'VIP ÜYE') }}</span>
                </span>
                <form method="POST" action="{{ url('/cikis-yap') }}" class="m-0" translate="no">
                    @csrf
                    <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-white px-5 py-2.5 rounded-lg font-bold transition border border-slate-600 hover:border-red-500 hover:text-red-400 uppercase text-xs tracking-wider">Kontağı Kapat</button>
                </form>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto w-full py-10 px-4 sm:px-6 lg:px-8 flex-grow flex flex-col lg:flex-row gap-8">
        
        <!-- SOL MENÜ (YENİLENMİŞ ZARİF TASARIM) -->
        <div class="w-full lg:w-1/4">
            <div class="bg-slate-800 rounded-2xl border border-slate-700 overflow-hidden sticky top-28 shadow-2xl py-4">
                <nav class="flex flex-col space-y-1">
                    
                    <!-- Benim Garajım -->
                    <a href="{{ route('dashboard') }}" class="px-6 py-4 flex items-center gap-4 transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-amber-500/20 border-l-4 border-amber-500 text-white font-bold' : 'text-slate-400 hover:text-amber-500 hover:bg-slate-700/50 border-l-4 border-transparent font-medium' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-amber-500' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l1.3-3.9A2 2 0 016.2 4.5h11.6a2 2 0 011.9 1.6L21 10m-18 0l-1 7h20l-1-7m-18 0h18M5 14h.01M19 14h.01M9 14h6" /></svg>
                        <span class="text-base tracking-wide">Benim Garajım</span>
                    </a>
                    
                    <!-- Siparişlerim -->
                    <a href="{{ route('orders') }}" class="px-6 py-4 flex items-center gap-4 transition-all duration-300 {{ request()->routeIs('orders') ? 'bg-amber-500/20 border-l-4 border-amber-500 text-white font-bold' : 'text-slate-400 hover:text-amber-500 hover:bg-slate-700/50 border-l-4 border-transparent font-medium' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('orders') ? 'text-amber-500' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        <span class="text-base tracking-wide">Siparişlerim</span>
                    </a>
                    
                    <!-- Favorilerim -->
                    <a href="{{ route('favorites') }}" class="px-6 py-4 flex items-center gap-4 transition-all duration-300 {{ request()->routeIs('favorites') ? 'bg-amber-500/20 border-l-4 border-amber-500 text-white font-bold' : 'text-slate-400 hover:text-amber-500 hover:bg-slate-700/50 border-l-4 border-transparent font-medium' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('favorites') ? 'text-amber-500' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                        <span class="text-base tracking-wide">Favorilerim</span>
                    </a>
                    
                    <!-- Hesap Ayarları -->
                    <a href="{{ route('settings') }}" class="px-6 py-4 flex items-center gap-4 transition-all duration-300 {{ request()->routeIs('settings') ? 'bg-amber-500/20 border-l-4 border-amber-500 text-white font-bold' : 'text-slate-400 hover:text-amber-500 hover:bg-slate-700/50 border-l-4 border-transparent font-medium' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('settings') ? 'text-amber-500' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        <span class="text-base tracking-wide">Hesap Ayarları</span>
                    </a>
                    
                </nav>
            </div>
        </div>

        <!-- SAĞ İÇERİK BÖLÜMÜ (DEĞİŞEN KISIM) -->
        <div class="w-full lg:w-3/4 space-y-8">
            @yield('panel-icerik')
        </div>
    </div>
    <script>
        document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                let originalContent = this.innerHTML;
                // Yükleniyor efekti
                this.innerHTML = '<span class="animate-spin text-xl">⚙️</span>';
                
                fetch('{{ route('cart.add') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    // Başarılı efekti (Yeşil Tik)
                    this.innerHTML = '<span class="text-xl">✅</span>';
                    this.classList.replace('bg-slate-700', 'bg-emerald-500');
                    this.classList.replace('hover:bg-amber-500', 'hover:bg-emerald-600');
                    
                    // Sepet rozetini güncelle
                    let badge = document.getElementById('cart-badge');
                    if(badge) {
                        badge.innerText = data.count;
                        badge.classList.remove('hidden');
                        badge.classList.add('flex', 'animate-bounce');
                        setTimeout(() => badge.classList.remove('animate-bounce'), 1000);
                    }
                    
                    // Butonu 2 saniye sonra eski haline döndür
                    setTimeout(() => {
                        this.innerHTML = originalContent;
                        this.classList.replace('bg-emerald-500', 'bg-slate-700');
                        this.classList.replace('hover:bg-emerald-600', 'hover:bg-amber-500');
                    }, 2000);
                });
            });
        });
    </script>
</body>
</html>
