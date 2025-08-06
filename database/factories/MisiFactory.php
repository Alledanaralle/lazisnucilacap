<?php

namespace Database\Factories;

use App\Models\misi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Misi>
 */
class MisiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'misi' => fake()->paragraph(),
            'order' => $this->faker->unique()->numberBetween(0, 9),


        ];
    }
}
