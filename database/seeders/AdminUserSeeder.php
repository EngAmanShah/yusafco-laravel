<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // <-- Import the User model
use Illuminate\Support\Facades\Hash; // <-- Import the Hash facade

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     User::firstOrCreate(
            ['email' => 'admin@yosafco.com'], // The unique field to check for
            [
                'name' => 'Yosafco Admin',
                'farmName' => 'Yosafco HQ',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );
    }
}