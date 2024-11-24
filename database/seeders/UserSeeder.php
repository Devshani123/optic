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
        // Create Admin
        User::create([
            'name' => 'Admin1',
            'email' => 'admin1@example.com',
            'password' => Hash::make('admin1'), // Ensure you hash the password
            'role' => 0, // Admin role
        ]);

        // Create Club Owner
        User::create([
            'name' => 'Club Owner1',
            'email' => 'clubowner1@example.com',
            'password' => Hash::make('clubowner1'),
            'role' => 2, // Club Owner role
        ]);
    }

}
