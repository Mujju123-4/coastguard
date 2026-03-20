<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create a default Admin User if not exists
        $user = User::firstOrCreate(
            ['email' => 'officer@indiancoastguard.gov.in'],
            [
                'name' => 'Commander Admin',
                'password' => bcrypt('password123'),
            ]
        );

        // Run the permissions seeder
        $this->call(PermissionSeeder::class);
    }
}
