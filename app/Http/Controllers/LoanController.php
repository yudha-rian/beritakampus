<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoanController extends Controller
{
    // 1. Tampilkan Form Peminjaman
    public function create()
    {
        // Ambil data user untuk dropdown
        $users = User::all();
        
        // Ambil data buku yang stoknya masih ada (> 0)
        $books = Book::where('stock', '>', 0)->get();

        return view('loans.create', compact('users', 'books'));
    }

    // 2. Simpan Data Peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);

        // Cek stok lagi untuk keamanan
        $book = Book::findOrFail($request->book_id);
        if ($book->stock < 1) {
            return back()->with('error', 'Stok buku habis!');
        }

        // a. Buat data peminjaman
        Loan::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'loan_date' => Carbon::now(), // Tanggal hari ini
            'return_date' => null,        // Belum dikembalikan
        ]);

        // b. Kurangi stok buku
        $book->decrement('stock');

        return redirect()->route('books.index')->with('success', 'Buku berhasil dipinjam!');
    }

    // 3. Proses Pengembalian Buku
    public function returnBook($id)
    {
        $loan = Loan::findOrFail($id);

        // Update tanggal kembali jadi hari ini
        $loan->update([
            'return_date' => Carbon::now()
        ]);

        // Kembalikan stok buku
        $loan->book->increment('stock');

        return back()->with('success', 'Buku berhasil dikembalikan!');
    }
}