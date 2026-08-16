<div class="space-y-6">
    @if(count($cart) > 0)
        <div class="space-y-4">
            @foreach($cart as $id => $item)
                <div class="bg-[#162035]/80 border border-slate-700/80 rounded-2xl p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-xl bg-slate-800 flex items-center justify-center text-xl flex-shrink-0">
                            ⚙️
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-[10px] font-mono bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded border border-blue-500/20">
                                    OEM: {{ $item['oem_code'] }}
                                </span>
                                <span class="text-xs text-slate-400">🏪 {{ $item['vendor_name'] }}</span>
                            </div>
                            <h4 class="text-sm font-bold text-white mt-1">{{ $item['title'] }}</h4>
                            <p class="text-xs text-slate-400 font-mono">SKU: {{ $item['sku'] }}</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between sm:justify-end gap-6 pt-3 sm:pt-0 border-t sm:border-t-0 border-slate-700/60">
                        <!-- Miktar Kontrolü -->
                        <div class="flex items-center bg-slate-900 border border-slate-700 rounded-xl p-1">
                            <button 
                                wire:click="updateQuantity({{ $id }}, {{ $item['quantity'] - 1 }})"
                                class="w-7 h-7 flex items-center justify-center text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition"
                            >-</button>
                            <span class="w-8 text-center text-xs font-bold text-white font-mono">{{ $item['quantity'] }}</span>
                            <button 
                                wire:click="updateQuantity({{ $id }}, {{ $item['quantity'] + 1 }})"
                                class="w-7 h-7 flex items-center justify-center text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition"
                            >+</button>
                        </div>

                        <!-- Toplam Fiyat & Sil Butonu -->
                        <div class="text-right">
                            <span class="text-sm font-bold text-amber-400 font-mono block">
                                ₺{{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}
                            </span>
                            <span class="text-[10px] text-slate-400 block">
                                (₺{{ number_format($item['price'], 2, ',', '.') }} / adet)
                            </span>
                        </div>

                        <button 
                            wire:click="removeItem({{ $id }})"
                            class="text-slate-400 hover:text-rose-400 transition p-1.5 rounded-lg hover:bg-rose-500/10"
                            title="Sepetten Kaldır"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="bg-[#12192b] border border-slate-800 p-5 rounded-2xl flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <button 
                wire:click="clearCart"
                class="text-xs text-slate-400 hover:text-rose-400 transition flex items-center gap-1.5"
            >
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                <span>Sepeti Boşalt</span>
            </button>

            <div class="flex items-center gap-4 sm:justify-end">
                <span class="text-xs text-slate-400">Sepet Toplamı:</span>
                <span class="text-xl font-black text-amber-400 font-mono">
                    ₺{{ number_format($total, 2, ',', '.') }}
                </span>
            </div>
        </div>
    @else
        <div class="bg-[#12192b]/60 border border-dashed border-slate-800 rounded-2xl p-8 text-center space-y-3">
            <div class="text-3xl">🛒</div>
            <h4 class="text-sm font-bold text-white">Sepetiniz Boş</h4>
            <p class="text-xs text-slate-400">Aracınıza uyumlu parçaları inceleyerek sepetinize ekleyebilirsiniz.</p>
            <a href="/" class="inline-block text-xs bg-blue-600 hover:bg-blue-500 text-white font-semibold px-4 py-2 rounded-xl transition">
                Parça Aramaya Başla
            </a>
        </div>
    @endif
</div>
