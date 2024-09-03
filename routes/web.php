<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Middleware\IsAdmin;
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

// Route::get('/tes', function () {
//     return view('layouts.front');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Admin(Backend)
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    //untuk Route Backend lainnya
    Route::resource('user', App\Http\Controllers\UsersController::class);
    Route::resource('barang', App\Http\Controllers\barangController::class);
    Route::resource('barangmasuk', App\Http\Controllers\BarangMasukController::class);
    Route::resource('barangkeluar', App\Http\Controllers\BarangKeluarController::class);
    Route::resource('pinjaman', App\Http\Controllers\PinjamanController::class);
    Route::resource('pengembalian', App\Http\Controllers\PengembalianController::class);
});

//Route Frontend
Route::get('/', [FrontController::class, 'index']);
Route::get('contact', [FrontController::class, 'contact']);
Route::get('shop', [FrontController::class, 'shop']);
Route::get('cart', [FrontController::class, 'cart']);
Route::get('checkout', [FrontController::class, 'checkout']);
Route::get('track', [FrontController::class, 'track']);
Route::get('detail', [FrontController::class, 'detail']);
Route::get('about', [FrontController::class, 'about']);

