<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gambar_landing>
 */
class Gambar_landingFactory extends Factory
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
            ]),
            'link' => fake()->randomElement([
                'http://127.0.0.1:8000/campaigns',
                'http://127.0.0.1:8000/berita',
                'http://127.0.0.1:8000/zakat',
                'http://127.0.0.1:8000/profil&jajaran',
            ]),
        ];
    }
}
