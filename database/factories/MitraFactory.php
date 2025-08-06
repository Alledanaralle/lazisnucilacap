<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mitra>
 */
class MitraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'partner_name' => fake()->sentence(),
            'logo' => 'images/mitra/ZeOQHGOW0xibxMYn0AL1r2uuFre1XFguhbEALPSe.png'
        ];
    }
}
