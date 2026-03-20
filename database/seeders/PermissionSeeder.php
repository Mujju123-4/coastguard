<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permission groups
        $permissions = [
            'users' => ['view users', 'create users', 'edit users', 'delete users'],
            'roles' => ['view roles', 'create roles', 'edit roles', 'delete roles'],
            'permissions' => ['view permissions', 'create permissions', 'edit permissions', 'delete permissions'],
            'locations' => ['view locations', 'create locations', 'edit locations', 'delete locations'],
            'notices' => ['view notices', 'create notices', 'edit notices', 'delete notices'],
        ];

        foreach ($permissions as $group => $names) {
            foreach ($names as $name) {
                \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $name]);
            }
        }

        // Create roles and assign permissions
        $adminRole = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Admin']);
        $adminRole->syncPermissions(\Spatie\Permission\Models\Permission::all());

        // Assign 'Admin' role to the first user if exists
        $user = \App\Models\User::where('email', 'officer@indiancoastguard.gov.in')->first();
        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
