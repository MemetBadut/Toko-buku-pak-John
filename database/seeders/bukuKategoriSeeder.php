<?php

namespace Database\Seeders;

use App\Models\kategoriBuku;
use App\Models\produkBuku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bukuKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buku = ProdukBuku::all();
        $kategori = KategoriBuku::pluck('id')->toArray();

        foreach ($buku as $b){
            $b->kategoriBuku()->attach(array_rand(array_flip($kategori), rand(5,5)));
        }
    }
}
