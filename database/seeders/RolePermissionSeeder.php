<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superRole = Role::firstOrCreate(['name' => 'super_admin']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        $rolePermission = Permission::firstOrCreate(['name' => 'roles_manage']);
        $permissionPermission = Permission::firstOrCreate(['name' => 'permissions_manage']);
        $userPermission = Permission::firstOrCreate(['name' => 'users_manage']);

        $superRole->syncPermissions([$rolePermission, $permissionPermission, $userPermission]);
        $adminRole->syncPermissions([$userPermission]);
    }
}
