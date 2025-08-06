<?php

namespace Database\Factories;

use App\Models\visi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visi>
 */
class VisiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'visi' => fake()->paragraph(),
            'order' => $this->faker->unique()->numberBetween(0, 9),


        ];
    }
}
