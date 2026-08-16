@extends('layouts.store')

@section('title', 'Siparişiniz Alındı! - OtoMarket')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-8">

    <!-- Başarı Kartı -->
    <div class="bg-[#12192b]/90 border border-emerald-500/40 rounded-3xl p-8 sm:p-10 text-center relative overflow-hidden backdrop-blur-md shadow-2xl shadow-emerald-500/10">
        
        <div class="w-20 h-20 rounded-3xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-4xl mx-auto mb-6 shadow-lg shadow-emerald-500/20">
            ✓
        </div>

        <span class="bg-emerald-500/20 text-emerald-300 text-xs font-bold px-3 py-1 rounded-full border border-emerald-500/30 inline-block mb-3">
            Siparişiniz Başarıyla Oluşturuldu
        </span>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-white mb-2">
            Teşekkürler, {{ $order->customer_name }}!
        </h1>

        <p class="text-sm text-slate-300 max-w-md mx-auto mb-6">
            Siparişiniz alındı ve ilgili satıcılarımıza iletildi. Parçalarınız en kısa sürede kargoya verilecektir.
        </p>

        <div class="inline-flex items-center gap-3 bg-[#18233c] border border-slate-700 px-5 py-2.5 rounded-2xl text-sm font-mono text-slate-200">
            <span class="text-slate-400 font-sans text-xs">Sipariş Takip No:</span>
            <strong class="text-amber-400 text-base font-bold">{{ $order->order_number }}</strong>
        </div>

    </div>

    <!-- Sipariş Detayları & Satıcı Dağılımı -->
    <div class="bg-[#12192b]/80 border border-slate-800 rounded-3xl p-6 sm:p-8 space-y-6">
        <h3 class="text-base font-bold text-white border-b border-slate-800 pb-4 flex items-center justify-between">
            <span>Sipariş Özeti</span>
            <span class="text-xs font-bold text-amber-400 bg-amber-500/10 border border-amber-500/20 px-2.5 py-1 rounded-lg">
                Durum: Onay Bekliyor (Pending)
            </span>
        </h3>

        <div class="divide-y divide-slate-800/80">
            @foreach($order->items as $item)
                <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-lg flex-shrink-0">
                            ⚙️
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-[10px] font-mono bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded">
                                    OEM: {{ $item->product?->oem_code ?? 'OEM' }}
                                </span>
                                <span class="text-xs text-slate-400 font-medium">
                                    🏪 Satıcı: {{ $item->vendor?->store_name ?? 'Satıcı' }}
                                </span>
                            </div>
                            <h4 class="text-sm font-bold text-white mt-1">{{ $item->product_name ?? $item->product?->title }}</h4>
                            <p class="text-xs text-slate-400 font-mono">SKU: {{ $item->sku ?? $item->product?->sku }}</p>
                        </div>
                    </div>

                    <div class="text-right sm:self-center">
                        <span class="text-sm font-bold text-amber-400 font-mono block">
                            ₺{{ number_format($item->total_price, 2, ',', '.') }}
                        </span>
                        <span class="text-xs text-slate-400 block">
                            {{ $item->quantity }} adet x ₺{{ number_format($item->unit_price, 2, ',', '.') }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pt-4 border-t border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-[#162035]/60 p-4 rounded-2xl">
            <div>
                <span class="text-xs text-slate-400 block">Teslimat Adresi</span>
                <p class="text-xs text-slate-200 mt-0.5">{{ $order->shipping_address }}</p>
            </div>

            <div class="text-right flex-shrink-0">
                <span class="text-xs text-slate-400 block">Genel Toplam</span>
                <span class="text-2xl font-black text-amber-400 font-mono">
                    ₺{{ number_format($order->total_amount, 2, ',', '.') }}
                </span>
            </div>
        </div>

        <div class="pt-4 flex justify-center gap-4">
            <a href="/" class="bg-blue-600 hover:bg-blue-500 text-white font-semibold text-xs px-6 py-3 rounded-xl transition shadow-md shadow-blue-500/20">
                Alışverişe Devam Et
            </a>
        </div>
    </div>

</div>
@endsection
