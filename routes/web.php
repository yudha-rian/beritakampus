<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegistrationController; 

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