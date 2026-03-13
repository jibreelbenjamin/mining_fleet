<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\Approval;
use App\Models\FuelLog;
use App\Models\VehicleService;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // Variabel jumlah data
        // =========================
        $users = 50;
        $drivers = 500;
        $vehicles = 1000;
        $bookings = 7500;
        $fuelLogsPerBooking = 7;
        $vehicleServices = 25;

        // =========================
        // Master Data
        // =========================
        User::factory($users)->create();
        Driver::factory($drivers)->create();
        Vehicle::factory($vehicles)->create();

        // =========================
        // Booking + Approval Logic
        // =========================
        for ($i = 0; $i < $bookings; $i++) {

            $booking = Booking::factory()->create([
                'status' => 1 // default pending
            ]);

            // =====================
            // Level 1 Approval
            // =====================
            $level1Status = collect([1,2,3])->random();

            Approval::create([
                'booking_id' => $booking->id_booking,
                'approver' => User::inRandomOrder()->first()->id_user,
                'level' => 1,
                'status' => $level1Status
            ]);

            // =====================
            // Level 2 Logic
            // =====================
            if ($level1Status == 1) {

                $level2Status = 1;
                $bookingStatus = 1;

            } elseif ($level1Status == 3) {

                $level2Status = 3;
                $bookingStatus = 3;

            } else {

                $level2Status = collect([1,2,3])->random();

                if ($level2Status == 2) {

                    // jika semua approve
                    $bookingStatus = collect([2,4])->random();
                    // 2 = approved
                    // 4 = completed

                } elseif ($level2Status == 3) {

                    $bookingStatus = 3;

                } else {

                    $bookingStatus = 1;

                }
            }

            Approval::create([
                'booking_id' => $booking->id_booking,
                'approver' => User::inRandomOrder()->first()->id_user,
                'level' => 2,
                'status' => $level2Status
            ]);

            $booking->update([
                'status' => $bookingStatus
            ]);

            // =====================
            // Fuel Logs
            // =====================
            if (in_array($bookingStatus, [2,4])) {

                for ($j = 0; $j < $fuelLogsPerBooking; $j++) {
                    FuelLog::factory()->create([
                        'booking_id' => $booking->id_booking
                    ]);
                }

            }
        }

        // =========================
        // Vehicle Services
        // =========================
        VehicleService::factory($vehicleServices)->create();

        // Admin
        User::factory()->create([
            'nama' => 'Admin User',
            'email' => 'a@admin.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        // Employee
        User::factory()->create([
            'nama' => 'Employee User',
            'email' => 'a@employee.com',
            'password' => Hash::make('employee'),
            'role' => 'employee',
        ]);

        // Supervisor
        User::factory()->create([
            'nama' => 'Supervisor User',
            'email' => 'a@supervisor.com',
            'password' => Hash::make('supervisor'),
            'role' => 'supervisor',
        ]);

        // Manager
        User::factory()->create([
            'nama' => 'Manager User',
            'email' => 'a@manager.com',
            'password' => Hash::make('manager'),
            'role' => 'manager',
        ]);
    }
}