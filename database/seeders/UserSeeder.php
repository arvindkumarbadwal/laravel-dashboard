<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::updateOrCreate([
            'email' => 'super_admin@admin.com',
        ], [
            'name' => 'Super Admin',
            'email' => 'super_admin@admin.com',
            'password' => bcrypt('password'),
            'email_verified_at' => Carbon::now(),
        ]);

        $admin = User::updateOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'email_verified_at' => Carbon::now(),
        ]);

        $user = User::updateOrCreate([
            'email' => 'user@admin.com',
        ], [
            'name' => 'User',
            'email' => 'user@admin.com',
            'password' => bcrypt('password'),
        ]);

        $superAdmin->syncRoles('super_admin');
        $admin->syncRoles('admin');
        $user->syncRoles('user');
    }
}
