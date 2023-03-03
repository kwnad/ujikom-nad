<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\WarnaController;
use App\Http\Controllers\GambarController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\BahanProdukController;
use App\Http\Controllers\WarnaProdukController;

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
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/detailproduk/{produk}', [FrontController::class, 'produkdetail']);Route::resource('warna',WarnaController::class);
Route::resource('produk',ProdukController::class);
Route::resource('pesanan', PesananController::class);
Route::resource('bahan', BahanController::class);
Route::resource('warnaproduk', WarnaProdukController::class);
Route::resource('bahanproduk', BahanProdukController::class);
Route::resource('/gambar', GambarController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\FrontController::class, 'produkuser']);

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    route::get('/dashboard', function () {
        return view('admin.layouts.admin');
    });
    Route::resource('/produk', ProdukController::class);
    Route::resource('/warna', WarnaController::class);
    Route::resource('/bahan', BahanController::class);
    Route::resource('/gambar', GambarController::class);
    Route::resource('/warnaProduk', WarnaProdukController::class);
    Route::resource('/bahanProduk', BahanProdukController::class);
    Route::resource('/pesanan', PesananController::class);

});

Route::prefix('customer')->middleware(['auth', 'customer'])->group(function () {
    Route::get('/', function () {
    });
});
