<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehicle;

class VehicleServiceFactory extends Factory
{
    protected $model = \App\Models\VehicleService::class;

    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::inRandomOrder()->first()->id_vehicle,
            'service_date' => $this->faker->dateTimeBetween('-2 months', '+2 months'),
            'keterangan' => $this->faker->sentence(),
            'cost' => $this->faker->randomFloat(2, 50000, 500000),
            'status' => $this->faker->numberBetween(1,3),
            'created_at' => now(),
        ];
    }
}