<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // TAMBAHKAN INI AGAR DATA PROFIL BISA DISIMPAN:
    protected $fillable = ['user_id', 'address', 'phone', 'birthdate'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}