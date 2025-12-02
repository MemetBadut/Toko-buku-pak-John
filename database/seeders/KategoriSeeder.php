<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('kategori_buku')->insert([
            ['kategori_buku' => "Romantis", 'created_at' => $now, 'updated_at' => $now],
            ['kategori_buku' => "Novel Lokal", 'created_at' => $now, 'updated_at' => $now],
            ['kategori_buku' => "Novel Terjemahan", 'created_at' => $now, 'updated_at' => $now],
            ['kategori_buku' => "Thriller", 'created_at' => $now, 'updated_at' => $now],
            ['kategori_buku' => "Drama", 'created_at' => $now, 'updated_at' => $now],
            ['kategori_buku' => "Comedy", 'created_at' => $now, 'updated_at' => $now],
            ['kategori_buku' => "Psycopath", 'created_at' => $now, 'updated_at' => $now],
            ['kategori_buku' => "Gore", 'created_at' => $now, 'updated_at' => $now],
            ['kategori_buku' => "Slice of life", 'created_at' => $now, 'updated_at' => $now],
            ['kategori_buku' => "Sci-Fi", 'created_at' => $now, 'updated_at' => $now],
            ['kategori_buku' => "Action", 'created_at' => $now, 'updated_at' => $now],
            ['kategori_buku' => "Fiksi", 'created_at' => $now, 'updated_at' => $now],
            ['kategori_buku' => "Non-Fiksi", 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}
