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
        // ========================
        // Variabel jumlah data
        // ========================
        $jumlahUsers = 50;
        $jumlahDrivers = 200;
        $jumlahVehicles = 500;
        $jumlahBookings = 5000;
        $jumlahApprovalsPerBooking = 2; // supervisor + manager
        $jumlahFuelLogsPerBooking = 4;
        $jumlahVehicleServices = 70;

        // ========================
        // Users
        // ========================
        User::factory($jumlahUsers)->create();

        // ========================
        // Drivers
        // ========================
        Driver::factory($jumlahDrivers)->create();

        // ========================
        // Vehicles
        // ========================
        Vehicle::factory($jumlahVehicles)->create();

        // ========================
        // Bookings
        // ========================
        $bookings = Booking::factory($jumlahBookings)->create();

        // ========================
        // Approvals
        // ========================
        foreach ($bookings as $booking) {
            for ($level = 1; $level <= $jumlahApprovalsPerBooking; $level++) {
                Approval::factory()->create([
                    'booking_id' => $booking->id_booking,
                    'level' => $level,
                    'approver' => User::inRandomOrder()->first()->id_user,
                ]);
            }
        }

        // ========================
        // Fuel Logs
        // ========================
        foreach ($bookings as $booking) {
            for ($i = 0; $i < $jumlahFuelLogsPerBooking; $i++) {
                FuelLog::factory()->create([
                    'booking_id' => $booking->id_booking,
                ]);
            }
        }

        // ========================
        // Vehicle Services
        // ========================
        VehicleService::factory($jumlahVehicleServices)->create();

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
