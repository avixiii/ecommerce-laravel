<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CustomersController;

// Auth

Route::post('login', [CustomersController::class, 'login'])->name('loginCustomer');
Route::post('register', [CustomersController::class, 'register'])->name('registerCustomer');
Route::get('logout', [CustomersController::class, 'logout']);
Route::middleware('auth:customer')->group(function() {
    Route::prefix('profile')->group(function () {
        Route::get('/',  [CustomersController::class, 'profile'])->name('profile');
        Route::post('/update', [CustomersController::class, 'update'])->name('profile.update');
    });
});
