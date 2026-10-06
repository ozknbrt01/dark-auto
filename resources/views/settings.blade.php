@extends('layouts.vip')

@section('panel-icerik')
<!-- Üst Başlık -->
<div class="border-b border-slate-700 pb-5 mb-8">
    <h2 class="text-2xl sm:text-3xl font-black text-white uppercase tracking-widest flex items-center gap-3">
        <span class="text-amber-500">⚙️</span> Hesap Ayarları
    </h2>
    <p class="text-slate-400 font-medium mt-2">Pilot profilinizi, lojistik detaylarınızı ve güvenlik kilitlerinizi buradan yönetin.</p>
</div>

<!-- BAŞARI BİLDİRİMİ (FLASH MESSAGE) -->
@if(session('success'))
    <div class="mb-8 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-6 py-4 rounded-xl flex items-center gap-4 shadow-[0_0_15px_rgba(16,185,129,0.1)]">
        <div class="w-8 h-8 rounded-full bg-emerald-500 text-slate-900 flex items-center justify-center font-black shrink-0 text-xl">✓</div>
        <span class="font-bold tracking-wide uppercase text-sm">{{ session('success') }}</span>
    </div>
@endif

<div class="space-y-8">
    
    <!-- KİŞİSEL BİLGİLER (PİLOT PROFİLİ) -->
    <div class="bg-slate-800 rounded-2xl border border-slate-700 p-6 sm:p-8 shadow-xl">
        <h3 class="text-lg font-bold text-white uppercase tracking-widest mb-6 border-b border-slate-700/50 pb-4">Pilot Profili</h3>
        
        <form action="{{ route('settings.profile') }}" method="POST" class="space-y-5" translate="no">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wide mb-2">Ad Soyad</label>
                    <input name="name" type="text" value="{{ old('name', 'VIP Üye') }}" class="appearance-none block w-full px-4 py-3 border border-slate-600 rounded-lg text-white bg-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500 transition-colors">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wide mb-2">Telefon Numarası</label>
                    <input name="phone" type="tel" value="{{ old('phone') }}" placeholder="+90 (555) 000 00 00" class="appearance-none block w-full px-4 py-3 border border-slate-600 rounded-lg text-white bg-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500 transition-colors placeholder-slate-600">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wide mb-2">E-Posta Adresi</label>
                    <input type="email" value="vip@darkauto.com" class="appearance-none block w-full px-4 py-3 border border-slate-600 rounded-lg text-slate-400 bg-slate-900/50 cursor-not-allowed" disabled>
                    <p class="text-xs text-slate-500 mt-2">E-posta adresinizi değiştirmek için müşteri hizmetleriyle iletişime geçin.</p>
                </div>
            </div>
            <div class="flex justify-end pt-4">
                <button type="submit" class="bg-slate-700 hover:bg-amber-500 hover:text-slate-900 text-white font-bold py-3 px-8 rounded-lg transition-all border border-slate-600 hover:border-amber-500 uppercase tracking-widest text-sm shadow-lg">
                    Profili Güncelle
                </button>
            </div>
        </form>
    </div>

    <!-- LOJİSTİK VE ADRES -->
    <div class="bg-slate-800 rounded-2xl border border-slate-700 p-6 sm:p-8 shadow-xl">
        <div class="flex justify-between items-center mb-6 border-b border-slate-700/50 pb-4">
            <h3 class="text-lg font-bold text-white uppercase tracking-widest">Lojistik (Teslimat)</h3>
            <span class="bg-amber-500/10 text-amber-500 border border-amber-500/20 px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider">Kayıtlı Adres Yok</span>
        </div>
        
        <form action="{{ route('settings.address') }}" method="POST" class="space-y-5" translate="no">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wide mb-2">Adres Başlığı (Örn: Ev, Özel Servis)</label>
                <input name="address_title" type="text" value="{{ old('address_title') }}" placeholder="Örn: Maslak Oto Sanayi Garajım" class="appearance-none block w-full px-4 py-3 border border-slate-600 rounded-lg text-white bg-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500 transition-colors placeholder-slate-600">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wide mb-2">Açık Adres</label>
                <textarea name="address_detail" rows="3" placeholder="Sokak, Mahalle, Bina No..." class="appearance-none block w-full px-4 py-3 border border-slate-600 rounded-lg text-white bg-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500 transition-colors placeholder-slate-600 resize-none">{{ old('address_detail') }}</textarea>
            </div>
            <div class="flex justify-end pt-4">
                <button type="submit" class="bg-slate-700 hover:bg-amber-500 hover:text-slate-900 text-white font-bold py-3 px-8 rounded-lg transition-all border border-slate-600 hover:border-amber-500 uppercase tracking-widest text-sm shadow-lg">
                    Adresi Kaydet
                </button>
            </div>
        </form>
    </div>

    <!-- GÜVENLİK KİLİDİ -->
    <div class="bg-slate-800 rounded-2xl border border-red-900/30 p-6 sm:p-8 shadow-xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-red-500/5 rounded-full blur-3xl"></div>
        
        <h3 class="text-lg font-bold text-white uppercase tracking-widest mb-6 border-b border-slate-700/50 pb-4 flex items-center gap-2">
            Güvenlik Kilitleri
        </h3>
        
        <form action="{{ route('settings.password') }}" method="POST" class="space-y-5 relative z-10" translate="no">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wide mb-2">Mevcut Parola</label>
                    <input name="current_password" type="password" required class="appearance-none block w-full px-4 py-3 border border-slate-600 rounded-lg text-white bg-slate-900 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wide mb-2">Yeni Parola</label>
                    <input name="new_password" type="password" required class="appearance-none block w-full px-4 py-3 border border-slate-600 rounded-lg text-white bg-slate-900 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors">
                </div>
            </div>
            <div class="flex justify-end pt-4">
                <button type="submit" class="bg-slate-900 hover:bg-red-600 text-slate-300 hover:text-white font-bold py-3 px-8 rounded-lg transition-all border border-slate-700 hover:border-red-500 uppercase tracking-widest text-sm shadow-lg">
                    Parolayı Değiştir
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
