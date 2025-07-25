<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            AdminUserSeeder::class, // <-- Add this line
        ]);
        
        $this->call([
    AdminUserSeeder::class,
    SiteContentSeeder::class, // <-- Add this
]);
    }
}