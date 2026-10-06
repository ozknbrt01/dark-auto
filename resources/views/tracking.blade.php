<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kargo Takibi - Dark Auto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-200 antialiased bg-slate-900 min-h-screen">
    <div class="max-w-3xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        
        <!-- Logo Bölümü -->
        <div class="mb-10 text-center">
            <a href="/" class="text-4xl font-bold text-amber-500 tracking-wider">DARK AUTO</a>
        </div>

        <!-- İçerik Kapsayıcı -->
        <div class="bg-slate-800 p-8 sm:p-12 rounded-2xl shadow-2xl border border-slate-700">
            <h1 class="text-2xl sm:text-3xl font-bold text-white mb-4 uppercase tracking-wide text-center">Kargo Takibi - Rotayı Anlık İzleyin</h1>
            <p class="text-slate-400 text-center mb-10 border-b border-slate-700 pb-8 leading-relaxed">
                Dark Auto'da kör noktalara yer yok. Siparişinizin depomuzdan çıkıp kapınıza ulaştığı ana kadar her kilometresini anlık olarak takip edin. Hız ve şeffaflık bizim standart donanımımızdır.
            </p>

            <form action="#" method="GET" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Sipariş Numarası</label>
                    <input type="text" placeholder="Örn: DA-102938" class="block w-full bg-slate-900 border-slate-700 text-slate-200 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500 p-3 border placeholder-slate-600">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">E-posta Adresi</label>
                    <input type="email" placeholder="Siparişi verirken kullandığınız e-posta" class="block w-full bg-slate-900 border-slate-700 text-slate-200 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500 p-3 border placeholder-slate-600">
                </div>

                <button type="button" class="w-full bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold py-4 px-8 rounded-lg mt-4 text-lg transition-colors uppercase tracking-widest shadow-lg">
                    Sipariş Rotasını Göster
                </button>
            </form>
            
            <div class="mt-8 text-center">
                <p class="text-sm text-slate-500">Bir sorun mu var? <a href="#" class="text-amber-500 hover:underline">Müşteri Hizmetlerine Ulaşın</a></p>
            </div>
        </div>
    </div>
</body>
</html>
