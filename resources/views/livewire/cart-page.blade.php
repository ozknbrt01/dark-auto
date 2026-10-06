<div class="bg-slate-900 min-h-screen py-10 px-4 text-slate-300">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Sol Kolon (Ürünler %70 => md:col-span-2) -->
        <div class="md:col-span-2 bg-slate-800 rounded-lg p-6 border border-slate-700 shadow-lg">
            <h1 class="text-white text-2xl font-bold mb-4">Alışveriş Sepetim</h1>
            
            <!-- Örnek Ürün Satırı -->
            <div class="flex flex-col sm:flex-row items-center justify-between border-t border-slate-700 py-6 gap-4">
                <div class="flex items-center gap-4 w-full sm:w-auto">
                    <div class="w-24 h-24 bg-slate-700 rounded-md flex items-center justify-center border border-slate-600 shrink-0">
                        <span class="text-slate-500 text-xs font-semibold">Görsel</span>
                    </div>
                    <div>
                        <h3 class="text-slate-300 font-semibold text-lg hover:text-amber-500 transition cursor-pointer">BOSCH Fren Disk Takımı</h3>
                        <div class="text-slate-400 text-sm mt-1 font-mono">OEM: 1K0615301T</div>
                    </div>
                </div>
                
                <div class="flex items-center justify-between w-full sm:w-auto sm:justify-end gap-6 mt-4 sm:mt-0">
                    <!-- Adet Seçici -->
                    <div class="flex items-center border border-slate-600 rounded bg-slate-900">
                        <button class="px-3 py-1 text-slate-400 hover:text-white hover:bg-slate-700 transition">-</button>
                        <span class="px-4 py-1 text-white text-sm font-semibold border-x border-slate-600">1</span>
                        <button class="px-3 py-1 text-slate-400 hover:text-white hover:bg-slate-700 transition">+</button>
                    </div>
                    
                    <div class="text-amber-500 font-bold font-mono text-lg">1.250 TL</div>
                    
                    <button class="text-slate-500 hover:text-red-500 p-2 transition bg-slate-900 hover:bg-red-500/10 rounded" title="Sil">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
            
        </div>
        
        <!-- Sağ Kolon (Sipariş Özeti %30 => md:col-span-1) -->
        <div class="md:col-span-1">
            <div class="bg-slate-800 rounded-lg p-6 border border-slate-700 shadow-lg sticky top-24">
                <h2 class="text-white text-xl font-bold mb-6 border-b border-slate-700 pb-2">Sipariş Özeti</h2>
                
                <div class="flex justify-between text-slate-300 mb-3 text-sm">
                    <span>Ara Toplam</span>
                    <span class="font-mono font-medium">1.250 TL</span>
                </div>
                <div class="flex justify-between text-slate-300 mb-4 pb-4 border-b border-slate-700 text-sm">
                    <span>Kargo</span>
                    <span class="text-emerald-400 font-semibold">Ücretsiz</span>
                </div>
                
                <div class="flex justify-between items-center mb-6">
                    <span class="text-white font-bold">Genel Toplam:</span>
                    <span class="text-amber-500 font-bold text-2xl font-mono">1.250 TL</span>
                </div>
                
                @auth
                    <a href="{{ route('odeme') }}" class="bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold py-3 w-full rounded-md mt-4 text-center block transition">Ödemeye Geç</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 w-full rounded-md mt-4 text-center block transition">Siparişi Tamamlamak İçin Giriş Yapın</a>
                @endguest
                
                <div class="mt-4 flex items-center justify-center gap-2 text-xs text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    256-Bit SSL ile Güvenli Ödeme
                </div>
            </div>
        </div>
        
    </div>
</div>
