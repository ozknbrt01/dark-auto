@extends('layouts.store')

@section('title', 'Kargo Entegrasyonları ve Lojistik - OtoMarket')

@section('content')
<div class="bg-slate-50 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <!-- Header Bölümü -->
            <div class="p-8 sm:p-12 border-b border-slate-100 bg-gradient-to-b from-emerald-50/50 to-white text-center">
                <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 shadow-sm">
                    📦
                </div>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 mb-4 tracking-tight">Kargo Entegrasyonları <br class="hidden sm:block">ve Lojistik Çözümleri</h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">Satıcılarımızın operasyonel süreçlerini hızlandırmak için Türkiye'nin önde gelen kargo firmaları ile tam entegre çalışıyoruz.</p>
            </div>

            <!-- İçerik Bölümü -->
            <div class="p-8 sm:p-12 space-y-10">
                
                <div class="prose prose-slate max-w-none text-slate-600">
                    <p class="text-base leading-relaxed text-center">
                        Satıcı panelinden tek tıkla kargo barkodu oluşturabilir, sipariş durumlarını otomatik güncelleyebilir ve avantajlı kurumsal kargo fiyatlarımızdan yararlanabilirsiniz. Entegrasyonlar sayesinde manuel giriş hatalarını sıfıra indiriyoruz.
                    </p>
                </div>

                <!-- Kargo Firmaları Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center hover:border-emerald-300 hover:shadow-md transition group">
                        <div class="text-4xl mb-3 group-hover:scale-110 transition duration-300">🚚</div>
                        <h4 class="font-bold text-slate-800">Yurtiçi Kargo</h4>
                        <p class="text-[10px] text-emerald-600 font-semibold mt-1 bg-emerald-50 py-0.5 rounded-md">Tam Entegre</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center hover:border-emerald-300 hover:shadow-md transition group">
                        <div class="text-4xl mb-3 group-hover:scale-110 transition duration-300">📦</div>
                        <h4 class="font-bold text-slate-800">Aras Kargo</h4>
                        <p class="text-[10px] text-emerald-600 font-semibold mt-1 bg-emerald-50 py-0.5 rounded-md">Tam Entegre</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center hover:border-emerald-300 hover:shadow-md transition group">
                        <div class="text-4xl mb-3 group-hover:scale-110 transition duration-300">🏢</div>
                        <h4 class="font-bold text-slate-800">MNG Kargo</h4>
                        <p class="text-[10px] text-emerald-600 font-semibold mt-1 bg-emerald-50 py-0.5 rounded-md">Tam Entegre</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center hover:border-emerald-300 hover:shadow-md transition group">
                        <div class="text-4xl mb-3 group-hover:scale-110 transition duration-300">⚡</div>
                        <h4 class="font-bold text-slate-800">Sürat Kargo</h4>
                        <p class="text-[10px] text-emerald-600 font-semibold mt-1 bg-emerald-50 py-0.5 rounded-md">Tam Entegre</p>
                    </div>
                </div>

                <!-- Avantajlar -->
                <div class="bg-slate-50 border border-slate-200 rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-6 text-center">Neden Entegrasyon Kullanmalısınız?</h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-emerald-500 font-bold flex-shrink-0 shadow-sm">1</div>
                            <div>
                                <h4 class="font-bold text-slate-800">Otomatik Barkod Oluşturma</h4>
                                <p class="text-sm text-slate-500 mt-0.5">Müşteri siparişi verdiği an sistem arka planda kargo kampanya kodu ve barkodu oluşturur. Sadece çıktısını alıp pakete yapıştırmanız yeterlidir.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-emerald-500 font-bold flex-shrink-0 shadow-sm">2</div>
                            <div>
                                <h4 class="font-bold text-slate-800">Canlı Kargo Takibi</h4>
                                <p class="text-sm text-slate-500 mt-0.5">Sipariş kargoya verildiği an "Kargoya Verildi" statüsüne otomatik geçer ve müşteriye anlık SMS / E-posta bildirimi yapılır.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-emerald-500 font-bold flex-shrink-0 shadow-sm">3</div>
                            <div>
                                <h4 class="font-bold text-slate-800">Avantajlı Fiyatlar</h4>
                                <p class="text-sm text-slate-500 mt-0.5">Platformumuzun kargo firmaları ile yapmış olduğu özel kurumsal anlaşmalar sayesinde çok daha uygun fiyatlarla gönderim sağlayabilirsiniz.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</div>
@endsection
