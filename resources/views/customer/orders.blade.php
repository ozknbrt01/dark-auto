@extends('layouts.store')

@section('title', 'Siparişlerim - OtoMarket')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-xs text-secondary-dark">
        <a href="/" class="hover:text-white transition">Ana Sayfa</a>
        <span>/</span>
        <span class="text-gray-800 font-medium">Hesabım</span>
        <span>/</span>
        <span class="text-primary font-medium">Siparişlerim</span>
    </nav>

    <!-- Üst Başlık & Kullanıcı Karşılama Kartı -->
    <div class="bg-gradient-to-r from-[#1f1f1f] via-[#262626] to-[#1f1f1f] border border-secondary/30 rounded-3xl p-6 sm:p-8 backdrop-blur-xl shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-primary flex items-center justify-center text-white text-xl font-black shadow-lg shadow-amber-500/20 flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white">Sipariş Geçmişim</h1>
                <p class="text-xs sm:text-sm text-secondary-dark mt-1">
                    Merhaba <span class="text-gray-800 font-semibold">{{ auth()->user()->name }}</span>, vermiş olduğunuz tüm siparişleri ve teslimat durumlarını buradan takip edebilirsiniz.
                </p>
            </div>
        </div>

        <div class="flex items-center gap-3 flex-shrink-0">
            <div class="bg-gray-50 border border-secondary/30 rounded-2xl px-5 py-3 text-center">
                <span class="text-xs text-secondary-dark block font-medium">Toplam Sipariş</span>
                <span class="text-lg font-black text-primary font-mono">{{ $orders->count() }}</span>
            </div>
            <a href="/" class="bg-primary hover:bg-primary text-white font-bold text-xs px-5 py-3.5 rounded-2xl transition shadow-lg shadow-amber-600/20 flex items-center gap-1.5">
                <span>🛒</span>
                <span>Yeni Sipariş Ver</span>
            </a>
        </div>
    </div>

    <!-- Sipariş Listesi -->
    @if($orders->count() > 0)
        <div class="space-y-6">
            @foreach($orders as $order)
                <div class="bg-white/90 border border-secondary/30 rounded-2xl p-6 sm:p-7 backdrop-blur-md shadow-lg space-y-6 transition hover:border-secondary/30">
                    
                    <!-- Sipariş Üst Barı -->
                    <div class="flex flex-wrap items-center justify-between gap-4 pb-4 border-b border-secondary/20">
                        <div class="flex flex-wrap items-center gap-3 sm:gap-6 text-xs text-secondary-dark">
                            <div>
                                <span class="block text-[11px] uppercase tracking-wider text-secondary font-semibold">Sipariş No</span>
                                <span class="font-mono text-white font-bold text-sm sm:text-base">{{ $order->order_number }}</span>
                            </div>
                            <div class="hidden sm:block h-8 w-px bg-gray-100"></div>
                            <div>
                                <span class="block text-[11px] uppercase tracking-wider text-secondary font-semibold">Tarih</span>
                                <span class="text-gray-800 font-medium">{{ $order->created_at->format('d.m.Y - H:i') }}</span>
                            </div>
                            <div class="hidden sm:block h-8 w-px bg-gray-100"></div>
                            <div>
                                <span class="block text-[11px] uppercase tracking-wider text-secondary font-semibold">Toplam Tutar</span>
                                <span class="font-mono text-primary font-extrabold text-sm sm:text-base">{{ number_format($order->total_amount, 2, ',', '.') }} TL</span>
                            </div>
                        </div>

                        <!-- Durum Rozeti -->
                        <div class="flex items-center gap-2">
                            @php
                                $statusMap = [
                                    'pending' => ['bg' => 'bg-primary/10 text-primary border-amber-500/30', 'icon' => '⏳', 'label' => 'Beklemede'],
                                    'processing' => ['bg' => 'bg-primary/10 text-primary border-amber-500/30', 'icon' => '⚙️', 'label' => 'Hazırlanıyor'],
                                    'shipped' => ['bg' => 'bg-purple-500/10 text-purple-400 border-purple-500/30', 'icon' => '🚚', 'label' => 'Kargoya Verildi'],
                                    'completed' => ['bg' => 'bg-emerald-500/10 text-secondary-dark border-emerald-500/30', 'icon' => '✅', 'label' => 'Tamamlandı'],
                                    'cancelled' => ['bg' => 'bg-rose-500/10 text-rose-400 border-rose-500/30', 'icon' => '❌', 'label' => 'İptal Edildi'],
                                ];
                                $st = $statusMap[$order->status] ?? ['bg' => 'bg-slate-500/10 text-gray-700 border-slate-500/30', 'icon' => '📦', 'label' => ucfirst($order->status)];
                            @endphp
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border text-xs font-bold {{ $st['bg'] }}">
                                <span>{{ $st['icon'] }}</span>
                                <span>{{ $st['label'] }}</span>
                            </span>
                        </div>
                    </div>

                    <!-- Sipariş Kalemleri (Ürünler) -->
                    <div class="space-y-3">
                        <span class="text-xs uppercase tracking-wider text-secondary-dark font-bold block">Siparişteki Parçalar</span>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @foreach($order->items as $item)
                                <div class="bg-gray-50 border border-secondary/20 rounded-xl p-4 flex items-center justify-between gap-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-gray-100 border border-secondary/30 flex items-center justify-center text-secondary-dark text-lg flex-shrink-0">
                                            ⚙️
                                        </div>
                                        <div>
                                            <h4 class="text-xs sm:text-sm font-semibold text-white line-clamp-1">
                                                {{ $item->product_name ?? ($item->product?->title ?? 'Oto Yedek Parça') }}
                                            </h4>
                                            <div class="flex items-center gap-2 mt-0.5 text-[11px] text-secondary-dark">
                                                @if($item->vendor)
                                                    <span class="text-primary/90 font-medium">🏪 {{ $item->vendor->store_name }}</span>
                                                    <span>•</span>
                                                @endif
                                                @if($item->sku)
                                                    <span class="font-mono text-secondary-dark">SKU: {{ $item->sku }}</span>
                                                    <span>•</span>
                                                @endif
                                                <span>{{ $item->quantity }} Adet</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right font-mono flex-shrink-0">
                                        <span class="text-xs text-secondary-dark block">{{ number_format($item->unit_price, 2, ',', '.') }} TL</span>
                                        <span class="text-sm font-bold text-white">{{ number_format($item->total_price, 2, ',', '.') }} TL</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Teslimat & Bilgi Özeti -->
                    <div class="bg-white border border-secondary/20 rounded-xl p-4 text-xs text-secondary-dark flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center gap-2">
                            <span class="text-secondary">📍 Teslimat Adresi:</span>
                            <span class="text-gray-700 font-medium">{{ $order->shipping_address }}</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div>
                                <span class="text-secondary">Ödeme Yöntemi:</span>
                                <span class="text-gray-700 font-medium">
                                    {{ $order->payment_method === 'cash_on_delivery' ? '💵 Kapıda Ödeme' : '💳 Online Ödeme' }}
                                </span>
                            </div>
                            <a href="{{ route('order.success', ['orderNumber' => $order->order_number]) }}" class="text-primary hover:text-red-300 font-semibold inline-flex items-center gap-1">
                                <span>Makbuzu Gör</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach

            <!-- Sayfalama (Pagination) -->
            <div class="pt-4">
                <!-- Paginasyon kaldırıldı -->
            </div>
        </div>
    @else
        <!-- Boş Sipariş Durumu (Empty State) -->
        <div class="bg-white/60 border border-dashed border-secondary/30 rounded-3xl p-16 text-center max-w-2xl mx-auto space-y-4 shadow-xl">
            <div class="w-16 h-16 rounded-3xl bg-primary/10 border border-amber-500/20 flex items-center justify-center mx-auto text-3xl text-primary">
                📦
            </div>
            <h3 class="text-xl font-bold text-white">Henüz Bir Siparişiniz Bulunmuyor</h3>
            <p class="text-xs sm:text-sm text-secondary-dark leading-relaxed">
                Aracınıza uygun yüzbinlerce yedek parça ve aksesuar arasından seçim yaparak hemen ilk siparişinizi verebilirsiniz.
            </p>
            <div class="pt-4">
                <a href="/" class="bg-primary hover:bg-primary-dark text-white font-bold text-xs px-7 py-3.5 rounded-xl transition shadow-lg shadow-amber-600/25 inline-flex items-center gap-2">
                    <span>Parça Aramaya Başla</span>
                    <span>→</span>
                </a>
            </div>
        </div>
    @endif

</div>
@endsection
