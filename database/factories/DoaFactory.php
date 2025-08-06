<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doa>
 */
class DoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doa' => fake()->paragraph(),
            'jumlah_likes' => 0,
            'id_campaign' => fake()->numberBetween(1, 50),
        ];
    }
}
