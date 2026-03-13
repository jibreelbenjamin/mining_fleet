<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Driver;
use App\Models\Vehicle;

class BookingFactory extends Factory
{
    protected $model = \App\Models\Booking::class;

    public function definition(): array
    {
        return [
            'requested_by' => User::inRandomOrder()->first()->id_user,
            'vehicle_id' => Vehicle::inRandomOrder()->first()->id_vehicle,
            'driver_id' => Driver::inRandomOrder()->first()->id_driver,
            'tujuan' => $this->faker->city(),
            'tanggal_mulai' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'tanggal_selesai' => $this->faker->dateTimeBetween('+1 day', '+2 months'),
            'status' => $this->faker->numberBetween(1,4),
        ];
    }
}