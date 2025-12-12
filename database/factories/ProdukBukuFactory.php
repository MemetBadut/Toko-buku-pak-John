<?php

namespace Database\Factories;

use App\Models\KategoriBuku;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProdukBuku>
 */
class ProdukBukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nama_buku = fake()->sentence();

        return [
            'nama_buku' => $nama_buku,
            'nama_penulis' => fake('id_ID')->firstName() . ' ' . fake('id_ID')->lastName(),
            'rating_buku' => fake()->randomFloat(1, 1, 5),
            'slug' => \Illuminate\Support\Str::slug($nama_buku),
            'isbn' => fake()->isbn13(),
            'halaman_buku' => fake()->randomNumber(3),
            'tanggal_publish' => fake()->date('d F Y'),
            'sinopsis' => fake()->paragraph(1),
            'publisher' => fake('id_ID')->company(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
