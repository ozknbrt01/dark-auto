<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Müşteri Paneli</title>
    
    <!-- BUNLAR EKSİKTİ: CSS MOTORLARI -->
    @livewireStyles
    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 antialiased">
    <style>
        /* Filament'in otomatik oluşturduğu üst menüyü, sayfa başlıklarını ve varsa eski sidebar'ı tamamen yokediyoruz */
        .fi-topbar, 
        .fi-header, 
        .fi-sidebar {
            display: none !important;
        }
        /* Filament'in bıraktığı gereksiz üst boşlukları sıfırlayıp ekranı tam oturtuyoruz */
        .fi-main {
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
    <div class="bg-gray-50 min-h-screen py-8">
        <!-- ANA ÇERÇEVE (Genişliği zorla 900px'e sabitledik ve sola yakın ortaladık) -->
        <div class="px-4 flex flex-col md:flex-row gap-5" style="max-width: 950px; margin-left: 0%; margin-right: auto;">
            
            <!-- SOL MENÜ KUTUSU (Genişliği zorla 200px'e sabitledik) -->
            <div class="flex-shrink-0" style="width: 200px;">
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden sticky top-8" style="font-size: 13px;">
                    
                    <!-- Siparişlerim Grubu -->
                    <div class="border-b border-gray-100" style="padding: 12px;">
                        <div style="font-size: 10px; font-weight: 800; color: #9ca3af; margin-bottom: 8px; margin-left: 4px; letter-spacing: 0.05em;">SİPARİŞLERİM</div>
                        
                        <!-- Tüm Siparişlerim -->
                        <a href="{{ route('filament.customer.pages.dashboard') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            Tüm Siparişlerim
                        </a>
                        
                        <!-- Değerlendirmelerim -->
                        <a href="{{ route('filament.customer.pages.my-reviews') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                            Değerlendirmelerim
                        </a>

                        <!-- Satıcı Mesajlarım -->
                        <a href="{{ route('filament.customer.pages.seller-messages') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                            Satıcı Mesajlarım
                        </a>

                        <!-- Tekrar Satın Al -->
                        <a href="{{ route('filament.customer.pages.buy-again') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Tekrar Satın Al
                        </a>
                    </div>

                    <!-- Sana Özel Grubu -->
                    <div class="border-b border-gray-100" style="padding: 12px;">
                        <div style="font-size: 10px; font-weight: 800; color: #9ca3af; margin-bottom: 8px; margin-left: 4px; letter-spacing: 0.05em;">SANA ÖZEL</div>
                        
                        <!-- İndirim Kuponlarım -->
                        <a href="{{ route('filament.customer.pages.my-coupons') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                            İndirim Kuponlarım
                        </a>

                        <!-- Önceden Gezdiklerim -->
                        <a href="{{ route('filament.customer.pages.recently-viewed') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Önceden Gezdiklerim
                        </a>

                        <!-- Takip Ettiğim Mağazalar -->
                        <a href="{{ route('filament.customer.pages.followed-stores') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                            Takip Ettiğim Mağazalar
                        </a>
                    </div>

                    <!-- Garajım Grubu -->
                    <div class="border-b border-gray-100" style="padding: 12px;">
                        <div style="font-size: 10px; font-weight: 800; color: #9ca3af; margin-bottom: 8px; margin-left: 4px; letter-spacing: 0.05em;">GARAJIM</div>
                        <a href="{{ route('filament.customer.pages.my-garage') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            Kayıtlı Araçlarım
                        </a>
                        <a href="{{ route('filament.customer.pages.favorite-parts') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            Favori Parçalarım
                        </a>
                    </div>

                    <!-- Hesabım ve Yardım Grubu -->
                    <div style="padding: 12px;">
                        <div style="font-size: 10px; font-weight: 800; color: #9ca3af; margin-bottom: 8px; margin-left: 4px; letter-spacing: 0.05em;">HESABIM & YARDIM</div>
                        
                        <!-- Kullanıcı Bilgilerim -->
                        <a href="{{ route('filament.customer.pages.my-profile') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Kullanıcı Bilgilerim
                        </a>
                        
                        <!-- Adres Bilgilerim -->
                        <a href="{{ route('filament.customer.pages.my-addresses') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Adres Bilgilerim
                        </a>

                        <!-- Kayıtlı Kartlarım -->
                        <a href="{{ route('filament.customer.pages.my-cards') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            Kayıtlı Kartlarım
                        </a>

                        <!-- Duyuru Tercihlerim -->
                        <a href="{{ route('filament.customer.pages.notification-preferences') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                            Duyuru Tercihlerim
                        </a>

                        <!-- Şifre Değişikliği -->
                        <a href="{{ route('filament.customer.pages.change-password') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Şifre Değişikliği
                        </a>

                        <!-- Aktif Oturumlarım -->
                        <a href="{{ route('filament.customer.pages.active-sessions') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Aktif Oturumlarım
                        </a>

                        <!-- Auto Marketplace Asistan -->
                        <a href="{{ route('filament.customer.pages.auto-assistant') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group" style="margin-bottom: 4px;">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            Auto Marketplace Asistan
                        </a>

                        <!-- Yardım -->
                        <a href="{{ route('filament.customer.pages.help-support') }}" class="flex items-center gap-2 px-2 py-1.5 text-gray-700 hover:text-orange-500 transition group">
                            <svg style="width: 16px; height: 16px;" class="text-gray-400 group-hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Yardım
                        </a>

                        <!-- Çıkış Yap (En Altta) - Özel Rota -->
                        <div style="margin-top: 12px; border-top: 1px solid #f3f4f6; padding-top: 8px;">
                            <a href="{{ route('guvenli.cikis') }}" class="w-full flex items-center gap-2 px-2 py-1.5 text-red-600 hover:text-red-700 hover:bg-red-50 rounded transition group">
                                <svg style="width: 16px; height: 16px;" class="text-red-500 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Çıkış Yap
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SAĞ İÇERİK ALANI -->
            <div class="flex-1">
                {{ $slot }}
            </div>
            
        </div>
    </div>
    
    <!-- BUNLAR EKSİKTİ: TIKLAMA VE BUTON MOTORLARI -->
    @livewireScripts
    @filamentScripts
</body>
</html>
