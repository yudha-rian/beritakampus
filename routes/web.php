<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegistrationController; 
use App\Http\Controllers\DemoController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
// ----------------------------------------------------


Route::resource('customers', CustomerController::class);


Route::get('/', function () {
    return redirect()->route('customers.index');
});

// -------------------------

Route::get('/products/{filter?}', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/detail/{id}', [ProductController::class, 'detail'])->name('products.detail');


Route::get('/register', [RegistrationController::class, 'create'])->name('registrations.create');
Route::post('/register', [RegistrationController::class, 'store'])->name('registrations.store');

Route::get('/user/{id}', [DemoController::class, 'showUser']);
Route::get('/post/{id}', [DemoController::class, 'showPost']);
Route::get('/student/{id}', [DemoController::class, 'showStudent']);

Route::post('/student/{id}/attach-course', [DemoController::class,
'attachCourse'])->name('student.attach');
Route::post('/student/{id}/detach-course/{courseId}', [DemoController::class,
'detachCourse'])->name('student.detach');

//Tugas
Route::get('/', function () {
    return redirect('/books'); // Redirect halaman awal ke daftar buku
});

// Route CRUD Buku
Route::resource('books', BookController::class);

// Route Form Peminjaman
Route::get('/loans/create', [LoanController::class, 'create'])->name('loans.create');
Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');

// Route Kembalikan Buku (Update return_date)
Route::post('/loans/{id}/return', [LoanController::class, 'returnBook'])->name('loans.return');

// Route Form Tambah Anggota
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');