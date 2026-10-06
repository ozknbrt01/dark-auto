<div class="bg-slate-900 min-h-screen text-slate-300">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-7xl mx-auto py-8 px-4">
        <!-- Sol Kolon (Görsel Alanı) -->
        <div>
            <div class="bg-slate-800 rounded-xl aspect-square flex items-center justify-center border border-slate-700 mb-4">
                <span class="text-slate-500 font-bold text-xl">Ürün Görseli</span>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-slate-800 rounded-lg aspect-square border border-slate-700 flex items-center justify-center">
                    <span class="text-slate-600 text-sm">Resim 1</span>
                </div>
                <div class="bg-slate-800 rounded-lg aspect-square border border-slate-700 flex items-center justify-center">
                    <span class="text-slate-600 text-sm">Resim 2</span>
                </div>
                <div class="bg-slate-800 rounded-lg aspect-square border border-slate-700 flex items-center justify-center">
                    <span class="text-slate-600 text-sm">Resim 3</span>
                </div>
            </div>
        </div>

        <!-- Sağ Kolon (Ürün Bilgileri) -->
        <div>
            <h1 class="text-white text-3xl font-bold mb-2">BOSCH Fren Disk Takımı</h1>
            <span class="text-slate-400 mb-4 inline-block bg-slate-800 px-2 py-1 rounded text-sm font-mono border border-slate-700">OEM: 1K0615301T</span>
            
            <div class="text-amber-500 text-4xl font-bold mb-6 font-mono">1.250 TL</div>
            
            <div class="bg-slate-800 border border-slate-700 rounded-lg p-4 mb-6">
                <h3 class="text-white font-bold mb-2 text-sm border-b border-slate-700 pb-2">Uyumlu Araçlar</h3>
                <p class="text-slate-300 text-sm">Volkswagen Golf, Jetta, Audi A3 (2010-2018)</p>
            </div>
            
            <a href="{{ route('sepetim') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg w-full flex items-center justify-center transition mb-6 shadow-lg shadow-blue-600/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Sepete Ekle
            </a>
            
            <div>
                <h3 class="text-white font-bold text-lg mb-3">Ürün Açıklaması</h3>
                <p class="text-slate-300 leading-relaxed text-sm">Teknik detaylar ve ürün özellikleri... Yüksek karbonlu döküm teknolojisi ile üretilmiş, aşırı ısınmaya ve aşınmaya karşı dayanıklı birinci sınıf fren diski. Orijinal ekipman kalitesinde tam uyum sağlar.</p>
            </div>
        </div>
    </div>
</div>
