<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa; // <- Import Model

class MahasiswaController extends Controller
{
    /**
     * Menampilkan halaman utama dengan daftar mahasiswa.
     */
    public function index()
    {
        // 1. Ambil data mahasiswa dari database
        // Kita ambil yang statusnya aktif (true) dan urutkan berdasarkan Nama A-Z
        $daftar_mahasiswa = Mahasiswa::where('status', true)
                                     ->orderBy('nama_mahasiswa', 'asc')
                                     ->get();

        // 2. Kirim data tersebut ke View
        return view('halamanUtama', [
            'mahasiswaList' => $daftar_mahasiswa
        ]);
        
        // Catatan: 'halaman_utama' adalah nama file view (langkah C)
        // 'mahasiswaList' adalah nama variabel yang akan dipakai di view
    }
}