<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // $this->faker->... adalah fungsi dari library Faker
            'nim' => $this->faker->unique()->numerify('12########'), // 10-12 digit unik
            'nama_mahasiswa' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'tanggal_lahir' => $this->faker->date(),
            'angkatan' => $this->faker->numberBetween(2018, 2023), // Angkatan 2018 s/d 2023
            'ipk_terakhir' => $this->faker->randomFloat(2, 2.75, 4.00), // IPK antara 2.75 - 4.00
            'status' => $this->faker->boolean(90), // 90% kemungkinan statusnya true (aktif)
        ];
    }
}