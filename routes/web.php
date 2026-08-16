<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/arama', [ProductController::class, 'search'])->name('products.search');

// Sepet & Sipariş (Checkout) Rotaları
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/siparis-basarili/{orderNumber}', [CheckoutController::class, 'success'])->name('order.success');
