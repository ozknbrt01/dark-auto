<div class="min-h-screen bg-slate-900 text-slate-200 antialiased flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto !w-full !max-w-2xl">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
            Hesap Oluştur
        </h2>
    </div>

    <div class="mt-8 mx-auto !w-full !max-w-2xl">
        <div class="!max-w-2xl !w-full !p-12 !bg-slate-800 !rounded-2xl shadow-2xl border border-slate-700 mx-auto mt-6 overflow-hidden">
            <form wire:submit="register" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-300">
                        Ad Soyad
                    </label>
                    <div class="mt-1">
                        <input wire:model="name" id="name" type="text" required class="appearance-none block w-full px-3 py-2 bg-slate-900 border-slate-700 text-white rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                        @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-300">
                        E-posta Adresi
                    </label>
                    <div class="mt-1">
                        <input wire:model="email" id="email" type="email" required class="appearance-none block w-full px-3 py-2 bg-slate-900 border-slate-700 text-white rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                        @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-300">
                        Şifre
                    </label>
                    <div class="mt-1">
                        <input wire:model="password" id="password" type="password" required class="appearance-none block w-full px-3 py-2 bg-slate-900 border-slate-700 text-white rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                        @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-300">
                        Şifre Tekrarı
                    </label>
                    <div class="mt-1">
                        <input wire:model="password_confirmation" id="password_confirmation" type="password" required class="appearance-none block w-full px-3 py-2 bg-slate-900 border-slate-700 text-white rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-slate-900 bg-amber-500 hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                        Kayıt Ol
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="font-medium text-slate-400 hover:text-amber-500 transition text-sm">
                    Zaten hesabınız var mı? Giriş Yapın
                </a>
            </div>
        </div>
    </div>
</div>
