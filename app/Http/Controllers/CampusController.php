<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class CampusController extends Controller
{
public function home()
{
$judul = "Beranda";
$welcome = "Selamat Datang di Sistem Informasi Kampus";
return view('home', compact('judul', 'welcome'));
}
public function pengumuman()
{
$judul = "Pengumuman Kampus";
$pengumuman = [
['judul' => 'Ujian Tengah Semester', 'tanggal' => '20 Oktober
2025', 'status' => 'Aktif'],
['judul' => 'Libur Nasional', 'tanggal' => '1 November 2025',
'status' => 'Tidak Aktif'],
['judul' => 'Workshop Laravel', 'tanggal' => '10 November
2025', 'status' => 'Aktif']
];
return view('pengumuman', compact('judul', 'pengumuman'));
}
public function dosen()
{
$judul = "Profil Dosen";
$dosen = [
'nama' => 'Ir. Budi Santoso, M.T.',
'nidn' => '0123456789',
'email' => 'budi@kampus.ac.id',
'alamat' => ''
];
return view('dosen', compact('judul', 'dosen'));
}
public function kontak()
{
$judul = "Kontak Kami";
return view('kontak', compact('judul'));
}
}