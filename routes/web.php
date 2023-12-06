<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/welcome', function () {
    return view('welcome');
});

//Data Produk
Route::get('/data_produk', [ProdukController::class, 'index']);
Route::get('/data_produk/tambah', [ProdukController::class, 'create']);
Route::post('/data_produk/store', [ProdukController::class, 'store']);
Route::get('/data_produk/edit/{id}', [ProdukController::class, 'edit']);
Route::put('/data_produk/update/{id}', [ProdukController::class, 'update']);
Route::get('/data_produk/delete/{id}', [ProdukController::class, 'delete']);
Route::get('/data_produk/destroy/{id}', [ProdukController::class, 'destroy']);
Route::get('/data_produk/search', [ProdukController::class, 'search'])->name('data_produk.search');;

//Data Sales
Route::get('/data_sales', [SalesController::class, 'index']);
Route::get('/data_sales/tambah', [SalesController::class, 'create']);
Route::post('/data_sales/store', [SalesController::class, 'store']);
Route::get('/data_sales/edit/{id}', [SalesController::class, 'edit']);
Route::put('/data_sales/update/{id}', [SalesController::class, 'update']);
Route::get('/data_sales/delete/{id}', [SalesController::class, 'delete']);
Route::get('/data_sales/destroy/{id}', [SalesController::class, 'destroy']);

//Data Transaksi
Route::get('/data_transaksi', [TransaksiController::class, 'index']);
Route::get('/data_transaksi/tambah', [TransaksiController::class, 'create']);
Route::post('/data_transaksi/store', [TransaksiController::class, 'store']);
Route::get('/data_transaksi/edit/{id}', [TransaksiController::class, 'edit']);
Route::put('/data_transaksi/update/{id}', [TransaksiController::class, 'update']);
Route::get('/data_transaksi/delete/{id}', [TransaksiController::class, 'delete']);
Route::get('/data_transaksi/destroy/{id}', [TransaksiController::class, 'destroy']);

//Peramalan
Route::get('/peramalan', function () {
    return view('peramalan.peramalan');
});

