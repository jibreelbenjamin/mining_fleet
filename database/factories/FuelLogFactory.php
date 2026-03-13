<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Booking;

class FuelLogFactory extends Factory
{
    protected $model = \App\Models\FuelLog::class;

    public function definition(): array
    {
        $liter = $this->faker->randomFloat(2, 10, 100);
        $harga = $this->faker->randomFloat(2, 12000, 20000);

        return [
            'booking_id' => Booking::inRandomOrder()->first()->id_booking,
            'liter' => $liter,
            'harga_per_liter' => $harga,
            'total' => $liter * $harga,
            'tanggal' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}