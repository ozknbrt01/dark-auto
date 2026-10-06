<footer class="bg-slate-950 text-slate-400 mt-auto">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 py-10 px-6 max-w-7xl mx-auto">
        <!-- Kolon 1 -->
        <div>
            <h3 class="text-white font-bold mb-4 text-lg">Oto Market</h3>
            <p class="text-sm">Otomobiliniz için en doğru parçayı, en uygun fiyata, anında bulun. Güvenli alışveriş ve hızlı kargo ile hizmetinizdeyiz.</p>
        </div>
        
        <!-- Kolon 2 -->
        <div>
            <h3 class="text-white font-bold mb-4 uppercase tracking-wider">Kurumsal</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('about') }}" class="block !text-slate-300 hover:!text-amber-500 transition duration-300">Hakkımızda</a></li>
                <li><a href="{{ route('faq') }}" class="block !text-slate-300 hover:!text-amber-500 transition duration-300">Sıkça Sorulan Sorular</a></li>
                <li><a href="{{ route('iletisim') }}" class="block !text-slate-300 hover:!text-amber-500 transition duration-300">İletişim</a></li>
            </ul>
        </div>
        
        <!-- Kolon 3 -->
        <div>
            <h3 class="text-white font-bold mb-4 uppercase tracking-wider">Müşteri Hizmetleri</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('kargo.takibi') }}" class="block !text-slate-300 hover:!text-amber-500 transition duration-300">Kargo Takibi</a></li>
                <li><a href="{{ route('iade.iptal') }}" class="block !text-slate-300 hover:!text-amber-500 transition duration-300">İade ve İptal Şartları</a></li>
                <li><a href="#" class="block !text-slate-300 hover:!text-amber-500 transition duration-300">Bize Ulaşın</a></li>
            </ul>
        </div>
        
        <!-- Kolon 4 -->
        <div>
            <h3 class="text-white font-bold mb-4 text-lg">Hızlı Menü</h3>
            <ul class="space-y-2 text-sm">

                <li><a href="{{ route('login') }}" class="hover:text-amber-500 transition">Giriş Yap</a></li>
                <li><a href="{{ route('register') }}" class="hover:text-amber-500 transition">Kaydol</a></li>
                <li>
                    <a href="{{ route('satici.ol') }}" class="hover:text-amber-500 transition block mt-2 text-amber-500 font-semibold">Satıcı Ol</a>
                    <a href="{{ url('/vendor/login') }}" class="hover:text-amber-500 transition block mt-2 text-slate-400">Mağaza Girişi</a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="border-t border-slate-800 pt-4 pb-6 text-center text-sm">
        &copy; {{ date('Y') }} Oto Market. Tüm hakları saklıdır.
    </div>
</footer>
