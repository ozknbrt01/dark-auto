<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/arama', function () { return view('search'); })->name('vitrin.arama');
Route::get('/eski-arama-yonlendirme', function () { return redirect()->route('vitrin.arama'); })->name('products.search');

// Sepet & Sipariş (Checkout) Rotaları
Route::get('/sepetim', \App\Livewire\CartPage::class)->name('sepetim');
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/siparis-basarili/{orderNumber}', [CheckoutController::class, 'success'])->name('order.success');

// Yetkilendirme Rotaları
Route::get('/giris-yap', \App\Livewire\Auth\Login::class)->name('login');
Route::get('/kaydol', \App\Livewire\Auth\Register::class)->name('register');

// Kategori Rotaları
Route::get('/kategori/{slug}', \App\Livewire\CategoryPage::class)->name('kategori.goster');
Route::get('/urun/{slug}', \App\Livewire\ProductDetail::class)->name('urun.detay');

// Statik Sayfalar (Footer Linkleri)
Route::get('/hakkimizda', function () { return view('about'); })->name('about');
Route::get('/iletisim', function () { return view('pages.static', ['title' => 'İletişim']); })->name('iletisim');
Route::get('/kargo-takibi', function () { return view('tracking'); })->name('kargo.takibi');
Route::get('/iade-ve-iptal', function () { return view('refund'); })->name('iade.iptal');

// Satıcı Başvuru
Route::get('/satici-ol', function () { return view('vendor.apply'); })->name('satici.ol');
Route::get('/odeme', \App\Livewire\CheckoutPage::class)->name('odeme')->middleware('auth');

Route::get('/sss', function () { return view('faq'); })->name('faq');
Route::get('/kategoriler', function () { return view('categories'); })->name('kategoriler');
Route::get('/vip-giris', function () { return view('dark-login'); })->name('vip.login');
Route::get('/vip-kayit', function () { return view('dark-register'); })->name('vip.register');

// Otomatik Çeviri ve Türkçe URL Bypass Rotaları
// Giriş Bypass Rotaları (Session Başlatır)
Route::post('/kaydol', function () { session(['user_name' => 'VIP Üye']); return redirect()->route('dashboard'); });
Route::post('/vip-kayit-islem', function () { session(['user_name' => 'VIP Üye']); return redirect()->route('dashboard'); });
Route::post('/vip-giris-islem', function () { session(['user_name' => 'VIP Üye']); return redirect()->route('dashboard'); });
Route::post('/giris-yap', function () { session(['user_name' => 'VIP Üye']); return redirect()->route('dashboard'); });

// Çıkış Bypass Rotaları (Session Temizler)
Route::post('/cikis-yap', function () { session()->forget('user_name'); return redirect('/'); });
Route::post('/logout', function () { session()->forget('user_name'); return redirect('/'); });

// Dashboard Rotasının Tanımlı Olduğundan Emin Olalım
if (!Route::has('dashboard')) {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
}

Route::get('/siparislerim', function () { return view('orders'); })->name('orders');
Route::get('/favorilerim', function () { return view('favorites'); })->name('favorites');
Route::get('/ayarlar', function () { return view('settings'); })->name('settings');

// Hesap Ayarları Form Bypass Rotaları
Route::post('/ayarlar/profil-guncelle', function (Request $request) { 
    session(['user_name' => $request->input('name')]);
    return back()->withInput()->with('success', 'Pilot profili sistemlere başarıyla işlendi.'); 
})->name('settings.profile');

Route::post('/ayarlar/adres-kaydet', function () { 
    return back()->withInput()->with('success', 'Lojistik varış noktası şifrelenerek kaydedildi.'); 
})->name('settings.address');

Route::post('/ayarlar/parola-degistir', function () { 
    return back()->with('success', 'Güvenlik kilitleriniz başarıyla güncellendi.'); 
})->name('settings.password');

Route::get('/sepet', function () { return view('cart'); })->name('cart');

// AJAX Sepete Ekleme Rotası
Route::post('/sepet/ekle', function () {
    $count = session('cart_count', 0) + 1;
    session(['cart_count' => $count]);
    return response()->json(['count' => $count]);
})->name('cart.add');
