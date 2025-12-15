<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * 1. Halaman Daftar Buku
     * Soal: Tampilkan nama, kategori, dan jumlah peminjaman via accessor/count
     */
    public function index()
    {
        // Eager loading 'categories' agar query hemat
        // withCount('loans') otomatis menghitung jumlah relasi loans
        $books = Book::with('categories')->withCount('loans')->get();

        return view('books.index', compact('books'));
    }

    /**
     * 2. Form Tambah Buku
     * Soal: Form input Buku beserta kategorinya (multi-select)
     */
    public function create()
    {
        // Kita butuh data kategori untuk ditampilkan di checkbox/select
        $categories = Category::all();
        
        return view('books.create', compact('categories'));
    }

    /**
     * 3. Proses Simpan ke Database
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'stock' => 'required|integer',
            'category_ids' => 'required|array', // Wajib array karena multi-select
            'category_ids.*' => 'exists:categories,id', // Pastikan ID kategori valid
        ]);

        // a. Simpan data Buku
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'stock' => $request->stock,
        ]);

        // b. Sambungkan Buku dengan Kategori (Relasi N-N)
        // method attach() digunakan untuk mengisi tabel pivot (book_category)
        $book->categories()->attach($request->category_ids);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * 4. Halaman Detail Buku
     * Soal: Tampilkan seluruh peminjam (eager loading)
     */
    public function show($id)
    {
        // Ambil buku beserta relasi loans dan user si peminjamnya
        $book = Book::with(['loans.user', 'categories'])->findOrFail($id);

        return view('books.show', compact('book'));
    }

    /**
     * Menghapus Buku
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        
        // Hapus buku
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
} 