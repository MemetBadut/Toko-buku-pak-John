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
            $table->string('nama_penulis');
            $table->foreignId('kategori_buku')->constrained()->onDelete('cascade');
            $table->float('rating_buku');
            $table->string('slug')->unique();
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
