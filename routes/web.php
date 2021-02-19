<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceBarangController;

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

Route::get('/home/halo', [HomeController::class, 'halo']);
Route::resource('barang', BarangController::class);
// Route::get('/barang/create', [BarangController::class, 'create']); 
Route::resource('kategori', KategoriController::class);
Route::resource('keranjang', KeranjangController::class);
Route::resource('invoice_barang', InvoiceBarangController::class);
Route::resource('invoice', InvoiceController::class);