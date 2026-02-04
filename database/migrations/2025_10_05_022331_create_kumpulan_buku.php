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
        Schema::create('kumpulan_buku', function (Blueprint $table) {
            $table->id();
            $table->string('nama_buku');
            $table->foreignId('author_id')->constrained('author_bukus')->onDelete('cascade');
            $table->float('rating_buku');
            $table->string('slug')->unique();
            $table->string('isbn', 20);
            $table->integer('halaman_buku');
            $table->string('tanggal_publish');
            $table->longText('sinopsis');
            $table->foreignId('publisher_id')->constrained('publisher')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kumpulan_buku');
    }
};
