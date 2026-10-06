<div>
    @if($showPopup && $campaign)
        <!-- Overlay -->
        <div class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-gray-50 backdrop-blur-sm transition-opacity" wire:transition.fade>
            <!-- Modal -->
            <div class="relative w-full max-w-lg bg-gradient-to-b from-[#1a233a] to-[#1f1f1f] border border-amber-500/30 rounded-2xl shadow-2xl overflow-hidden transform transition-all" wire:transition.scale.origin.bottom>
                
                <!-- Close Button -->
                <button wire:click="dismiss" type="button" class="absolute top-4 right-4 text-secondary-dark hover:text-white transition bg-gray-100/50 hover:bg-slate-700/50 p-2 rounded-full z-10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <!-- Decorative Background Element -->
                <div class="absolute top-0 left-0 right-0 h-32 bg-gradient-to-r from-amber-600/20 via-amber-500/20 to-purple-600/20 blur-xl pointer-events-none"></div>

                <div class="p-8 text-center relative z-10">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 border border-amber-500/20 text-3xl mb-5 shadow-inner">
                        🎉
                    </div>

                    <h2 class="text-xs font-bold text-primary tracking-wider uppercase mb-2">
                        {{ $campaign->vendor?->store_name }} Gururla Sunar
                    </h2>
                    
                    <h3 class="text-3xl font-extrabold text-white leading-tight mb-4">
                        {{ $campaign->title }}
                    </h3>
                    
                    <div class="bg-primary/10 border border-amber-500/30 rounded-xl p-4 mb-6">
                        <p class="text-lg font-semibold text-primary">
                            {{ $campaign->discount_text }}
                        </p>
                    </div>

                    @if($campaign->end_date)
                        <p class="text-sm text-secondary-dark mb-6 flex items-center justify-center gap-2">
                            <span>⏱️</span>
                            <span>Son Gün: <strong class="text-gray-800">{{ $campaign->end_date->format('d.m.Y H:i') }}</strong></span>
                        </p>
                    @endif

                    <div class="flex gap-4 w-full mt-4">
                        <button wire:click="dismiss" class="flex-1 py-3 px-4 rounded-xl border border-secondary/30 hover:bg-gray-100 text-gray-700 font-semibold transition">
                            Belki Sonra
                        </button>
                        <a href="{{ route('products.search') }}" wire:click="dismiss" class="flex-1 py-3 px-4 rounded-xl bg-primary hover:bg-primary text-slate-900 font-bold shadow-lg shadow-amber-500/20 transition flex items-center justify-center gap-2">
                            <span>Kampanyayı Gör</span>
                            <span>&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
