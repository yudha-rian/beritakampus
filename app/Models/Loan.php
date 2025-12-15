<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    // TAMBAHKAN BAGIAN INI:
    protected $fillable = [
        'user_id', 
        'book_id', 
        'loan_date', 
        'return_date'
    ];

    // Relasi ke User (Peminjam)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Buku (Yang dipinjam)
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}