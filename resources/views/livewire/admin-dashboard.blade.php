<div class="bg-slate-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Üst Başlık -->
        <div class="mb-8">
            <h1 class="text-3xl font-black text-slate-900">Yönetim Paneli (Admin) 👑</h1>
            <p class="text-slate-500 mt-2">Sistemin genel istatistiklerini ve bekleyen satıcı başvurularını yönetin.</p>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            
            <!-- Sol Menü -->
            <div class="w-full md:w-64 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden sticky top-24">
                    <nav class="p-3 space-y-1">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl bg-blue-50 text-blue-700 transition">
                            <span>📊</span> Özet
                        </a>
                        <a href="/filament-admin" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition">
                            <span>⚙️</span> Gelişmiş Panel (Filament)
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Ana İçerik -->
            <div class="flex-1 w-full space-y-6">
                
                @if (session()->has('success'))
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl shadow-sm flex items-center gap-2">
                        <span>✅</span> {{ session('success') }}
                    </div>
                @endif

                <!-- İstatistikler -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:border-blue-200 transition">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 mb-3">👥</div>
                        <p class="text-slate-500 text-xs font-medium mb-1">Toplam Kullanıcı</p>
                        <h4 class="text-xl font-black text-slate-900">{{ $usersCount }}</h4>
                    </div>
                    
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:border-blue-200 transition">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 mb-3">🏬</div>
                        <p class="text-slate-500 text-xs font-medium mb-1">Toplam Mağaza</p>
                        <h4 class="text-xl font-black text-slate-900">{{ $vendorsCount }}</h4>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:border-blue-200 transition">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600 mb-3">📦</div>
                        <p class="text-slate-500 text-xs font-medium mb-1">Toplam Sipariş</p>
                        <h4 class="text-xl font-black text-slate-900">{{ $ordersCount }}</h4>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 hover:border-blue-200 transition">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center text-purple-600 mb-3">💰</div>
                        <p class="text-slate-500 text-xs font-medium mb-1">Toplam Ciro</p>
                        <h4 class="text-xl font-black text-slate-900">₺{{ number_format($totalSales, 2, ',', '.') }}</h4>
                    </div>
                </div>

                <!-- Bekleyen Başvurular Tablosu -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                        <h2 class="text-lg font-bold text-slate-900">Bekleyen Satıcı Başvuruları</h2>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-slate-50 text-slate-500 font-medium border-b border-slate-200">
                                <tr>
                                    <th class="p-10">Kullanıcı & Dükkan</th>
                                    <th class="p-10">Vergi Bilgileri</th>
                                    <th class="p-10 text-right">İşlem</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($pendingApplications as $app)
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-10">
                                            <p class="font-bold text-slate-900">{{ $app->shop_name }}</p>
                                            <p class="text-slate-500 text-xs mt-1">{{ $app->name }} ({{ $app->email }})</p>
                                        </td>
                                        <td class="p-10">
                                            <p class="text-slate-700 text-xs">V. No: <span class="font-mono">{{ $app->tax_number }}</span></p>
                                            <p class="text-slate-500 text-xs mt-1">Dairesi: {{ $app->tax_office }}</p>
                                        </td>
                                        <td class="p-10 text-right">
                                            <button wire:click="approveVendor({{ $app->id }})" onclick="confirm('Bu satıcıyı onaylamak istediğinize emin misiniz?') || event.stopImmediatePropagation()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-xs transition shadow-sm">
                                                Onayla
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-12 text-center">
                                            <div class="text-3xl mb-3">✅</div>
                                            <p class="text-slate-900 font-bold">Bekleyen başvuru bulunmuyor.</p>
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
