@extends('layouts.vip')

@section('panel-icerik')
<!-- Karşılama Kartı -->
<div class="bg-gradient-to-r from-slate-800 to-slate-900 rounded-2xl border border-slate-700 p-8 shadow-xl relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl -mr-20 -mt-20"></div>
    <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-3 uppercase tracking-wide">Garajınıza <span class="text-amber-500">Hoş Geldiniz</span></h2>
    <p class="text-slate-400 font-medium leading-relaxed max-w-2xl">Buradan araçlarınızı yönetebilir, sadece aracınıza özel premium parça önerilerini inceleyebilirsiniz.</p>
</div>

<!-- Aktif Araç Kartı -->
<div class="bg-slate-800 rounded-2xl border border-slate-700 p-6 sm:p-8 shadow-xl">
    <div class="flex justify-between items-center border-b border-slate-700 pb-5 mb-6">
        <h3 class="text-xl font-bold text-white uppercase tracking-widest">Kayıtlı Araçlarınız</h3>
    </div>
    <div class="flex flex-col md:flex-row items-center gap-8 bg-slate-900 p-6 rounded-xl border border-slate-700">
        <div class="w-28 h-28 bg-slate-800 rounded-full flex items-center justify-center border-2 border-amber-500/30 text-5xl">🇩🇪</div>
        <div>
            <div class="text-amber-500 text-xs font-black tracking-widest uppercase mb-1">Aktif Garaj Seçimi</div>
            <h4 class="text-2xl font-black text-white uppercase mb-2">BMW 3 Serisi</h4>
            <p class="text-slate-400 font-medium mb-4">2020 Model • G20 Kasa • M Sport</p>
            <button class="bg-amber-500 text-slate-900 font-black py-2 px-6 rounded-lg uppercase text-sm">Uygun Parçaları Göster</button>
        </div>
    </div>
</div>
@endsection
