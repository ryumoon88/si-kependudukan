<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view-admin-dashboard', 'guard_name' => 'admin']);

        $super_admin = Role::create(['guard_name' => 'admin', 'name' => 'Super-Admin']);
        $admin = Role::create(['guard_name' => 'admin', 'name' => 'Admin']);

        $super_admin->givePermissionTo(Permission::all());
        $admin->givePermissionTo(['view-admin-dashboard']);
    }
}
