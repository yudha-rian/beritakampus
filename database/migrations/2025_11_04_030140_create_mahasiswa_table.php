<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id(); // Kunci utama (primary key) auto-increment
            
            // Kolom sesuai permintaan
            $table->string('nim', 12)->unique();
            $table->string('nama_mahasiswa', 100);
            $table->string('email', 100)->unique();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->year('angkatan');
            $table->decimal('ipk_terakhir', 3, 2); // Total 3 digit, 2 di belakang koma
            $table->boolean('status')->default(true); // Default-nya aktif (true)
            
            // (Tugas 3) Kolom timestamps (created_at dan updated_at)
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};