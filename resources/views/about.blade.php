<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hakkımızda - Dark Auto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-200 antialiased bg-slate-900 min-h-screen">
    <div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        
        <!-- Logo Bölümü -->
        <div class="mb-10 text-center">
            <a href="/" class="text-4xl font-bold text-amber-500 tracking-wider">DARK AUTO</a>
        </div>

        <!-- İçerik Kapsayıcı -->
        <div class="bg-slate-800 p-8 sm:p-14 rounded-2xl shadow-2xl border border-slate-700">
            <h1 class="text-3xl sm:text-4xl font-bold text-white mb-10 uppercase tracking-wide border-b border-slate-700 pb-6 text-center">Taviz Yok. Şüphe Yok. Sadece En İyiler.</h1>

            <div class="space-y-10 text-slate-300 leading-relaxed text-lg">
                
                <!-- Biz Kimiz? -->
                <section>
                    <h2 class="text-2xl font-semibold text-amber-500 mb-4">Biz Kimiz?</h2>
                    <p>Otomobil bir ulaşım aracı değil, asfalta atılan bir imzadır. Biz, bu imzayı en güçlü, en estetik ve en güvenli şekilde atmanız için gereken her şeyi tek bir platformda toplayan otoriteyiz. <strong class="text-white">Dark Auto</strong>, herkesin elini kolunu sallayarak mal sattığı, kontrolsüz bir sanayi köşesi değildir. Burası; otomotiv sektörünün seçkin markalarını, dürüst ve vizyoner satıcılarını, aracına gözü gibi bakan gerçek tutkunlarla buluşturan <strong class="text-amber-500">premium bir pazar yeridir.</strong> Biz, kaliteden ödün vermeyenlerin yeni merkez üssüyüz.</p>
                </section>

                <!-- Amacımız -->
                <section>
                    <h2 class="text-2xl font-semibold text-amber-500 mb-4">Neden Buradayız?</h2>
                    <p>Sektördeki en büyük sorunu kökünden çözmek için buradayız: Güvensizlik ve bilgi kirliliği. İnternet, aracınıza zarar verecek ucuz yan sanayi ürünler, muhatap bulamayacağınız hayalet satıcılar ve sahte ilanlarla dolu. Aracınızın kaputunu açtığınızda veya direksiyonuna geçtiğinizde aklınızda tek bir soru işareti bile kalmamalı.</p>
                    <p class="mt-3">Dark Auto olarak amacımız, bu e-ticaret kaosuna son vermek. <em class="text-slate-400">"Bu parça aracıma uyar mı?", "Satıcı güvenilir mi?", "Param güvende mi?"</em> gibi endişeleri tamamen ortadan kaldırıyoruz. Bizim platformumuzda şansa yer yok; sadece garantili kalite ve test edilmiş güven var.</p>
                </section>

                <!-- Güven Ağı -->
                <section>
                    <h2 class="text-2xl font-semibold text-amber-500 mb-4">Dark Auto Ekosistemi: Çelik Gibi Bir Güven Ağı</h2>
                    <p class="mb-5">Biz sadece bir vitrin değiliz, biz bir <strong class="text-white">filtreniz.</strong> Bizi diğer tüm pazar yerlerinden ayıran en büyük özelliğimiz katı kurallarımızdır:</p>
                    <ul class="list-none space-y-6">
                        <li class="flex items-start">
                            <span class="text-amber-500 mr-4 text-2xl leading-none">✦</span>
                            <div><strong class="text-white tracking-wide">Tavizsiz Satıcı Filtresi:</strong> Platformumuzda mağaza açmak kolay değildir. Sadece ticari ahlakı yüksek, sattığı ürünün arkasında kapı gibi duran ve kalite standartlarımıza uyan premium satıcılar bu asil pazarın bir parçası olabilir. Çürük elmalara sistemimizde yer yoktur.</div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-amber-500 mr-4 text-2xl leading-none">✦</span>
                            <div><strong class="text-white tracking-wide">Sıfır Risk, %100 Güvenlik:</strong> İşlem güvenliği bizim kırmızı çizgimizdir. Ödemeniz, ürün kapınıza gelip siz kaliteyi kendi gözlerinizle görene ve onay verene kadar bizim güvenli havuzumuzda tutulur. Satıcı hakkını, alıcı ise parasını ve aracını bizimle garanti altına alır.</div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-amber-500 mr-4 text-2xl leading-none">✦</span>
                            <div><strong class="text-white tracking-wide">Kusursuz Altyapı ve Deneyim:</strong> Tıpkı tasarımımızdaki o lüks gece mavisi ve amberin uyumu gibi, sitemizdeki arama, filtreleme, sipariş verme ve teslim alma süreçleriniz de aynı kusursuzlukta, pürüzsüz ve hızlı çalışır.</div>
                        </li>
                    </ul>
                </section>

                <!-- Kapanış / Manifesto Sonucu -->
                <section class="bg-slate-900 p-8 rounded-xl border border-slate-700 mt-12 text-center shadow-inner">
                    <h2 class="text-xl font-bold text-white mb-4">Bizimle Yola Çıkanlar Ne Beklemeli?</h2>
                    <p class="mb-6 text-slate-400">Eğer aracınız sizin için sadece demir yığınından ibaretse ve "en ucuzu olsun, gerisi önemli değil" diyorsanız, internetteki sıradan siteler size yetebilir. Ancak kaputun altındaki güce saygı duyuyor ve her zaman <strong class="text-white">en iyisini</strong> arıyorsanız, doğru yerdesiniz.</p>
                    <div class="text-2xl text-white font-bold tracking-widest uppercase mt-8">
                        Sıradanlığı dikiz aynasında bırakın.<br>
                        <span class="text-amber-500 block mt-3">Kontak anahtarını çevirin ve gerçek kaliteyle tanışın.</span>
                    </div>
                </section>

            </div>
            
            <!-- Geri Dönüş Butonu -->
            <div class="mt-12 text-center">
                <a href="/" class="inline-block bg-slate-700 hover:bg-slate-600 text-white font-bold py-3 px-8 rounded-lg transition-colors border border-slate-600 tracking-wide uppercase text-sm">
                    Ana Sayfaya Dön
                </a>
            </div>
        </div>
    </div>
</body>
</html>
