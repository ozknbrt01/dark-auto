<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SSS & Müşteri Hizmetleri - Dark Auto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-200 antialiased bg-slate-900 min-h-screen">
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        
        <!-- Logo Bölümü -->
        <div class="mb-10 text-center">
            <a href="/" class="text-4xl font-bold text-amber-500 tracking-wider">DARK AUTO</a>
        </div>

        <!-- İçerik Kapsayıcı -->
        <div class="bg-slate-800 p-8 sm:p-12 rounded-2xl shadow-2xl border border-slate-700">
            <h1 class="text-3xl font-bold text-white mb-2 uppercase tracking-wide text-center">Sıkça Sorulan Sorular</h1>
            <p class="text-amber-500 text-center font-semibold tracking-widest mb-10 border-b border-slate-700 pb-6">KURALLAR NET, RİSK SIFIR.</p>

            <div class="space-y-8">
                
                <!-- Soru 1 -->
                <div class="bg-slate-900 p-6 rounded-lg border-l-4 border-amber-500 shadow-inner">
                    <h3 class="text-xl font-bold text-white mb-3">Satın aldığım ürünün aracıma tam uyumlu ve kaliteli olduğundan nasıl emin olabilirim?</h3>
                    <p class="text-slate-300 leading-relaxed">Bizde "acaba uyar mı" şüphesine yer yoktur. Dark Auto'da listelenen tüm ürünler, yetkinliği kanıtlanmış premium mağazalar tarafından şasi ve model uyum garantisiyle sunulur. Eksik veya yanıltıcı bilgi vererek müşterimizi mağdur eden hiçbir satıcının sistemimizde barınma şansı yoktur. Ne görüyorsanız, aracınıza o gelir.</p>
                </div>

                <!-- Soru 2 -->
                <div class="bg-slate-900 p-6 rounded-lg border-l-4 border-amber-500 shadow-inner">
                    <h3 class="text-xl font-bold text-white mb-3">Ödemem güvende mi? Sisteminiz nasıl çalışıyor?</h3>
                    <p class="text-slate-300 leading-relaxed">Paranızı doğrudan satıcıya değil, Dark Auto'nun aşılmaz çelik kasasına (Güvenli Ödeme Havuzu) emanet edersiniz. Siparişiniz kapınıza gelir, kutuyu açar, parçanın kalitesini kendi gözlerinizle görürsünüz. Siz sistem üzerinden "Ürünü sorunsuz teslim aldım" onayını verene kadar, tek bir kuruş bile satıcının hesabına aktarılmaz. Kontrol tamamen sizin elinizdedir.</p>
                </div>

                <!-- Soru 3 -->
                <div class="bg-slate-900 p-6 rounded-lg border-l-4 border-amber-500 shadow-inner">
                    <h3 class="text-xl font-bold text-white mb-3">Ürün kusurlu, yanlış veya beklentimin altında çıkarsa ne olur?</h3>
                    <p class="text-slate-300 leading-relaxed">Hiçbir mazereti kabul etmiyoruz. Eğer gelen ürün, vaat edilen Dark Auto kalite standartlarını karşılamıyorsa, yorucu prosedürlerle uğraşmazsınız. Koşulsuz şartsız iade süreciniz anında başlar. Satıcıyla pazarlık etmezsiniz; doğrudan bizimle muhatap olur, paranızı kuruşu kuruşuna geri alırsınız. Standartları bozan satıcı ise bedelini sisteme öder.</p>
                </div>

                <!-- Soru 4 -->
                <div class="bg-slate-900 p-6 rounded-lg border-l-4 border-amber-500 shadow-inner">
                    <h3 class="text-xl font-bold text-white mb-3">Kargo ve teslimat süreci nasıl denetleniyor?</h3>
                    <p class="text-slate-300 leading-relaxed">Hız, yoldaki en önemli performanstır. Siparişiniz onaylandığı an, mağazanın taahhüt ettiği sürede kargolama yapması zorunludur. Gecikme yapan satıcıya sistemimiz otomatik olarak cezai yaptırım uygular. Tüm kargo sürecinizi, jilet gibi tasarlanmış Müşteri Paneliniz üzerinden saniye saniye takip edersiniz.</p>
                </div>

                <!-- Soru 5 -->
                <div class="bg-slate-900 p-6 rounded-lg border-l-4 border-amber-500 shadow-inner">
                    <h3 class="text-xl font-bold text-white mb-3">Bir sorun yaşarsam karşınızda gerçek bir muhatap bulabilecek miyim?</h3>
                    <p class="text-slate-300 leading-relaxed">Sizi saatlerce telefonda bekleten uyuşuk çağrı merkezlerini ve otomobilden anlamayan destek ekiplerini unutun. Dark Auto Müşteri Hizmetleri, sektörün dinamiklerini bilen gerçek profesyonellerden oluşur. Bir sorun olduğunda sadece kayıt açıp beklemezler; araya girer, inisiyatif alır ve sorunu sizin lehinize kökünden çözerler. Bize panelinizdeki Destek Merkezi'nden 7/24 ulaşabilirsiniz.</p>
                </div>

            </div>
            
            <div class="mt-10 text-center">
                <a href="/" class="inline-block bg-slate-700 hover:bg-slate-600 text-white font-bold py-3 px-8 rounded-lg transition-colors border border-slate-600 tracking-wide uppercase text-sm">
                    Alışverişe Başla
                </a>
            </div>
        </div>
    </div>
</body>
</html>
