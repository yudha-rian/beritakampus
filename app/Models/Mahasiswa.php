<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    /**
     * Nama tabel database yang terkait dengan model ini.
     *
     * @var string
     */
    protected $table = 'mahasiswa';

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'email',
        'jenis_kelamin',
        'tanggal_lahir',
        'angkatan',
        'ipk_terakhir',
        'status',
    ];
}