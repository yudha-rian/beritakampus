<?php

namespace App\Http\Controllers;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = [
            [
                'judul' => 'Pelatihan Laravel untuk Mahasiswa',
                'tanggal' => '15 Oktober 2025',
                'gambar' => '/images/Gedung3UTDI.jpeg',
                'isi' => 'Pelatihan dasar Laravel untuk mahasiswa semester 5 dilaksanakan di lab pemrograman.'
            ],
        ];

        return view('berita', ['berita' => $berita]);
    }
}