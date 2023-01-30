<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\WarnaController;
use App\Http\Controllers\WarnaProdukController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    route::get('/dashboard', function () {
        return view('admin.layouts.admin');
    });
    Route::resource('/produk', ProdukController::class);
    Route::resource('/warna', WarnaController::class);
    Route::resource('/warnaProduk', WarnaProdukController::class);
    Route::resource('/pesanan', PesananController::class);

});
