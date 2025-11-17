<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_customers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            // Sesuai permintaan: id bigIncrements
            $table->id(); 

            // Sesuai permintaan: name, email, phone (string), address (text)
            $table->string('name');
            $table->string('email')->unique(); // Email sebaiknya unik
            $table->string('phone')->nullable(); // Kita buat boleh null
            $table->text('address')->nullable(); // Kita buat boleh null

            // Ini adalah standar Laravel (kolom created_at dan updated_at)
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
