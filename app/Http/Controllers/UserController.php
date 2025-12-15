<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 1. Form Tambah Anggota
    public function create()
    {
        return view('users.create');
    }

    // 2. Simpan Data (User + Profile)
    public function store(Request $request)
    {
        // Validasi input gabungan (User & Profile)
        $request->validate([
            // Data User
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            // Data Profile
            'address' => 'required',
            'phone' => 'required',
            'birthdate' => 'required|date',
        ]);

        // A. Simpan ke tabel Users
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // B. Simpan ke tabel Profiles (Relasi 1-1)
        // Kita gunakan method 'profile()' yang ada di model User
        $user->profile()->create([
            'address' => $request->address,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
        ]);

        return redirect()->route('books.index')->with('success', 'Anggota baru berhasil didaftarkan!');
    }
}