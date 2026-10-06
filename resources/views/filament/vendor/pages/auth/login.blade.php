<div>
@section('title', 'Mağaza Girişi - OtoMarket')

@section('content')
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-900 w-full">
    <div class="!max-w-2xl !w-full space-y-6 mx-auto">
        
        <!-- Üst Başlık & Logo -->
        <div class="text-center space-y-2">
            <div class="inline-flex w-14 h-14 rounded-2xl bg-primary items-center justify-center shadow-xl shadow-amber-500/20 mb-2">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Mağaza Girişi</h2>
            <p class="text-xs sm:text-sm text-secondary-dark">
                Satıcı paneline erişmek için giriş yapın.
            </p>
        </div>

        <!-- Giriş Kartı -->
        <div class="!max-w-2xl !w-full !p-12 !bg-slate-800 !rounded-2xl shadow-2xl border border-slate-700 mx-auto mt-6 overflow-hidden">
            <form wire:submit="authenticate" class="space-y-6">

                <!-- E-Posta -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-white mb-1.5">E-Posta Adresi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-secondary-dark">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input 
                            type="email" 
                            wire:model="data.email" 
                            id="email"
                            required 
                            autofocus
                            placeholder="ornek@mail.com"
                            class="w-full bg-[#1c2438] border @error('data.email') border-rose-500 @else border-secondary/30 @enderror rounded-xl py-3 pl-10 pr-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition"
                        >
                    </div>
                    @error('data.email')
                        <p class="text-rose-400 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Şifre -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-xs font-semibold text-white">Şifre</label>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-secondary-dark">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input 
                            type="password" 
                            wire:model="data.password" 
                            id="password"
                            required 
                            placeholder="••••••••"
                            class="w-full bg-[#1c2438] border @error('data.password') border-rose-500 @else border-secondary/30 @enderror rounded-xl py-3 pl-10 pr-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition"
                        >
                    </div>
                    @error('data.password')
                        <p class="text-rose-400 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Beni Hatırla -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input 
                            type="checkbox" 
                            wire:model="data.remember" 
                            class="w-4 h-4 rounded bg-slate-900 border-secondary/30 text-primary focus:ring-amber-500 focus:ring-offset-slate-900"
                        >
                        <span class="text-xs text-secondary-dark select-none">Beni hatırla</span>
                    </label>
                </div>

                <!-- Giriş Butonu -->
                <button 
                    type="submit" 
                    class="w-full bg-primary hover:bg-primary-dark text-white font-bold text-sm py-3 px-4 rounded-xl transition shadow-lg shadow-amber-600/30 flex items-center justify-center gap-2 group"
                >
                    <span>Giriş Yap</span>
                    <svg class="w-4 h-4 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>
            </form>
        </div>

        <div class="text-center">
            <a href="/" class="text-xs text-secondary hover:text-white transition inline-flex items-center gap-1">
                <span>←</span> Ana Sayfaya Dön
            </a>
        </div>

    </div>
</div>
@endsection
</div>
