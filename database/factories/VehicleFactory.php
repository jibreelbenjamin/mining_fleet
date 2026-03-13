<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = \App\Models\Vehicle::class;

    public function definition(): array
    {
        return [
            'nama_kendaraan' => $this->faker->word().' Car',
            'jenis_kendaraan' => $this->faker->randomElement(['Sedan','SUV','Truck','Van']),
            'plat_nomor' => strtoupper($this->faker->bothify('??###??')),
            'status' => $this->faker->numberBetween(1,4),
        ];
    }
}