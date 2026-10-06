<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>İade ve İptal Şartları - Dark Auto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-200 antialiased bg-slate-900 min-h-screen">
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        
        <!-- Logo Bölümü -->
        <div class="mb-10 text-center">
            <a href="/" class="text-4xl font-bold text-amber-500 tracking-wider">DARK AUTO</a>
        </div>

        <!-- İçerik Kapsayıcı -->
        <div class="bg-slate-800 p-8 sm:p-14 rounded-2xl shadow-2xl border border-slate-700">
            <h1 class="text-3xl sm:text-4xl font-bold text-white mb-2 uppercase tracking-wide text-center">Tavizsiz İade ve İptal Politikası</h1>
            <p class="text-amber-500 text-center font-bold tracking-widest mb-10 border-b border-slate-700 pb-6">KURAL BASİT: HAKLI OLAN HAKLIDIR.</p>

            <div class="space-y-8 text-slate-300 leading-relaxed text-lg">
                
                <p class="mb-6">Dark Auto'da gri alanlara, bitmek bilmeyen prosedürlere ve mağduriyete yer yoktur. İnternetteki "satıcıyı koruyan ama alıcıyı süründüren" veya "kötü niyetli alıcıya boyun eğip esnafı ezen" o çürük e-ticaret sistemini reddediyoruz. Bizim adalet terazimiz çelikten yapılmıştır.</p>
                
                <p class="mb-8">Sitemizden yaptığınız her alışveriş, Dark Auto'nun <strong class="text-white">Güvenli Ödeme Havuzu</strong> güvencesi altındadır. Paranız, siz ürünü kendi gözlerinizle görüp "Sorunsuz teslim aldım" onayını verene kadar satıcıya aktarılmaz, bizim çelik kasamızda bekler.</p>

                <!-- Madde 1 -->
                <div class="bg-slate-900 p-6 rounded-lg border-l-4 border-amber-500 shadow-inner">
                    <h3 class="text-xl font-bold text-white mb-3">1. Hatalı veya Kusurlu Ürün (Sıfır Tolerans)</h3>
                    <p>Siparişiniz vaat edilenden farklı, eksik veya hasarlı mı geldi? Hiçbir mazeret dinlemiyoruz. Koşulsuz şartsız iade süreciniz anında başlar ve paranızı kuruşu kuruşuna geri alırsınız. Muhatabınız satıcı değil, doğrudan biziz. Kalite standartlarımızı bozan satıcı ise doğrudan sistemimiz tarafından cezalandırılır.</p>
                </div>

                <!-- Madde 2 -->
                <div class="bg-slate-900 p-6 rounded-lg border-l-4 border-amber-500 shadow-inner">
                    <h3 class="text-xl font-bold text-white mb-3">2. Cayma Hakkı ve Sınırları (Adil Ticaret)</h3>
                    <p>Fikrinizi mi değiştirdiniz? 14 gün içinde yasal iade hakkınız cebinizdedir. <strong class="text-amber-500">Ancak kurallarımız nettir:</strong> Bir yedek parçayı veya aksesuarı aracınıza takıp, kullanıp, deforme edip geri gönderemezsiniz. Burası deneme tahtası değildir. Orijinal kutusunda, hasarsız ve yeniden satılabilir durumdaki her ürün için kapımız sonuna kadar açıktır. Dürüst müşterinin hakkını nasıl koruyorsak, işini hakkıyla yapan esnafın emeğini de aynı sertlikle koruruz.</p>
                </div>

                <!-- Madde 3 -->
                <div class="bg-slate-900 p-6 rounded-lg border-l-4 border-amber-500 shadow-inner">
                    <h3 class="text-xl font-bold text-white mb-3">3. Anında İptal Gücü</h3>
                    <p>Sipariş verdiniz ancak fikriniz değişti ve ürün henüz kargoya verilmedi mi? "Satıcı iptali onaylasın da param yatsın" diye günlerce beklemezsiniz. Panelinizden tek tuşla iptal edersiniz, işlem anında kesilir ve paranız size doğru yola çıkar. Direksiyon her zaman sizdedir.</p>
                </div>

                <!-- Kapanış -->
                <div class="text-2xl text-center text-white font-bold tracking-widest uppercase mt-12 border-t border-slate-700 pt-8">
                    Bizde Risk Yoktur. Sadece Net Kurallar Vardır.
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <a href="/" class="inline-block bg-slate-700 hover:bg-slate-600 text-white font-bold py-3 px-8 rounded-lg transition-colors border border-slate-600 tracking-wide uppercase text-sm">
                    Alışverişe Başla
                </a>
            </div>
        </div>
    </div>
</body>
</html>
