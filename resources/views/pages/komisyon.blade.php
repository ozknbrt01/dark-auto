@extends('layouts.store')

@section('title', 'Pazaryeri Komisyon Oranları ve Satış Şartları - OtoMarket')

@section('content')
<div class="bg-slate-50 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <!-- Header Bölümü -->
            <div class="p-8 sm:p-12 border-b border-slate-100 bg-gradient-to-b from-blue-50/50 to-white text-center">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 shadow-sm">
                    📊
                </div>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 mb-4 tracking-tight">Pazaryeri Komisyon Oranları <br class="hidden sm:block">ve Satış Şartları</h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">Platformumuzda oto yedek parça kategorilerine göre komisyon oranlarımız %5 ile %12 arasında değişiklik göstermektedir. Şeffaf ve adil bir yapı sunuyoruz.</p>
            </div>

            <!-- İçerik Bölümü -->
            <div class="p-8 sm:p-12 space-y-10">
                
                <div class="prose prose-slate max-w-none text-slate-600">
                    <p class="text-base leading-relaxed">
                        Satıcılarımız için sürdürülebilir bir büyüme alanı yaratmayı hedefliyoruz. Orijinal OEM parçalar, yan sanayi ürünler ve araç aksesuarları için uyguladığımız güncel ve detaylı komisyon tablosunu aşağıda bulabilirsiniz. Komisyon oranlarına KDV dâhildir.
                    </p>
                </div>

                <!-- Tablo -->
                <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 text-slate-600 font-semibold border-b border-slate-200">
                            <tr>
                                <th class="p-10">Kategori Adı</th>
                                <th class="p-10">Parça Türü</th>
                                <th class="p-10 text-center">Komisyon Oranı</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr class="hover:bg-slate-50 transition">
                                <td class="p-10 font-medium text-slate-900 flex items-center gap-2"><span>⚙️</span> Motor Aksamı</td>
                                <td class="p-10 text-slate-500">Ağır ve Hafif Mekanik, Motor Blokları</td>
                                <td class="p-10 text-center font-bold text-blue-600">%8</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="p-10 font-medium text-slate-900 flex items-center gap-2"><span>🔌</span> Elektronik</td>
                                <td class="p-10 text-slate-500">Sensörler, Beyinler, Aydınlatma</td>
                                <td class="p-10 text-center font-bold text-blue-600">%10</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="p-10 font-medium text-slate-900 flex items-center gap-2"><span>🚙</span> Kaporta</td>
                                <td class="p-10 text-slate-500">Tampon, Çamurluk, Kapılar</td>
                                <td class="p-10 text-center font-bold text-blue-600">%7</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="p-10 font-medium text-slate-900 flex items-center gap-2"><span>🛠️</span> Aksesuar & Yağlar</td>
                                <td class="p-10 text-slate-500">Araç İçi Aksesuar, Madeni Yağlar, Katkılar</td>
                                <td class="p-10 text-center font-bold text-blue-600">%12</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="p-10 font-medium text-slate-900 flex items-center gap-2"><span>🛑</span> Fren Sistemi</td>
                                <td class="p-10 text-slate-500">Fren Balataları, Diskler ve Kampanalar</td>
                                <td class="p-10 text-center font-bold text-blue-600">%5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Ödeme Koşulları Info Box -->
                <div class="bg-amber-50 border border-amber-200 rounded-2xl p-6 flex items-start gap-4">
                    <div class="text-amber-500 text-2xl mt-1">💳</div>
                    <div>
                        <h4 class="text-amber-800 font-bold mb-1 text-lg">Ödeme Vadeleri ve Koşullar</h4>
                        <p class="text-amber-700 text-sm leading-relaxed">
                            Müşteri siparişi teslim alıp onayladıktan sonra satıcı hakedişleri hesaplanır. Düzenli ödeme sistemimiz ile tüm satıcı ödeme vadeleri <strong>14 gün</strong> olarak belirlenmiştir. Belirtilen süre sonunda bakiyeniz sistemde kayıtlı IBAN numaranıza otomatik ve kesintisiz olarak aktarılır.
                        </p>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</div>
@endsection
