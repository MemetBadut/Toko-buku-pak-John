<?php

namespace Database\Seeders;

use App\Models\ProdukBuku;
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
        // $now = now();

        // DB::table('kumpulan_buku')->insert([
        //     'nama_buku' => "Toko Obat Cinta Keluarga Botero",
        //     'nama_penulis' => "Lee Sun-Young",
        //     'rating_buku' => 4.5,
        //     'slug' => fake()->slug(),
        //     'isbn' => fake()->isbn13(),
        //     'sinopsis' => fake()->sentence(),
        //     'publisher' => fake()->firstName() . '' . fake()->lastName(),
        //     'created_at' => $now,
        //     'updated_at' => $now
        // ]);

        // DB::table('kumpulan_buku')->insert([
        //     'nama_buku' => "Under Baswaras's Feet",
        //     'nama_penulis' => "Aninda Wb",
        //     'rating_buku' => 4.9,
        //     'slug' => fake()->slug(),
        //     'isbn' => fake()->isbn13(),
        //     'sinopsis' => fake()->sentence(),
        //     'publisher' => fake()->firstName() . '' . fake()->lastName(),
        //     'created_at' => $now,
        //     'updated_at' => $now
        // ]);

        ProdukBuku::factory()->count(10)->create();
    }
}
