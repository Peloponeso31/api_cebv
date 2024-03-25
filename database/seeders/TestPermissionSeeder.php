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
            'administrador',
            'supervisor',
            'capturista',
            'consulta',
        ];

        $permissions = [
            'buscar',
            'creacion',
            'edicion',
            'eliminacion',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        Role::where('name', 'administrador')->first()->givePermissionTo($permissions);
        Role::where('name', 'supervisor')->first()->givePermissionTo($permissions);
        Role::where('name', 'capturista')->first()->givePermissionTo('buscar', 'creacion', 'edicion');
        Role::where('name', 'consulta')->first()->givePermissionTo('buscar');
    }
}
