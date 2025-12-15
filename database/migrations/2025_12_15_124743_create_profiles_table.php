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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            
            // --- INI BAGIAN PENTINGNYA (Foreign Key) ---
            // Relasi ke tabel 'users'. 
            // onDelete('cascade') artinya jika User dihapus, Profile ikut terhapus otomatis.
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
            // Data tambahan sesuai soal
            $table->text('address');      // Alamat
            $table->string('phone');      // Nomor Telepon
            $table->date('birthdate');    // Tanggal Lahir
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

