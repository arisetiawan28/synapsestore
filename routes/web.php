<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceBarangController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserRoleController;

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
// Route::resource('barang', BarangController::class);
// Route::get('/barang/create', [BarangController::class, 'create']); 
// Route::resource('kategori', KategoriController::class);
// Route::resource('keranjang', KeranjangController::class);
// Route::resource('invoice_barang', InvoiceBarangController::class);
// Route::resource('invoice', InvoiceController::class);
// Route::resource('message', MessageController::class);

Route::group(['middleware' => 'auth'], function(){
    Route::resource('barang', BarangController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('message', MessageController::class);
    Route::resource('invoice', InvoiceController::class);
    Route::resource('invoice_barang', InvoiceBarangController::class);
    Route::resource('keranjang', KeranjangController::class);
    Route::get('/barang/{id}/add_review', [BarangController::class, 'add_review']);
    Route::post('/barang/{id}/store_review', [BarangController::class, 'store_review']);
    Route::post('/barang/store_keranjang', [BarangController::class, 'store_keranjang']);
});

//hanya bisa diakses oleh user dengan level superadmin atau pedagang
Route::group(['middleware' => ['role:superadmin|pedagang']], function () {   
    Route::resource('barang', BarangController::class);
}); 

//yang bisa mengakses routes di bawah hanya user yang telah login dan memiliki tipe superadmin
Route::group(['middleware' => ['role:superadmin']], function () {
    Route::resource('permission',PermissionController::class)->except(['show', 'edit', 'update', 'create', 'destroy']);
    Route::resource('role',RoleController::class)->except(['show', 'edit', 'update', 'create', 'destroy']);
    Route::resource('user_role',UserRoleController::class)->except(['show', 'create', 'store', 'destroy']);
    Route::resource('barang', BarangController::class);

    //ini adalah function menghapus message, yang hanya bisa diakses oleh 'superadmin'
    Route::delete('/message/{id}', [MessageController::class, 'destroy']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
