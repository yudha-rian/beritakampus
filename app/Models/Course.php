<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // <--- WAJIB DITAMBAHKAN

class Course extends Model
{
    use HasFactory; // <--- Aktifkan ini untuk seeding

    protected $fillable = ['course_name', 'code'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}