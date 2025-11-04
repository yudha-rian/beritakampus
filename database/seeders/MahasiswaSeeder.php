<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa; // <- Import model Mahasiswa

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Perintah ini akan memanggil MahasiswaFactory
        // dan membuat 20 data mahasiswa dummy
        Mahasiswa::factory()->count(20)->create();
    }
}