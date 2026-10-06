<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kayıt Ol - Dark Auto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-200 antialiased bg-slate-900 min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8 relative z-0">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-slate-800 via-slate-900 to-slate-900 -z-10"></div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
        <a href="/" class="text-4xl font-black text-amber-500 tracking-widest uppercase shadow-amber-500/20 drop-shadow-lg">DARK AUTO</a>
        <h2 class="mt-6 text-2xl sm:text-3xl font-extrabold text-white uppercase tracking-wide">Ayrıcalıklı Dünyaya Katıl</h2>
        <p class="mt-2 text-sm text-slate-400">
            Zaten içeride misin? 
            <a href="{{ route('login') }}" class="font-bold text-amber-500 hover:text-amber-400 transition uppercase tracking-wider">VIP Giriş Yap</a>
        </p>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-slate-800/80 backdrop-blur-md py-8 px-4 shadow-2xl shadow-black/50 sm:rounded-2xl sm:px-10 border border-slate-700 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-amber-600 via-amber-400 to-amber-600"></div>
            
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-bold text-slate-300 uppercase tracking-wide">Ad Soyad</label>
                    <div class="mt-1">
                        <input id="name" name="name" type="text" required autofocus class="appearance-none block w-full px-4 py-3 border border-slate-600 rounded-lg shadow-sm placeholder-slate-500 text-white bg-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 sm:text-sm transition-colors">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-bold text-slate-300 uppercase tracking-wide">E-Posta Adresi</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" required class="appearance-none block w-full px-4 py-3 border border-slate-600 rounded-lg shadow-sm placeholder-slate-500 text-white bg-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 sm:text-sm transition-colors">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-slate-300 uppercase tracking-wide">Parola</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" required class="appearance-none block w-full px-4 py-3 border border-slate-600 rounded-lg shadow-sm placeholder-slate-500 text-white bg-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 sm:text-sm transition-colors">
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-slate-300 uppercase tracking-wide">Parola (Tekrar)</label>
                    <div class="mt-1">
                        <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none block w-full px-4 py-3 border border-slate-600 rounded-lg shadow-sm placeholder-slate-500 text-white bg-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 sm:text-sm transition-colors">
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center mt-6 py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-black text-slate-900 bg-amber-500 hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-900 focus:ring-amber-500 transition-all uppercase tracking-widest">
                        Garajı Aç (Kayıt Ol)
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
