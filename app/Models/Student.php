<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Student extends Model
{
    use HasFactory; // <--- Aktifkan ini untuk seeding

    protected $fillable = ['name', 'nim'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}

