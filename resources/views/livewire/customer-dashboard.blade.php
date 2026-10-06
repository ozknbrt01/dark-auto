<div class="bg-slate-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row gap-8">
            
            <!-- Sol Menü (Sidebar) -->
            <div class="w-full md:w-80 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden sticky top-24">
                    <div class="p-6 border-b border-slate-100">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xl">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <div>
                                <h3 class="text-slate-900 font-bold">{{ auth()->user()->name }}</h3>
                                <p class="text-slate-500 text-xs">Müşteri Hesabı</p>
                            </div>
                        </div>
                    </div>
                    <nav class="p-5 space-y-2">
                        <a href="#" class="flex items-center gap-3 px-4 py-3.5 text-base font-semibold rounded-xl bg-slate-100 text-slate-900 border border-slate-200 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Profilim
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3.5 text-base font-medium text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition">
                            <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            Siparişlerim
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3.5 text-base font-medium text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition">
                            <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            Garanti/İade Taleplerim
                        </a>
                        <a href="{{ route('customer.garage') }}" class="flex items-center gap-3 px-4 py-3.5 text-base font-medium text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition">
                            <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                            Garajım (Aracım)
                        </a>
                        
                        <form action="{{ route('logout') }}" method="POST" class="pt-4 mt-4 border-t border-slate-100">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3.5 text-base font-medium text-rose-700 hover:bg-rose-50 rounded-xl transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Çıkış Yap
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Ana Ekran (Özet) -->
            <div class="flex-1 w-full space-y-6">
                
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
                    <h1 class="text-3xl font-black text-slate-900 mb-2">Hoş geldin, {{ auth()->user()->name }} 👋</h1>
                    <p class="text-slate-500">Müşteri panelinden siparişlerini, garajını ve hesap detaylarını yönetebilirsin.</p>
                </div>

                <!-- 3'lü İstatistik Kartı -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex items-center gap-4 hover:border-blue-200 transition">
                        <div class="w-14 h-14 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 text-2xl">
                            📦
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm font-medium mb-1">Aktif Siparişler</p>
                            <h4 class="text-2xl font-black text-slate-900">{{ $activeOrdersCount }}</h4>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex items-center gap-4 hover:border-blue-200 transition">
                        <div class="w-14 h-14 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 text-2xl">
                            🚚
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm font-medium mb-1">Kargodaki Ürünler</p>
                            <h4 class="text-2xl font-black text-slate-900">{{ $shippedOrdersCount }}</h4>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex items-center gap-4 hover:border-blue-200 transition">
                        <div class="w-14 h-14 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600 text-2xl">
                            🚗
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm font-medium mb-1">Garajımdaki Araçlar</p>
                            <h4 class="text-2xl font-black text-slate-900">{{ $vehiclesCount }}</h4>
                        </div>
                    </div>
                </div>

                <!-- Siparişler Tablosu -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                        <h2 class="text-xl font-bold text-slate-900">Son 5 Siparişim</h2>
                        <a href="{{ route('customer.orders') ?? '#' }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition">Tümünü Gör &rarr;</a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-slate-50 text-slate-500 font-medium">
                                <tr>
                                    <th class="p-10">Sipariş No</th>
                                    <th class="p-10">Tarih</th>
                                    <th class="p-10">Tutar</th>
                                    <th class="p-10">Durum</th>
                                    <th class="p-10 text-right">İşlem</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($latestOrders as $order)
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-10 font-mono font-medium text-slate-900">{{ $order->order_number }}</td>
                                        <td class="p-10 text-slate-500">{{ $order->created_at->format('d M Y') }}</td>
                                        <td class="p-10 font-bold text-slate-900">₺{{ number_format($order->total_amount, 2, ',', '.') }}</td>
                                        <td class="p-10">
                                            @if($order->status === 'completed' || $order->status === 'shipped')
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                                                    Başarılı
                                                </span>
                                            @elseif($order->status === 'cancelled')
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-700">
                                                    İptal Edildi
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                                    Bekliyor / Hazırlanıyor
                                                </span>
                                            @endif
                                        </td>
                                        <td class="p-10 text-right">
                                            <div class="flex items-center justify-end gap-3">
                                                @if($order->tracking_number)
                                                    <a href="#" class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 hover:bg-blue-100 px-3 py-1.5 rounded-lg border border-blue-200 transition text-xs font-semibold whitespace-nowrap">
                                                        <span>📦</span>
                                                        Kargom Nerede: <span class="font-mono">{{ $order->tracking_number }}</span>
                                                    </a>
                                                @endif
                                                <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold transition">Detay</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                            Henüz hiç siparişiniz bulunmuyor.
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
