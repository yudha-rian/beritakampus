<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            // 1. id | BIGINT | primary key
            $table->id(); 

            // 2. name | VARCHAR
            // Catatan: Aturan "minimal 3 karakter" ditangani di Validation (Request), bukan di sini.
            $table->string('name'); 

            // 3. email | VARCHAR | harus unique
            $table->string('email')->unique(); 

            // 4. phone | VARCHAR 
            // Catatan: Aturan "hanya angka, min 10 digit" ditangani di Validation (Request).
            $table->string('phone'); 

            // 5. address | TEXT | optional
            $table->text('address')->nullable(); 

            // 6 & 7. created_at & updated_at | TIMESTAMP
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};