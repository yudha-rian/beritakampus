<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    // Mengizinkan kolom ini diisi secara massal
    protected $fillable = [
        'name',
        'email',
        'phone',
        'event_type',
        'institution'
    ];
}
