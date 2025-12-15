<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // <--- WAJIB DITAMBAHKAN

class Comment extends Model
{
    use HasFactory; // <--- Penting agar seeder bisa jalan

    protected $fillable = ['post_id', 'user_id', 'comment_text'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}