<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CampusController;
//use App\Http\Controllers\BeritaController;
//use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;


use App\Http\Controllers\RegistrationController; 
// ----------------------------------------------------

// Route::get('/', [CampusController::class, 'home']); 
//Route::get('/', [MahasiswaController::class, 'index']);

//Route::get('/pengumuman', [CampusController::class, 'pengumuman']);
//Route::get('/dosen', [CampusController::class, 'dosen']);
//Route::get('/kontak', [CampusController::class, 'kontak']);
//Route::get('/berita', [BeritaController::class, 'index']);

Route::get('/products/{filter?}', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/detail/{id}', [ProductController::class, 'detail'])->name('products.detail');

//Route::view('/admin/dashboard', 'admin.dashboard');

Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');

Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');



// 1. Halaman Depan (Menampilkan daftar peserta)
Route::get('/', [RegistrationController::class, 'index'])->name('registrations.index');

// 2. Halaman Form Pendaftaran (Menampilkan form)
Route::get('/register', [RegistrationController::class, 'create'])->name('registrations.create');

// 3. Proses Simpan Data (Menerima input dari form)
Route::post('/register', [RegistrationController::class, 'store'])->name('registrations.store');

// -------------------------------------------------------------