<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisoSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'administrador',
            'supervisor',
            'capturista',
            'consultor'
        ];

        $permissions = [
            'consulta',
            'agregar',
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
        Role::where('name', 'capturista')->first()->givePermissionTo('consulta', 'agregar', 'edicion');
        Role::where('name', 'consultor')->first()->givePermissionTo('consulta');
    }
}
