<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 2 admin users
        User::create([
            'name' => 'Admin One',
            'email' => 'admin1@example.com',
            'password' => Hash::make('password'),
            'mobile' => '1234567890',
            'role' => 'admin',
            'isActive' => true,
        ]);

        User::create([
            'name' => 'Admin Two',
            'email' => 'admin2@example.com',
            'password' => Hash::make('password'),
            'mobile' => '0987654321',
            'role' => 'admin',
            'isActive' => true,
        ]);

        // Create 8 regular users
        User::factory()->count(8)->create([
            'role' => 'user',
            'isActive' => true,
        ]);
    }
}
