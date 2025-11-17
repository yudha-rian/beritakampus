<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CampusController;
//use App\Http\Controllers\BeritaController;
//use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CustomerController;

// Route::get('/', [CampusController::class, 'home']); 

//Route::get('/', [MahasiswaController::class, 'index']);


//Route::get('/pengumuman', [CampusController::class, 'pengumuman']);
//Route::get('/dosen', [CampusController::class, 'dosen']);
//Route::get('/kontak', [CampusController::class, 'kontak']);
//Route::get('/berita', [BeritaController::class, 'index']);

Route::get('/products/{filter?}', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/detail/{id}', [ProductController::class, 'detail'])->name('products.detail');

//Route::view('/admin/dashboard', 'admin.dashboard');


// Rute untuk MENAMPILKAN form tambah pelanggan (method GET)
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');

// Rute untuk MENYIMPAN data dari form (method POST)
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');