<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Booking;
use App\Models\User;

class ApprovalFactory extends Factory
{
    protected $model = \App\Models\Approval::class;

    public function definition(): array
    {
        return [
            'booking_id' => Booking::inRandomOrder()->first()->id_booking,
            'approver' => User::inRandomOrder()->first()->id_user,
            'level' => $this->faker->numberBetween(1,2),
            'status' => $this->faker->numberBetween(1,3),
        ];
    }
}