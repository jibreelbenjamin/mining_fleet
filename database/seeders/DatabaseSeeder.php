<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Admin
        User::factory()->create([
            'nama' => 'Admin User',
            'email' => 'a@admin.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Employee
        User::factory()->create([
            'nama' => 'Employee User',
            'email' => 'a@employee.com',
            'password' => Hash::make('password123'),
            'role' => 'employee',
        ]);

        // Supervisor
        User::factory()->create([
            'nama' => 'Supervisor User',
            'email' => 'a@supervisor.com',
            'password' => Hash::make('password123'),
            'role' => 'supervisor',
        ]);

        // Manager
        User::factory()->create([
            'nama' => 'Manager User',
            'email' => 'a@manager.com',
            'password' => Hash::make('password123'),
            'role' => 'manager',
        ]);
    }
    
}
