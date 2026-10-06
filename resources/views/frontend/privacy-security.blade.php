<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gizlilik ve Güvenlik - Pazar Yeri</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="bg-blue-900 px-8 py-6 text-white">
                <h1 class="text-3xl font-bold">Müşteri Kullanım, Gizlilik ve Üst Düzey Güvenlik Sözleşmesi</h1>
                <p class="mt-2 text-blue-200">Siz değerli müşterilerimizin hakları ve veri güvenliği garanti altındadır.</p>
            </div>
            
            <div class="p-8 prose prose-blue max-w-none">
                <h3 class="text-xl font-semibold text-gray-900 mt-6 mb-3">1. Üst Düzey Veri Güvenliği ve Şifreleme Teknolojileri</h3>
                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                    <li>Platformumuz, kişisel verilerinizin ve araç bilgilerinizin güvenliğini uluslararası standartlarda sağlamak için en güncel 256-bit SSL (Secure Socket Layer) şifreleme teknolojilerini kullanmaktadır.</li>
                    <li>Kredi kartı ve ödeme bilgileriniz sistemlerimizde <strong>KESİNLİKLE SAKLANMAZ</strong>. Ödeme işlemleri, BDDK onaylı global ödeme altyapısı sağlayıcıları üzerinden doğrudan bankanız ile sizin aranızda gerçekleşir.</li>
                    <li>Kişisel verileriniz hiçbir üçüncü şahıs veya pazarlama şirketiyle paylaşılamaz.</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-900 mt-8 mb-3">2. Güvenli Ödeme Sistemi (Emanet Havuzu)</h3>
                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                    <li>Platformumuzda <strong>"Yüzde Yüz Güvenli Alışveriş"</strong> prensibi geçerlidir. Sipariş verdiğinizde tutar, güvenli emanet havuzunda bekletilir.</li>
                    <li>Siz ürünü teslim alıp onaylayana kadar satıcıya ödeme yapılmaz. Herhangi bir sorunda paranız güvence altındadır ve anında iade edilir.</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-900 mt-8 mb-3">3. Orijinal Ürün Garantisi ve Tüketici Hakları</h3>
                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                    <li>Satın aldığınız ürünlerin beyan edilen kalitede (Orijinal, OEM, Yan Sanayi) olması platformumuzun denetimi ve garantisi altındadır.</li>
                    <li>14 gün içerisinde <strong>Koşulsuz İade Hakkınız</strong> bulunmaktadır. İade edilecek otomotiv parçasının; araca monte edilmemiş, üzerinde yağ/montaj izi bulunmayan ve tekrar satılabilir özelliğini yitirmemiş olması gerekmektedir.</li>
                </ul>
            </div>
        </div>
        
        <div class="text-center mt-8 text-sm text-gray-500">
            &copy; {{ date('Y') }} Pazar Yeri Tüm Hakları Saklıdır.
        </div>
    </div>

</body>
</html>
