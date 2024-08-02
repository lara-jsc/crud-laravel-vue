<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $default = Role::create(['name' => 'default']);
        $admin = Role::create(['name' => 'admin']);

        $manage_users_permission = Permission::create(['name' => 'manage users']);
        $create_employee_permission = Permission::create(['name' => 'create employee']);

        $permissions = [ 
            $manage_users_permission, 
            $create_employee_permission
        ];

        $admin->syncPermissions($permissions);


    }
}
