<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Satıcı Ol - Dark Auto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-200 antialiased bg-slate-900 min-h-screen">
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        
        <!-- Logo -->
        <div class="mb-10 text-center">
            <a href="/" class="text-4xl font-bold text-amber-500 tracking-wider">DARK AUTO</a>
        </div>

        <!-- MANİFESTO BÖLÜMÜ -->
        <div id="manifesto-section" class="bg-slate-800 p-8 sm:p-12 rounded-2xl shadow-2xl border border-slate-700 transition-all duration-500">
            <h1 class="text-2xl sm:text-3xl font-bold text-white mb-6 uppercase tracking-wide border-b border-slate-700 pb-4">Vitrinizi Sokağa Değil, Zirveye Açın</h1>
            
            <div class="space-y-6 text-slate-300 leading-relaxed">
                <p><strong class="text-amber-500">Otomotiv E-Ticaretinin Çöplüğüne Dönüşmesine İzin Vermeyeceğiz.</strong><br>Bugün e-ticaret platformları; sahte ürün satanların ve haksız rekabetin kol gezdiği bir pazar yerine dönüştü. Siz, kalitenizi üç kuruş daha ucuza mal satanların gölgesinde kanıtlamaya çalışıyorsunuz. Emeğinizin bu sıradanlığın içinde eriyip gitmesine biz son veriyoruz.</p>
                
                <p><strong class="text-amber-500">Biz "Herkesin" Değil, "En İyilerin" Pazar Yeriyiz.</strong><br>Dark Auto'da kural çok basit: Önüne gelen burada mağaza açamaz. Sadece sattığı ürünün arkasında kapı gibi duran, dürüst ve kalite standartlarımızı karşılayabilen seçkin satıcıların yer aldığı özel bir ekosistemiz.</p>
                
                <ul class="list-disc pl-5 space-y-2">
                    <li><strong>Ucuzcularla Aynı Rafta Değilsiniz:</strong> Müşteri kitlemiz "en ucuzu" değil, "en iyisini" arayan gerçek bir kitledir.</li>
                    <li><strong>Tavizsiz Satıcı Koruması:</strong> Keyfi iadelerle sizi mağdur eden düzene son veriyoruz. Haklı olan haklıdır.</li>
                    <li><strong>Garantili Tahsilat:</strong> Sipariş sorunsuz teslim edildiği an kazancınız bürokratik engellere takılmadan hesabınıza geçer.</li>
                </ul>
                
                <p class="italic text-slate-400 mt-4">Bize sadece sözünüzün eri olduğunuzu kanıtlayın, geriye kalan tüm teknolojik ve pazarlama gücünü biz sağlayalım.</p>
            </div>

            <button onclick="showForm()" class="w-full bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold py-4 px-8 rounded-lg mt-10 text-lg transition-colors uppercase tracking-wide">
                Kuralları Kabul Ediyorum - Başvuruya Geç
            </button>
        </div>

        <!-- BAŞVURU FORMU BÖLÜMÜ (Başlangıçta Gizli) -->
        <div id="form-section" class="hidden bg-slate-800 p-8 sm:p-12 rounded-2xl shadow-2xl border border-slate-700 transition-all duration-500">
            <h2 class="text-2xl font-bold text-white mb-2">Mağaza Başvuru Formu</h2>
            <p class="text-slate-400 mb-8 border-b border-slate-700 pb-4">Lütfen bilgileri eksiksiz doldurun. Başvurunuz uzman ekibimiz tarafından detaylı bir incelemeye tabi tutulacaktır.</p>
            
            <form action="#" method="POST" class="space-y-6">
                <!-- Kurumsal Bilgiler -->
                <div>
                    <h3 class="text-lg font-semibold text-amber-500 mb-4">1. Kurumsal Bilgiler</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-300">Firma Ünvanı (Resmi)</label>
                            <input type="text" class="mt-1 block w-full bg-slate-900 border-slate-700 text-slate-200 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2.5 border">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-300">Mağaza Adı (Vitrin)</label>
                            <input type="text" class="mt-1 block w-full bg-slate-900 border-slate-700 text-slate-200 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2.5 border">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-300">Vergi Dairesi & Numarası</label>
                            <input type="text" class="mt-1 block w-full bg-slate-900 border-slate-700 text-slate-200 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2.5 border">
                        </div>
                    </div>
                </div>

                <!-- İletişim Bilgileri -->
                <div class="pt-4">
                    <h3 class="text-lg font-semibold text-amber-500 mb-4">2. İletişim Bilgileri</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-300">Yetkili Kişi Ad Soyad</label>
                            <input type="text" class="mt-1 block w-full bg-slate-900 border-slate-700 text-slate-200 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2.5 border">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-300">İletişim Numarası</label>
                            <input type="text" class="mt-1 block w-full bg-slate-900 border-slate-700 text-slate-200 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2.5 border">
                        </div>
                    </div>
                </div>

                <!-- Faaliyet Detayları -->
                <div class="pt-4">
                    <h3 class="text-lg font-semibold text-amber-500 mb-4">3. Faaliyet Detayları</h3>
                    <div>
                        <label class="block text-sm font-medium text-slate-300">Bayilik veya Distribütörlükleriniz / Hakkınızda Kısaca Bilgi</label>
                        <textarea rows="4" class="mt-1 block w-full bg-slate-900 border-slate-700 text-slate-200 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500 p-2.5 border"></textarea>
                    </div>
                </div>

                <button type="button" class="w-full bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold py-4 px-8 rounded-lg mt-6 text-lg transition-colors uppercase">
                    Başvuruyu Gönder ve İncelemeyi Başlat
                </button>
            </form>
        </div>
    </div>

    <script>
        function showForm() {
            document.getElementById('manifesto-section').style.display = 'none';
            document.getElementById('form-section').style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</body>
</html>
