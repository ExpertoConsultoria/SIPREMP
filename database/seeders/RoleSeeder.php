<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['guard_name'  => 'sanctum','name' => 'admin']);

        Role::create(['guard_name'  => 'sanctum','name' => 'N7:GS:17A']);
        // Role::create(['guard_name'  => 'sanctum','name' => 'N7:GS:17AB']);
        Role::create(['guard_name'  => 'sanctum','name' => 'N6:17A']);
        // Role::create(['guard_name'  => 'sanctum','name' => 'N6:16A']);
        Role::create(['guard_name'  => 'sanctum','name' => 'N5:18A:F']);
        // Role::create(['guard_name'  => 'sanctum','name' => 'N5:18A:AF']);
        Role::create(['guard_name'  => 'sanctum','name' => 'N4:SEGE']);
        // Role::create(['guard_name'  => 'sanctum','name' => 'N4:SEGE:A']);
        Role::create(['guard_name'  => 'sanctum','name' => 'N3:UNTE']);
        // Role::create(['guard_name'  => 'sanctum','name' => 'N3:UNTE:A']);
        Role::create(['guard_name'  => 'sanctum','name' => 'N2:CP']);
        // Role::create(['guard_name'  => 'sanctum','name' => 'N2:CP:A']);
        Role::create(['guard_name'  => 'sanctum','name' => 'N1:DA']);

    }
}
