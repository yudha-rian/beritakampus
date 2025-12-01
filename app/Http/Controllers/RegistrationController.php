<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration; // Jangan lupa import Model ini

class RegistrationController extends Controller
{
    // 1. Menampilkan daftar peserta (Index)
    public function index()
    {
        // Mengambil data terbaru (latest) agar yang baru daftar ada di atas
        $registrations = Registration::latest()->get();
        
        return view('registrations.index', compact('registrations'));
    }

    // 2. Menampilkan Form Pendaftaran (Create)
    public function create()
    {
        return view('registrations.create');
    }

    // 3. Menyimpan data ke database (Store)
    public function store(Request $request)
    {
        // Validasi Input (Short Validation)
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'event_type' => 'required|in:webinar,workshop,training', // Hanya boleh memilih salah satu dari ini
            'institution' => 'nullable|string' // Opsional
        ]);

        // Simpan ke database
        Registration::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('registrations.index')
                         ->with('success', 'Pendaftaran berhasil! Terima kasih telah mendaftar.');
    }
}