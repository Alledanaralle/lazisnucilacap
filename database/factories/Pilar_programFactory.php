<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pilar_program>
 */
class Pilar_programFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_kategori' => fake()->randomElement([
                1,
                2,
                3,
                4,
                5,
                6,
            ]),
            'nama' => fake()->sentence(),
            'slug' => fake()->sentence(),
            'deskripsi' => fake()->paragraph(),
            'img' => 'images/pilar/ZeOQHGOW0xibxMYn0AL1r2uuFre1XFguhbEALPSe.png',
        ];
    }
}
