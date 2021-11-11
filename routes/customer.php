<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CustomersController;

// Auth

Route::get('login', [CustomersController::class, 'login']);
Route::post('login/store', [CustomersController::class, 'store']);
Route::get('register', [CustomersController::class, 'register']);
Route::middleware('auth:customer')->group(function() {
    Route::get('profile', [CustomersController::class, 'profile'])->name('profile');
});
