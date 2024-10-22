<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'admin_test',
            'user_test',
            'guest_test',
        ];

        $permissions = [
            'create_test',
            'update_test',
            'read_test',
            'delete_test',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        Role::where('name', 'admin_test')->first()->givePermissionTo($permissions);
        Role::where('name', 'user_test')->first()->givePermissionTo('create_test', 'update_test', 'read_test');
        Role::where('name', 'guest_test')->first()->givePermissionTo('read_test');
    }
}
