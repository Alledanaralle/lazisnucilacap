<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\gambar_landing>
 */
class LandingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gambar' => fake()->randomElement([
                'images/gambar_landing/3e5gBovJoWiAmPb8Bl7DMNwLtuu9ucDQWkqJuRXR.png',
                'images/gambar_landing/FaIB5VVytZUXFCLebeJmw6gDkeHBdIrLlDt9fV0m.jpg',
                'images/gambar_landing/LQmxdLwhuDo0ph9gG9KyrqhEiEI3Z0fmClQfSxth.png',
            ]),
        ];
    }
}
