<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dark Auto - Premium Otomotiv Ekosistemi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-200 antialiased bg-slate-900 min-h-screen flex flex-col">

    <!-- VIP DİNAMİK HEADER -->
    <header class="border-b border-slate-800 bg-slate-900/90 backdrop-blur-md sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Logo -->
            <a href="/" class="text-3xl font-black text-amber-500 tracking-widest uppercase shadow-amber-500/20 drop-shadow-lg">
                DARK AUTO
            </a>
            
            <!-- Sağ Taraf: Sepet ve Kullanıcı Paneli -->
            <div class="flex items-center space-x-4 sm:space-x-6">
                
                <!-- Sepet Butonu -->
                @php $cartCount = session('cart_count', 0); @endphp
                <a href="{{ route('cart') }}" class="relative text-slate-300 hover:text-amber-500 transition flex items-center gap-2 group">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    <span class="hidden sm:inline-block font-bold tracking-wide uppercase text-sm">Sepet</span>
                    
                    @if($cartCount > 0)
                    <!-- Kırmızı Bildirim Noktası (Sadece ürün varsa görünür) -->
                    <span class="absolute -top-2 -right-2 sm:-top-2 sm:-right-2 bg-red-500 text-white text-[10px] font-black w-5 h-5 flex items-center justify-center rounded-full border-2 border-slate-900 shadow-[0_0_10px_rgba(239,68,68,0.5)]">
                        {{ $cartCount }}
                    </span>
                    @endif
                </a>

                <div class="h-6 w-px bg-slate-700 hidden sm:block"></div>

                <!-- Oturum Kontrolü -->
                @if(session()->has('user_name') || Auth::check())
                    <!-- İçerideki Müşteri (Giriş Yapmış) -->
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-full bg-slate-800 border border-amber-500/50 flex items-center justify-center text-amber-500 font-black shadow-[0_0_10px_rgba(245,158,11,0.2)] group-hover:bg-amber-500 group-hover:text-slate-900 transition-all">
                            {{ substr(session('user_name', Auth::user()->name ?? 'V'), 0, 1) }}
                        </div>
                        <div class="hidden sm:block text-left">
                            <div class="text-[10px] text-slate-400 font-bold uppercase tracking-widest group-hover:text-amber-500 transition-colors">Garaja Dön</div>
                            <div class="text-sm text-white font-bold uppercase">{{ session('user_name', Auth::user()->name ?? 'VIP ÜYE') }}</div>
                        </div>
                    </a>
                @else
                    <!-- Dışarıdaki Müşteri (Giriş Yapmamış) -->
                    <a href="/login" class="text-slate-300 hover:text-white font-bold text-sm uppercase tracking-wide transition hidden sm:inline-block">Giriş Yap</a>
                    <a href="/register" class="bg-amber-500 hover:bg-amber-600 text-slate-900 px-5 py-2.5 rounded-lg font-black transition shadow-[0_0_15px_rgba(245,158,11,0.3)] uppercase text-xs tracking-wider">
                        Garajı Aç
                    </a>
                @endif
                
            </div>
        </div>
    </header>

    <main class="flex-grow">
        
        <!-- HERO (KAPAK) ALANI -->
        <div class="relative py-20 lg:py-32 overflow-hidden">
            <!-- Arka Plan Gradient Efekti -->
            <div class="absolute inset-0 bg-gradient-to-b from-slate-800 to-slate-900 -z-10"></div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-slate-700/30 via-slate-900/0 to-slate-900/0 -z-10"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-6 uppercase">
                    Sıradanlığı <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-600">Dikiz Aynasında</span> Bırakın.
                </h1>
                <p class="mt-4 text-base sm:text-lg text-slate-400 max-w-3xl mx-auto leading-relaxed mb-12 font-medium">
                    Kaputun altındaki güce saygı duyanlar için tasarlandı. Sadece test edilmiş, %100 uyum garantili premium parçalar ve tavizsiz satıcıların bulunduğu özel ekosistem.
                </p>

                <!-- ARAMA MOTORU -->
                <div class="max-w-4xl mx-auto bg-slate-800/80 backdrop-blur-sm p-6 sm:p-8 rounded-2xl shadow-2xl border border-slate-700 relative">
                    <form id="aramaFormu" action="{{ route('vitrin.arama') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <select id="secimMarka" name="marka" class="w-full bg-slate-900 border-slate-700 text-slate-200 rounded-lg focus:border-amber-500 focus:ring-amber-500 p-4 transition-colors outline-none cursor-pointer">
                                <option value="">Marka Seçin</option>
                                <option value="BMW">BMW</option>
                                <option value="Mercedes-Benz">Mercedes-Benz</option>
                                <option value="Audi">Audi</option>
                                <option value="Porsche">Porsche</option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <select id="secimModel" name="model" class="w-full bg-slate-900 border-slate-700 text-slate-200 rounded-lg focus:border-amber-500 focus:ring-amber-500 p-4 transition-colors outline-none cursor-pointer">
                                <option value="">Model Seçin</option>
                                <option value="3 Serisi">3 Serisi</option>
                                <option value="5 Serisi">5 Serisi</option>
                                <option value="C Serisi">C Serisi</option>
                                <option value="E Serisi">E Serisi</option>
                            </select>
                        </div>
                        <div class="flex-1 md:flex-none md:w-56">
                            <button type="submit" class="w-full h-full bg-amber-500 hover:bg-amber-600 text-slate-900 font-black py-4 px-6 rounded-lg transition-all duration-300 uppercase tracking-widest shadow-[0_0_15px_rgba(245,158,11,0.3)] hover:shadow-[0_0_25px_rgba(245,158,11,0.6)]">
                                Uyumlu Parça Bul
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- GÜVEN ZIRHI (TRUST BADGES) -->
        <div class="border-y border-slate-800 bg-slate-900/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-slate-800">
                    <div class="pt-4 md:pt-0 px-4">
                        <div class="text-amber-500 text-4xl mb-4">🛡️</div>
                        <h3 class="text-white font-bold tracking-wide uppercase mb-2">Tavizsiz Satıcı Filtresi</h3>
                        <p class="text-slate-400 text-sm">Platformumuzda sadece onaylı ve sicili temiz premium satıcılar mağaza açabilir.</p>
                    </div>
                    <div class="pt-8 md:pt-0 px-4">
                        <div class="text-amber-500 text-4xl mb-4">⚙️</div>
                        <h3 class="text-white font-bold tracking-wide uppercase mb-2">%100 Uyum Garantisi</h3>
                        <p class="text-slate-400 text-sm">Ne görüyorsanız o. Aracınıza tam uymayan hiçbir parça kapınızdan içeri giremez.</p>
                    </div>
                    <div class="pt-8 md:pt-0 px-4">
                        <div class="text-amber-500 text-4xl mb-4">🔒</div>
                        <h3 class="text-white font-bold tracking-wide uppercase mb-2">Sıfır Risk Havuzu</h3>
                        <p class="text-slate-400 text-sm">Siz ürünü görüp onay vermeden paranız satıcıya aktarılmaz, çelik kasamızda kalır.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ÖNE ÇIKAN KATEGORİLER -->
        <div class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10 border-b border-slate-800 pb-4">
                <h2 class="text-2xl sm:text-3xl font-bold text-white uppercase tracking-wide">Öne Çıkan <span class="text-amber-500">Kategoriler</span></h2>
                <a href="{{ route('kategoriler') }}" class="text-sm text-slate-400 hover:text-amber-500 transition font-bold uppercase tracking-widest hidden sm:block">Tüm Kategoriler &rarr;</a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Kategori 1 -->
                <a href="{{ route('vitrin.arama') }}" class="group block relative h-64 rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 hover:border-amber-500 transition-all duration-300 shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent z-10"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 z-20">
                        <div class="text-4xl mb-3 group-hover:-translate-y-2 transition-transform duration-300">🏎️</div>
                        <h3 class="text-xl font-bold text-white uppercase tracking-wider group-hover:text-amber-500 transition-colors">Performans Fren</h3>
                        <p class="text-slate-400 text-sm mt-1 font-medium">Disk, Balata, Kaliper</p>
                    </div>
                </a>

                <!-- Kategori 2 -->
                <a href="{{ route('vitrin.arama') }}" class="group block relative h-64 rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 hover:border-amber-500 transition-all duration-300 shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent z-10"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 z-20">
                        <div class="text-4xl mb-3 group-hover:-translate-y-2 transition-transform duration-300">⚙️</div>
                        <h3 class="text-xl font-bold text-white uppercase tracking-wider group-hover:text-amber-500 transition-colors">Motor & Mekanik</h3>
                        <p class="text-slate-400 text-sm mt-1 font-medium">Piston, Eksantrik, Turbo</p>
                    </div>
                </a>

                <!-- Kategori 3 -->
                <a href="{{ route('vitrin.arama') }}" class="group block relative h-64 rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 hover:border-amber-500 transition-all duration-300 shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent z-10"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 z-20">
                        <div class="text-4xl mb-3 group-hover:-translate-y-2 transition-transform duration-300">🚥</div>
                        <h3 class="text-xl font-bold text-white uppercase tracking-wider group-hover:text-amber-500 transition-colors">Süspansiyon</h3>
                        <p class="text-slate-400 text-sm mt-1 font-medium">Coilover, Amortisör, Yay</p>
                    </div>
                </a>

                <!-- Kategori 4 -->
                <a href="{{ route('vitrin.arama') }}" class="group block relative h-64 rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 hover:border-amber-500 transition-all duration-300 shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent z-10"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-6 z-20">
                        <div class="text-4xl mb-3 group-hover:-translate-y-2 transition-transform duration-300">🛢️</div>
                        <h3 class="text-xl font-bold text-white uppercase tracking-wider group-hover:text-amber-500 transition-colors">Sıvı & Bakım</h3>
                        <p class="text-slate-400 text-sm mt-1 font-medium">Sentetik Yağlar, Katkılar</p>
                    </div>
                </a>

            </div>
        </div>
    </main>

    <!-- FOOTER ALANI (Önceden hazırlanan x-footer bileşeni) -->
    <x-footer />

    <!-- JAVASCRIPT: BOŞ ARAMA ENGELLEYİCİ VE KIRMIZI EFEKT -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('aramaFormu');
            const marka = document.getElementById('secimMarka');
            const model = document.getElementById('secimModel');

            if(form && marka && model) {
                form.addEventListener('submit', function(e) {
                    let hasError = false;

                    // Önce eski hataları temizle
                    marka.classList.remove('border-red-500', 'ring-red-500', 'ring-1');
                    model.classList.remove('border-red-500', 'ring-red-500', 'ring-1');
                    
                    // Marka seçili mi?
                    if(marka.value === '') {
                        marka.classList.add('border-red-500', 'ring-red-500', 'ring-1');
                        hasError = true;
                    }
                    
                    // Model seçili mi?
                    if(model.value === '') {
                        model.classList.add('border-red-500', 'ring-red-500', 'ring-1');
                        hasError = true;
                    }

                    if(hasError) {
                        e.preventDefault(); 
                    }
                });

                marka.addEventListener('change', function() {
                    if(this.value !== '') this.classList.remove('border-red-500', 'ring-red-500', 'ring-1');
                });
                model.addEventListener('change', function() {
                    if(this.value !== '') this.classList.remove('border-red-500', 'ring-red-500', 'ring-1');
                });
            }
        });
    </script>
</body>
</html>
