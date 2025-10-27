<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class InfoController extends Controller
{
 public function home()
 {
 $title = "Halaman Utama";
 $info = [
 "Laravel adalah framework PHP modern yang efisien.",
 "Blade Template memudahkan pengelolaan tampilan.",
 "Struktur MVC membantu kode menjadi modular."
 ];
 return view('home', compact('title', 'info'));
 }
 public function about()
 {
 return view('about', ['title' => 'Tentang Kami']);
 }
 public function contact()
 {
 return view('contact', ['title' => 'Kontak']);
 }
}
