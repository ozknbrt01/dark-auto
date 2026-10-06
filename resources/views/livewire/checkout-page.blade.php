<div class="bg-slate-900 min-h-screen py-10 px-4 text-slate-300">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-white mb-8">Güvenli Ödeme</h1>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Sol Kolon (Adres ve Ödeme Formları %65) -->
            <div class="lg:col-span-2">
                
                <!-- Teslimat Adresi Kutusu -->
                <div class="bg-slate-800 rounded-lg p-6 border border-slate-700 mb-6 shadow-lg">
                    <h2 class="text-white text-xl font-bold mb-6 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Teslimat Adresi
                    </h2>
                    
                    <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-slate-400 text-sm mb-1">Ad Soyad</label>
                            <input type="text" placeholder="Adınız Soyadınız" class="bg-slate-900 border border-slate-700 text-white rounded w-full px-4 py-2 focus:ring-amber-500 focus:border-amber-500 transition">
                        </div>
                        <div>
                            <label class="block text-slate-400 text-sm mb-1">Telefon Numarası</label>
                            <input type="tel" placeholder="0(5XX) XXX XX XX" class="bg-slate-900 border border-slate-700 text-white rounded w-full px-4 py-2 focus:ring-amber-500 focus:border-amber-500 transition">
                        </div>
                        <div>
                            <label class="block text-slate-400 text-sm mb-1">İl</label>
                            <select class="bg-slate-900 border border-slate-700 text-white rounded w-full px-4 py-2 focus:ring-amber-500 focus:border-amber-500 transition">
                                <option>İstanbul</option>
                                <option>Ankara</option>
                                <option>İzmir</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-slate-400 text-sm mb-1">İlçe</label>
                            <select class="bg-slate-900 border border-slate-700 text-white rounded w-full px-4 py-2 focus:ring-amber-500 focus:border-amber-500 transition">
                                <option>Kadıköy</option>
                                <option>Beşiktaş</option>
                                <option>Şişli</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-slate-400 text-sm mb-1">Açık Adres</label>
                            <textarea rows="3" placeholder="Mahalle, sokak, bina ve daire no..." class="bg-slate-900 border border-slate-700 text-white rounded w-full px-4 py-2 focus:ring-amber-500 focus:border-amber-500 transition"></textarea>
                        </div>
                    </form>
                </div>
                
                <!-- Ödeme Bilgileri Kutusu -->
                <div class="bg-slate-800 rounded-lg p-6 border border-slate-700 shadow-lg">
                    <h2 class="text-white text-xl font-bold mb-6 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        Kredi Kartı Bilgileri <span class="text-emerald-400 text-sm font-normal ml-2 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" /></svg>(Güvenli Ödeme)</span>
                    </h2>
                    
                    <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-slate-400 text-sm mb-1">Kart Üzerindeki İsim</label>
                            <input type="text" placeholder="İsim Soyisim" class="bg-slate-900 border border-slate-700 text-white rounded w-full px-4 py-2 focus:ring-amber-500 focus:border-amber-500 transition">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-slate-400 text-sm mb-1">Kart Numarası</label>
                            <input type="text" placeholder="XXXX XXXX XXXX XXXX" class="bg-slate-900 border border-slate-700 text-white rounded w-full px-4 py-2 focus:ring-amber-500 focus:border-amber-500 transition font-mono tracking-widest">
                        </div>
                        <div>
                            <label class="block text-slate-400 text-sm mb-1">Son Kullanma Tarihi</label>
                            <input type="text" placeholder="AA/YY" class="bg-slate-900 border border-slate-700 text-white rounded w-full px-4 py-2 focus:ring-amber-500 focus:border-amber-500 transition font-mono text-center">
                        </div>
                        <div>
                            <label class="block text-slate-400 text-sm mb-1">CVV</label>
                            <input type="text" placeholder="XXX" class="bg-slate-900 border border-slate-700 text-white rounded w-full px-4 py-2 focus:ring-amber-500 focus:border-amber-500 transition font-mono text-center">
                        </div>
                    </form>
                </div>
                
            </div>
            
            <!-- Sağ Kolon (Sipariş Özeti %35) -->
            <div class="lg:col-span-1">
                <div class="bg-slate-800 rounded-lg p-6 border border-slate-700 shadow-lg sticky top-24">
                    <h2 class="text-white text-xl font-bold mb-6 border-b border-slate-700 pb-2">Sipariş Özeti</h2>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-slate-300">
                            <span>Ara Toplam</span>
                            <span class="font-mono">1.250 TL</span>
                        </div>
                        <div class="flex justify-between text-slate-300 pb-4 border-b border-slate-700">
                            <span>Kargo Ücreti</span>
                            <span class="font-mono">49 TL</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-end mb-8">
                        <span class="text-white font-bold text-lg">Genel Toplam</span>
                        <span class="text-amber-500 font-bold text-3xl font-mono leading-none">1.299 TL</span>
                    </div>
                    
                    <button class="bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold py-4 w-full rounded-md transition shadow-lg flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Siparişi Onayla
                    </button>
                    
                    <p class="text-xs text-slate-500 mt-4 text-center">
                        Siparişi onayla butonuna basarak <a href="#" class="text-blue-400 hover:underline">Mesafeli Satış Sözleşmesini</a> kabul etmiş sayılırsınız.
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</div>
