<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin role if it doesn't exist
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        // Assign Admin role to the first user if they exist
        $user = User::first();
        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
