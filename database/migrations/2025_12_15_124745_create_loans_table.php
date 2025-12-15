<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_create_loans_table.php
public function up()
{
    Schema::create('loans', function (Blueprint $table) {
        $table->id();
        // Siapa yang meminjam
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        // Buku apa yang dipinjam
        $table->foreignId('book_id')->constrained()->onDelete('cascade');
        $table->date('loan_date');
        $table->date('return_date')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
