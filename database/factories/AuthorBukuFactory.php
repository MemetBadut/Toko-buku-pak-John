<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuthorBuku>
 */
class AuthorBukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_penulis' => fake('id_ID')->name(),
            'bio_penulis' => fake('id_ID')->paragraph(),
            'foto_penulis' => fake('id_ID')->imageUrl(200, 200, 'people'),
            'slug' => fake('id_ID')->slug(),
        ];
    }
}
