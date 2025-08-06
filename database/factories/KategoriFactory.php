<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kategori' => fake()->unique()->randomElement([
                'Bencana Alam',
                'Pendidikan',
                'Sosial & Keagamaan',
                'Ekonomi',
                'Ramadhan',
                'Kesehatan',
                'Laporan & Publikasi',
            ]),
            'image' => '49wlvjTyIrjc3OJICTVbkuHCnmAJD3JK72TILkK9.png',
        ];
    }
}
