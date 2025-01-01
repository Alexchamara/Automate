<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Mike Johnson', 'email' => 'mike@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Sarah Wilson', 'email' => 'sarah@example.com', 'password' => Hash::make('password123')],
            ['name' => 'David Brown', 'email' => 'david@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Lisa Davis', 'email' => 'lisa@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Robert Taylor', 'email' => 'robert@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Emma Wilson', 'email' => 'emma@example.com', 'password' => Hash::make('password123')],
            ['name' => 'James Miller', 'email' => 'james@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Mary Martin', 'email' => 'mary@example.com', 'password' => Hash::make('password123')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}