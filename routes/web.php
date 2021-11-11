<?php

use App\Http\Controllers\Client\CustomersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductsController as ProductsClient;
use App\Http\Controllers\Client\CartController;

require __DIR__ . '/customer.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('dashboard/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('dashboard/login/store', [LoginController::class, 'postLogin']);
Route::get('dashboard/logout', [LoginController::class, 'getLogout'])->name('logout');


Route::middleware('auth')->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        # Categories
        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoriesController::class, 'index'])->name('dashboard.categories');
            Route::get('edit/{category}', [CategoriesController::class, 'show']);
            Route::post('edit/{category}', [CategoriesController::class, 'update']);
            Route::get('add', [CategoriesController::class, 'create']);
            Route::post('store', [CategoriesController::class, 'store']);
            Route::delete('destroy', [CategoriesController::class, 'destroy'])->name('dashboard.destroy');
        });

        # Products
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductsController::class, 'index'])->name('dashboard.products');
            Route::get('add', [ProductsController::class, 'create']);
            Route::post('store', [ProductsController::class, 'store']);
            Route::get('edit/{product}', [ProductsController::class, 'show']);
            Route::post('edit/{product}', [ProductsController::class, 'update']);
            Route::delete('destroy', [ProductsController::class, 'destroy'])->name('product.destroy');
        });

        # Upload
        Route::post('upload/services', [UploadController::class, 'store']);
    });
});


/*
|--------------------------------------------------------------------------
| CLIENT
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::prefix('products')->group(function () {
    Route::get('/', [ProductsClient::class, 'index'])->name('products');
    Route::get('{slug}', [ProductsClient::class, 'show']);
    Route::get('add-to-cart/{id}', [CartController::class, 'add'])->name('addToCart');
});



// Auth
