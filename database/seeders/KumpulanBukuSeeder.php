<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KumpulanBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('kumpulan_buku')->insert([
            'nama_buku' => "Toko Obat Cinta Keluarga Botero",
            'nama_penulis' => "Lee Sun-Young",
            'kategori_buku' => "Novel Terjemahan",
            'rating_buku' => 4.5,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        DB::table('kumpulan_buku')->insert([
            'nama_buku' => "Under Baswaras's Feet",
            'nama_penulis' => "Aninda Wb",
            'kategori_buku' => "Novel Lokal",
            'rating_buku' => 4.9,
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}
