<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    protected $model = \App\Models\Driver::class;

    public function definition(): array
    {
        return [
            'nama_driver' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['L','P']),
            'alamat' => $this->faker->address(),
            'telepon' => $this->faker->phoneNumber(),
        ];
    }
}