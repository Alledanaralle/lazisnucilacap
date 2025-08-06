<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_berita' => fake()->sentence(),
            'description' => fake()->paragraph(5),
            'tanggal' => fake()->dateTimeBetween('-3 month', 'now'),
            'picture' => 'images/berita/1PfQkLJrx3r5qzFTa4hwUVNzYgQOX00XA2xUOsx6.png',
            'id_kategori' => fake()->randomElement([
                1,2,3,4,5,6,
            ]),
        ];
    }
}
