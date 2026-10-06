<div class="bg-slate-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sol Menü (Sidebar) -->
            <div class="w-full lg:w-80 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden sticky top-24">
                    <div class="p-6 border-b border-slate-100 bg-slate-900">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center font-black text-2xl shadow-lg shadow-blue-600/30">
                                V
                            </div>
                            <div>
                                <h3 class="text-white font-bold">{{ $vendor->store_name ?? 'Satıcı Paneli' }}</h3>
                                <p class="text-slate-400 text-xs">Yönetim Merkezi</p>
                            </div>
                        </div>
                    </div>
                    <nav class="p-5 space-y-2">
                        <a href="#" class="flex items-center gap-3 px-4 py-3.5 text-base font-semibold rounded-xl bg-slate-100 text-slate-900 border border-slate-200 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            Mağaza Özeti
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3.5 text-base font-medium text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition">
                            <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            Ürünlerim
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3.5 text-base font-medium text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition">
                            <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            Sipariş Yönetimi
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3.5 text-base font-medium text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition">
                            <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Finans/Hakediş
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Ana Ekran (Özet) -->
            <div class="flex-1 w-full space-y-6">
                
                @if(session('message'))
                    <div class="bg-emerald-100 text-emerald-700 p-4 rounded-xl font-bold flex items-center gap-2">
                        <span>✅</span> {{ session('message') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-rose-100 text-rose-700 p-4 rounded-xl font-bold flex items-center gap-2">
                        <span>❌</span> {{ session('error') }}
                    </div>
                @endif

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
                    <h1 class="text-3xl font-black text-slate-900 mb-2">Performans Özeti</h1>
                    <p class="text-slate-500">Mağazanızın anlık durumu ve yeni siparişler.</p>
                </div>

                <!-- 4'lü İstatistik Kartı -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-md transition">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Bugünkü Satış</p>
                        </div>
                        <h4 class="text-2xl font-black text-slate-900">₺{{ number_format($todaysSales, 2, ',', '.') }}</h4>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-md transition">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Bekleyen Sipariş</p>
                        </div>
                        <h4 class="text-2xl font-black text-slate-900">{{ $pendingOrdersCount }}</h4>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-md transition">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-rose-50 flex items-center justify-center text-rose-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            </div>
                            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Tükenmek Üzere</p>
                        </div>
                        <h4 class="text-2xl font-black text-slate-900">{{ $lowStockCount }}</h4>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:shadow-md transition">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            </div>
                            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Toplam Kazanç</p>
                        </div>
                        <h4 class="text-2xl font-black text-slate-900">₺{{ number_format($totalEarnings, 2, ',', '.') }}</h4>
                    </div>
                </div>

                <!-- Sipariş Yönetimi Tablosu -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                        <h2 class="text-xl font-bold text-slate-900">Bekleyen Yeni Siparişler</h2>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-slate-50 text-slate-500 font-medium border-b border-slate-200">
                                <tr>
                                    <th class="p-10">Ürün & Müşteri</th>
                                    <th class="p-10">Sipariş No</th>
                                    <th class="p-10">Adet / Tutar</th>
                                    <th class="p-10 text-center">Durum</th>
                                    <th class="p-10 text-right">İşlem</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($pendingOrders as $order)
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-10">
                                            @foreach($order->items as $item)
                                                <p class="font-bold text-slate-900 line-clamp-1 mb-1">{{ $item->product_name }} <span class="text-xs text-slate-500 font-normal">({{ $item->quantity }}x)</span></p>
                                            @endforeach
                                            <p class="text-slate-500 text-xs mt-2">Müşteri: {{ $order->customer_name ?? 'Bilinmiyor' }}</p>
                                        </td>
                                        <td class="p-10 font-mono text-slate-600">{{ $order->order_number ?? 'Bilinmiyor' }}</td>
                                        <td class="p-10">
                                            <p class="text-blue-600 font-black mt-0.5">₺{{ number_format($order->items->sum('total_price'), 2, ',', '.') }}</p>
                                        </td>
                                        <td class="p-10 text-center">
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                                Onay Bekliyor
                                            </span>
                                        </td>
                                        <td class="p-10 text-right">
                                            <div class="flex flex-col items-end gap-2">
                                                <div class="flex gap-2">
                                                    <input type="text" wire:model.defer="shippingCompany.{{ $order->id }}" placeholder="Kargo Firması" class="border border-slate-200 rounded-md px-2 py-1 text-xs w-24 focus:ring-blue-500 focus:border-blue-500">
                                                    <input type="text" wire:model.defer="trackingNumber.{{ $order->id }}" placeholder="Takip No" class="border border-slate-200 rounded-md px-2 py-1 text-xs w-28 focus:ring-blue-500 focus:border-blue-500">
                                                </div>
                                                <div class="flex gap-2 mt-1">
                                                    <button wire:click="shipOrder({{ $order->id }})" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-1.5 px-3 rounded-lg text-xs transition shadow-sm">
                                                        Kargoya Ver
                                                    </button>
                                                    <button wire:click="cancelOrder({{ $order->id }})" onclick="confirm('Siparişi iptal etmek istediğinize emin misiniz?') || event.stopImmediatePropagation()" class="bg-rose-100 hover:bg-rose-200 text-rose-700 font-semibold py-1.5 px-3 rounded-lg text-xs transition shadow-sm">
                                                        İptal
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-16 text-center">
                                            <div class="text-4xl mb-3">✅</div>
                                            <p class="text-slate-900 font-bold">Harika! Bekleyen siparişiniz yok.</p>
                                            <p class="text-slate-500 text-sm mt-1">Tüm siparişleri başarıyla yönettiniz.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
