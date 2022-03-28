<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanpenjualanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PesananDetailController;
use App\Http\Controllers\BackendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });




Auth::routes();


Route::get('pesan/{id}', [PesanController::class, 'index']);
Route::post('pesan/{id}', [PesanController::class, 'pesan']);
Route::get('check-out', [PesanController::class, 'check_out']);
Route::delete('check-out/{id}', [PesanController::class, 'delete']);
Route::get('konfirmasi-check-out', [PesanController::class, 'konfirmasi']);
Route::get('history', [HistoryController::class, 'index']);
Route::get('history/{id}', [HistoryController::class, 'detail']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', 'App\Http\Controllers\FrontendController@index', function () {
    return view('frontend.index');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::resource('kategori', KategoriController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('laporanpenjualan', laporanPenjualanController::class);
    Route::get('pesan2', [BackendController::class, 'index']);
    Route::resource('pesanan_detail', PesananDetailController::class);
});
