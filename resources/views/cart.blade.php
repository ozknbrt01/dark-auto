@extends('layouts.vip')

@section('panel-icerik')
<div class="border-b border-slate-700 pb-5 mb-8 flex justify-between items-end">
    <div>
        <h2 class="text-2xl sm:text-3xl font-black text-white uppercase tracking-widest flex items-center gap-3">
            <span class="text-amber-500">🛒</span> Alışveriş Sepeti
        </h2>
        <p class="text-slate-400 font-medium mt-2">Seçtiğiniz premium parçalar ve güvenli ödeme terminali.</p>
    </div>
</div>

@if(session('cart_count', 0) > 0)
    <!-- DOLU SEPET TASARIMI -->
    <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- Sol Bölüm: Ürün Listesi -->
        <div class="w-full lg:w-2/3 space-y-6">
            <div class="bg-slate-800 rounded-2xl border border-slate-700 p-6 flex flex-col sm:flex-row items-center gap-6 shadow-xl relative overflow-hidden group">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 bg-amber-500/5 rounded-full blur-3xl z-0 group-hover:bg-amber-500/10 transition-all"></div>
                
                <div class="w-32 h-32 bg-slate-900 rounded-xl flex items-center justify-center text-6xl shrink-0 border border-slate-700 shadow-inner z-10">🏎️</div>
                
                <div class="flex-grow text-center sm:text-left z-10">
                    <div class="text-[10px] font-black text-amber-500 tracking-widest uppercase mb-2">Stokta Mevcut</div>
                    <h3 class="text-xl font-bold text-white uppercase mb-1">Akrapovic Titanyum Egzoz Sistemi</h3>
                    <p class="text-slate-400 text-sm mb-4">Karbon fiber uçlu, aktif valf sistemli premium donanım.</p>
                    <div class="flex items-center justify-center sm:justify-start gap-6">
                        <span class="text-2xl font-black text-white tracking-wider">125.000 ₺</span>
                        <div class="flex items-center bg-slate-900 rounded-lg border border-slate-700 overflow-hidden">
                            <button class="px-4 py-1.5 text-slate-400 hover:text-amber-500 hover:bg-slate-800 transition font-bold">-</button>
                            <span class="px-4 py-1.5 text-white font-bold text-sm bg-slate-800/50">{{ session('cart_count', 1) }}</span>
                            <button class="px-4 py-1.5 text-slate-400 hover:text-amber-500 hover:bg-slate-800 transition font-bold">+</button>
                        </div>
                    </div>
                </div>
                
                <button class="absolute top-4 right-4 text-slate-600 hover:text-red-500 transition-colors z-10" title="Sepetten Çıkar">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                </button>
            </div>
        </div>

        <!-- Sağ Bölüm: Ödeme Özeti -->
        <div class="w-full lg:w-1/3">
            <div class="bg-slate-800 rounded-2xl border border-amber-500/30 p-6 shadow-[0_0_25px_rgba(245,158,11,0.05)] sticky top-28">
                <h3 class="text-lg font-bold text-white uppercase tracking-widest mb-6 border-b border-slate-700 pb-4">Ödeme Terminali</h3>
                
                <div class="space-y-4 mb-6">
                    <div class="flex justify-between text-slate-400 font-medium text-sm">
                        <span>Ara Toplam</span>
                        <span class="text-white">{{ number_format(125000 * session('cart_count', 1), 0, ',', '.') }} ₺</span>
                    </div>
                    <div class="flex justify-between text-slate-400 font-medium text-sm">
                        <span>Lojistik (VIP Kargo)</span>
                        <span class="text-emerald-400 font-bold">ÜCRETSİZ</span>
                    </div>
                    <div class="flex justify-between text-slate-400 font-medium text-sm">
                        <span>Vergiler (KDV %20)</span>
                        <span class="text-white">{{ number_format(25000 * session('cart_count', 1), 0, ',', '.') }} ₺</span>
                    </div>
                </div>
                
                <div class="flex justify-between items-center border-t border-slate-700 pt-6 mb-8">
                    <span class="text-sm font-bold text-slate-400 uppercase tracking-widest">Genel Toplam</span>
                    <span class="text-3xl font-black text-amber-500">{{ number_format(150000 * session('cart_count', 1), 0, ',', '.') }} ₺</span>
                </div>
                
                <button class="w-full bg-amber-500 hover:bg-amber-600 text-slate-900 font-black py-4 rounded-xl transition-all shadow-[0_0_20px_rgba(245,158,11,0.3)] hover:shadow-[0_0_30px_rgba(245,158,11,0.5)] uppercase tracking-widest text-sm flex items-center justify-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                    Güvenli Ödemeye Geç
                </button>
                
                <div class="mt-6 flex flex-col items-center gap-2">
                    <span class="text-slate-500 text-[10px] uppercase font-bold tracking-widest">🔒 256-Bit Şifrelenmiş Bağlantı</span>
                    <div class="flex gap-2">
                        <span class="px-2 py-1 bg-slate-900 rounded border border-slate-700 text-slate-400 text-[10px] font-black">VISA</span>
                        <span class="px-2 py-1 bg-slate-900 rounded border border-slate-700 text-slate-400 text-[10px] font-black">MASTERCARD</span>
                        <span class="px-2 py-1 bg-slate-900 rounded border border-slate-700 text-slate-400 text-[10px] font-black">AMEX</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@else
    <!-- BOŞ SEPET TASARIMI -->
    <div class="bg-slate-800 rounded-2xl border border-slate-700 p-12 sm:p-20 flex flex-col items-center justify-center shadow-xl text-center relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-slate-800 via-slate-600 to-slate-800"></div>
        
        <div class="w-24 h-24 bg-slate-900 rounded-full flex items-center justify-center text-slate-600 mb-6 border border-slate-700 shadow-inner">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
        </div>
        <h3 class="text-2xl font-black text-white uppercase mb-3 tracking-widest">Sepetiniz Şu An Boş</h3>
        <p class="text-slate-400 mb-8 max-w-md font-medium leading-relaxed">Garajınızı donatmak ve aracınızı sınırların ötesine taşımak için premium parçaları incelemeye hemen başlayın.</p>
        
        <a href="{{ route('favorites') }}" class="bg-slate-700 hover:bg-amber-500 hover:text-slate-900 text-white font-bold py-3.5 px-8 rounded-lg transition-all border border-slate-600 hover:border-amber-500 uppercase tracking-widest text-sm shadow-lg">
            Vitrine Göz At
        </a>
    </div>
@endif
@endsection
