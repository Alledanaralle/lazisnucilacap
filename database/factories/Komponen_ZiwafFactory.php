<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class Komponen_ZiwafFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'harga_emas' => fake()->numberBetween(100000, 1000000),
            'nisab' => fake()->numberBetween(100000, 1000000),
            'nisab_kg' => fake()->numberBetween(100000, 1000000),
            'fidyah' => fake()->numberBetween(100000, 1000000),
        ];
    }
}
