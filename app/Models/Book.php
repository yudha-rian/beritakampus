<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // TAMBAHKAN BAGIAN INI:
    // Mendaftarkan kolom yang boleh diisi lewat form (create/update)
    protected $fillable = ['title', 'author', 'stock'];

    // Relasi ke Kategori
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Relasi ke Peminjaman
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}

