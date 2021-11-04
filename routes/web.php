<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('admin/login',[LoginController::class, 'getLogin'])->name('login');
Route::post('admin/login/store', [LoginController::class, 'postLogin']);
Route::get('admin/logout', [LoginController::class, 'getLogout']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', [DashboardController::class, 'index']);
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
