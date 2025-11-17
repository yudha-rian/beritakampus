<?php
// app/Http/Controllers/CustomerController.php

namespace App\Http\Controllers;

use App\Models\Customer;    // Impor model Customer
use Illuminate\Http\Request; // Impor class Request

class CustomerController extends Controller
{
    /**
     * Menampilkan halaman form untuk menambah data pelanggan.
     */
    public function create()
    {
        // Mengarahkan ke file view: resources/views/customers/create.blade.php
        return view('customers.create');
    }

    /**
     * Menyimpan data pelanggan baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk
        $validatedData = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|string|email|max:255|unique:customers',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        // 2. Simpan data ke database menggunakan model Customer
        // Ini bisa berjalan karena kita sudah mengatur $fillable di Model
        Customer::create($validatedData);

        // 3. Kembali ke halaman form dengan pesan sukses
        return redirect()->route('customers.create')
                         ->with('success', 'Data pelanggan berhasil ditambahkan!');
    }
}
