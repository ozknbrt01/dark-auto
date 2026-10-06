@extends('layouts.store')

@section('title', 'OtoMarket - Otomotiv Yedek Parça & Araç Uyumluluk Pazaryeri')

@section('content')
<div class="bg-slate-900 min-h-screen text-slate-300">

    <!-- Hero Bölümü ve Araç Seçici -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-8">
            Otomobiliniz İçin Doğru Parçayı Anında Bulun
        </h1>
        
        <form id="aramaFormu" action="{{ route('products.search') }}" method="GET" class="bg-slate-800 border border-slate-700 rounded-xl p-6 shadow-lg max-w-4xl mx-auto text-left">
            <h3 class="text-xl font-semibold text-slate-200 mb-4">Aracınıza Birebir Uyumlu Parçayı Bulun</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm text-slate-400 mb-1">Araç Markası</label>
                    <select id="secimMarka" name="marka" class="w-full bg-slate-900 border border-slate-700 text-slate-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                        <option value="">-- Marka Seçin --</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm text-slate-400 mb-1">Araç Modeli</label>
                    <select id="secimModel" name="model" class="w-full bg-slate-900 border border-slate-700 text-slate-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                        <option value="">-- Önce Marka Seçin --</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm text-slate-400 mb-1">Kasa / Yıl / Motor</label>
                    <select name="yil" class="w-full bg-slate-900 border border-slate-700 text-slate-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                        <option>-- Önce Model Seçin --</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold py-3 px-6 rounded-md transition">
                    Uyumlu Parçaları Bul
                </button>
            </div>
        </form>
    </section>

    <!-- Kategoriler Grid Yapısı -->
    <section class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-white text-center mb-10">Öne Çıkan Kategoriler</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php
                    $categories = ['Motor Aksamı', 'Fren Sistemi', 'Kaporta', 'Filtreler', 'Aydınlatma', 'Süspansiyon', 'Elektrik', 'Yağlar'];
                @endphp
                @foreach($categories as $category)
                <a href="{{ route('kategori.goster', \Illuminate\Support\Str::slug($category)) }}" class="bg-slate-800 border border-slate-700 rounded-lg p-4 hover:-translate-y-1 hover:border-slate-500 transition cursor-pointer text-center flex items-center justify-center h-32">
                    <span class="font-semibold text-slate-200">{{ $category }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </section>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('aramaFormu');
        const marka = document.getElementById('secimMarka');
        const model = document.getElementById('secimModel');

        if(form && marka && model) {
            form.addEventListener('submit', function(e) {
                let hasError = false;

                // Önce eski hataları temizle (Kırmızıları normal border rengine çevir)
                marka.classList.remove('border-red-500', 'ring-red-500', 'ring-1');
                model.classList.remove('border-red-500', 'ring-red-500', 'ring-1');
                
                // Marka seçili mi?
                if(marka.value === '') {
                    marka.classList.add('border-red-500', 'ring-red-500', 'ring-1');
                    hasError = true;
                }
                
                // Model seçili mi?
                if(model.value === '') {
                    model.classList.add('border-red-500', 'ring-red-500', 'ring-1');
                    hasError = true;
                }

                // Eğer hata varsa formu durdur
                if(hasError) {
                    e.preventDefault(); // Sayfa değişimini engeller
                }
            });

            // Kullanıcı seçim yaptığında kırmızılığı hemen kaldır (UX iyileştirmesi)
            marka.addEventListener('change', function() {
                if(this.value !== '') this.classList.remove('border-red-500', 'ring-red-500', 'ring-1');
            });
            model.addEventListener('change', function() {
                if(this.value !== '') this.classList.remove('border-red-500', 'ring-red-500', 'ring-1');
            });
        }
    });
</script>
@endsection
