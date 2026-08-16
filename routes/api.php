<?php

use App\Http\Controllers\Api\FitmentCheckController;
use App\Http\Controllers\Api\ProductSearchController;
use App\Http\Controllers\Api\VehicleLookupController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Araç Seçim Kaskatı
    Route::get('/vehicles/makes', [VehicleLookupController::class, 'makes']);
    Route::get('/vehicles/makes/{make}/models', [VehicleLookupController::class, 'models']);
    Route::get('/vehicles/makes/{make}/models/{model}/variants', [VehicleLookupController::class, 'vehicles']);

    // Anlık Uyumluluk Kontrolü
    Route::post('/products/{product}/check-fitment', [FitmentCheckController::class, 'check']);

    // Arama Endpoint'i
    Route::get('/products/search', ProductSearchController::class);
});
