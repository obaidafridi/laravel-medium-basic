<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the admin role
        $adminRole = Role::create(['name' => 'admin']);

        // Create the user role
        $userRole = Role::create(['name' => 'user']);

        // Optionally, you can assign permissions to roles here using the Spatie Permission package syntax
        // Example: $adminRole->givePermissionTo('create-post');
        // Example: $userRole->givePermissionTo('view-post');
    }
}
