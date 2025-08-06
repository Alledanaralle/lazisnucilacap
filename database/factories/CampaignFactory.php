<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'goal' => fake()->numberBetween(7000000, 10000000),
            'raised' => 0,
            'id_kategori' => fake()->randomElement([
                1,2,3,4,5,6,7
            ]),
            'start_date' => fake()->dateTimeBetween('-3 month', 'now'),
            'end_date' => fake()->dateTimeBetween('+3 month', '+6 month'),
            'min_donation' => fake()->numberBetween(5000, 10000),
            'lokasi' => fake()->city(),
            'main_picture' => '2lNcAJLKMgQSJpdbEPL72LN3EwvAlEDqkFGjglKb.png',
            'second_picture' => '2lNcAJLKMgQSJpdbEPL72LN3EwvAlEDqkFGjglKb.png',
            'last_picture' => '2lNcAJLKMgQSJpdbEPL72LN3EwvAlEDqkFGjglKb.png',

        ];
    }
}
