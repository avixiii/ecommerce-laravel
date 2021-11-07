<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;

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

        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoriesController::class, 'index'])->name('dashboard.categories');
            Route::get('edit/{category}', [CategoriesController::class, 'show']);
            Route::post('edit/{category}', [CategoriesController::class, 'update']);
            Route::get('add', [CategoriesController::class, 'create']);
            Route::post('store', [CategoriesController::class, 'store']);
            Route::delete('destroy', [CategoriesController::class, 'destroy'])->name('dashboard.destroy');
        });
    });
});


/*
|--------------------------------------------------------------------------
| CLIENT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return 'HOME PAGE';
});
