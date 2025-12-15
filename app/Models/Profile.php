<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // <--- INI YANG WAJIB ADA

class Profile extends Model
{
    use HasFactory; // Aktifkan ini agar bisa di-seed

    protected $fillable = ['user_id', 'address', 'phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}