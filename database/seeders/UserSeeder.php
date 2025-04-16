<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@getourthrift.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone_number' => '081234567890',
            'address' => 'Jl. Admin No. 1, Jakarta Selatan',
        ]);

        // Create regular users
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'phone_number' => '081234567891',
            'address' => 'Jl. Sudirman No. 123, Jakarta Pusat',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'phone_number' => '081234567892',
            'address' => 'Jl. Gatot Subroto No. 45, Jakarta Selatan',
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'phone_number' => '081234567893',
            'address' => 'Jl. Thamrin No. 67, Jakarta Pusat',
        ]);
    }
}