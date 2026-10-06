@extends('layouts.store')

@section('title', 'Garajım - OtoMarket')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col md:flex-row gap-8">
        
        <!-- Sol Menü (Profil, Siparişler vb.) -->
        <div class="w-full md:w-64 flex-shrink-0">
            <div class="bg-white/80 border border-secondary/20 rounded-2xl p-4 sticky top-24">
                <div class="flex items-center gap-3 mb-6 px-2">
                    <div class="w-12 h-12 rounded-xl bg-primary flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-amber-500/20">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-sm">{{ auth()->user()->name }}</h3>
                        <p class="text-[11px] text-secondary-dark">{{ auth()->user()->email }}</p>
                    </div>
                </div>

                <nav class="space-y-1">
                    <a href="{{ route('customer.orders') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-700 hover:text-white hover:bg-gray-100 transition">
                        <span class="text-primary">📦</span> Siparişlerim
                    </a>
                    <a href="/customer/garage" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-white bg-primary/10 border border-amber-500/20 shadow-sm transition">
                        <span class="text-primary">🚗</span> Garajım
                    </a>
                </nav>
            </div>
        </div>

        <!-- Sağ İçerik Alanı -->
        <div class="flex-1">
            <div class="mb-6">
                <h1 class="text-2xl font-black text-white">Benim Garajım</h1>
                <p class="text-sm text-secondary-dark mt-1">Araçlarınızı kaydedin, size özel yedek parça ve uyumluluk önerilerini anında görün.</p>
            </div>

            @livewire('garage-manager')
        </div>

    </div>
</div>
@endsection
