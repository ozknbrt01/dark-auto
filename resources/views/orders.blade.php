@extends('layouts.vip')

@section('panel-icerik')
<!-- Üst Başlık -->
<div class="border-b border-slate-700 pb-5 mb-8">
    <h2 class="text-2xl sm:text-3xl font-black text-white uppercase tracking-widest flex items-center gap-3">
        <span class="text-amber-500">📦</span> Siparişlerim & Telemetri
    </h2>
    <p class="text-slate-400 font-medium mt-2">Sipariş geçmişiniz ve aktif teslimatlarınızın anlık radar durumu.</p>
</div>

<div class="space-y-8">
    
    <!-- AKTİF SİPARİŞ KARTI (KARGO TAKİBİ VURGULU) -->
    <div class="bg-slate-800 rounded-2xl border border-amber-500/30 p-6 sm:p-8 shadow-[0_0_25px_rgba(245,158,11,0.05)] relative overflow-hidden">
        
        <!-- Sipariş Üst Bilgi -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-slate-700/50 pb-5 mb-8 gap-4">
            <div>
                <span class="text-amber-500 font-black tracking-widest uppercase text-xs bg-amber-500/10 px-3 py-1 rounded-md border border-amber-500/20">Sipariş No: #DA-849201</span>
                <h3 class="text-xl font-bold text-white uppercase mt-4 tracking-wide">Brembo Karbon Seramik Fren Seti</h3>
            </div>
            <div class="text-left sm:text-right">
                <span class="block text-slate-400 text-xs font-bold uppercase tracking-widest mb-1">Toplam Tutar</span>
                <span class="text-2xl font-black text-white tracking-wider">45.500 ₺</span>
            </div>
        </div>

        <!-- TESLİMAT ÇİZELGESİ (PROGRESS BAR) -->
        <div class="relative py-4 sm:py-8 mb-4">
            <!-- Arka Plan Çizgisi (Mobil ekranlarda gizli, dikeyde flex ile çözüldü) -->
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-0 hidden sm:flex">
                <div class="w-full h-1 bg-slate-700 absolute top-1/2 -translate-y-1/2 left-0 right-0"></div>
                <!-- Aktif Dolum Çizgisi (%66) -->
                <div class="w-2/3 h-1 bg-gradient-to-r from-amber-600 to-amber-400 absolute top-1/2 -translate-y-1/2 left-0 z-0 shadow-[0_0_10px_rgba(245,158,11,0.5)]"></div>
            </div>

            <div class="relative z-10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-8 sm:gap-0">
                
                <!-- 1. Aşama: Onaylandı -->
                <div class="flex flex-row sm:flex-col items-center flex-1 w-full sm:w-auto text-left sm:text-center gap-4 sm:gap-2">
                    <div class="w-12 h-12 rounded-full bg-amber-500 text-slate-900 flex items-center justify-center font-black shadow-[0_0_15px_rgba(245,158,11,0.4)] z-10 shrink-0 text-xl">✓</div>
                    <div>
                        <div class="text-white font-bold uppercase text-xs tracking-wider">Onaylandı</div>
                        <div class="text-slate-400 text-[10px] uppercase font-bold mt-1">12 Ekim, 14:30</div>
                    </div>
                </div>

                <!-- 2. Aşama: Hazırlanıyor -->
                <div class="flex flex-row sm:flex-col items-center flex-1 w-full sm:w-auto text-left sm:text-center gap-4 sm:gap-2">
                    <div class="w-12 h-12 rounded-full bg-amber-500 text-slate-900 flex items-center justify-center font-black shadow-[0_0_15px_rgba(245,158,11,0.4)] z-10 shrink-0 text-xl">✓</div>
                    <div>
                        <div class="text-white font-bold uppercase text-xs tracking-wider">Garajda Paketleniyor</div>
                        <div class="text-slate-400 text-[10px] uppercase font-bold mt-1">13 Ekim, 09:15</div>
                    </div>
                </div>

                <!-- 3. Aşama: Sevkiyatta (Aktif) -->
                <div class="flex flex-row sm:flex-col items-center flex-1 w-full sm:w-auto text-left sm:text-center gap-4 sm:gap-2">
                    <div class="w-12 h-12 rounded-full border-4 border-amber-500 bg-slate-900 text-amber-500 flex items-center justify-center font-black z-10 animate-pulse shrink-0 text-xl shadow-[0_0_20px_rgba(245,158,11,0.6)]">🚚</div>
                    <div>
                        <div class="text-amber-500 font-bold uppercase text-xs tracking-wider">Sevkiyatta</div>
                        <div class="text-amber-500/70 text-[10px] uppercase font-bold mt-1">Tahmini: Yarın</div>
                    </div>
                </div>

                <!-- 4. Aşama: Teslim Edildi (Bekliyor) -->
                <div class="flex flex-row sm:flex-col items-center flex-1 w-full sm:w-auto text-left sm:text-center gap-4 sm:gap-2">
                    <div class="w-12 h-12 rounded-full border-4 border-slate-700 bg-slate-800 text-slate-500 flex items-center justify-center font-black z-10 shrink-0 text-xl">🏁</div>
                    <div>
                        <div class="text-slate-500 font-bold uppercase text-xs tracking-wider">Teslim Edildi</div>
                        <div class="text-slate-600 text-[10px] uppercase font-bold mt-1">Bekleniyor</div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Alt Bilgi ve Aksiyon Butonları -->
        <div class="mt-8 pt-6 border-t border-slate-700/50 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="text-slate-400 text-xs tracking-wider uppercase font-medium text-center sm:text-left">
                Lojistik: <span class="text-white font-bold">Dark Lojistik (VIP)</span> <br class="sm:hidden">
                <span class="hidden sm:inline">|</span> Takip Kodu: <span class="text-amber-500 font-black">DK-99887766</span>
            </div>
            <div class="flex gap-3 w-full sm:w-auto">
                <button class="flex-1 sm:flex-none bg-slate-700 hover:bg-slate-600 text-white font-bold py-3 px-5 rounded-lg transition border border-slate-600 uppercase tracking-widest text-xs">
                    Fatura
                </button>
                <button class="flex-1 sm:flex-none bg-amber-500 hover:bg-amber-600 text-slate-900 font-black py-3 px-6 rounded-lg transition shadow-[0_0_15px_rgba(245,158,11,0.3)] uppercase tracking-widest text-xs flex items-center justify-center gap-2">
                    <span class="animate-pulse">🔴</span> Canlı Takip
                </button>
            </div>
        </div>
    </div>

    <!-- GEÇMİŞ SİPARİŞLER (SOLUK VE PASİF GÖRÜNÜM) -->
    <h3 class="text-lg font-bold text-slate-500 uppercase tracking-widest mb-4 mt-12 pl-2 border-l-4 border-slate-700">Geçmiş Teslimatlar</h3>
    
    <div class="bg-slate-800/50 rounded-2xl border border-slate-700/50 p-5 sm:p-6 opacity-70 hover:opacity-100 transition duration-300">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-4 w-full sm:w-auto">
                <div class="w-12 h-12 rounded-lg bg-slate-900 border border-slate-700 text-slate-500 flex items-center justify-center text-xl shrink-0">📦</div>
                <div>
                    <span class="text-slate-400 font-bold tracking-widest uppercase text-[10px]">#DA-302911 • 14 Ağustos 2026</span>
                    <h4 class="text-sm font-bold text-white uppercase mt-1">M Performans Egzoz Ucu</h4>
                </div>
            </div>
            <div class="flex items-center justify-between w-full sm:w-auto gap-6">
                <div class="text-left sm:text-right">
                    <span class="text-lg font-black text-white">8.200 ₺</span>
                </div>
                <span class="bg-emerald-500/10 text-emerald-500 border border-emerald-500/20 px-3 py-1 rounded-md text-[10px] font-black uppercase tracking-wider">Teslim Edildi</span>
            </div>
        </div>
    </div>

</div>
@endsection
