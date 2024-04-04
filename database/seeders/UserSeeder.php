<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/*
 * This seeder is used to create a test user for the application.
 */

class UserSeeder extends Seeder
{
    public function run(): void
    {

        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@cebv.com',
            'password' => Hash::make('admin')
        ]);

        $supervisor = User::create([
            'name' => 'Supervisor',
            'email' => 'supervisor@cebv.com',
            'password' => Hash::make('supervisor')
        ]);

        $capturista = User::create([
            'name' => 'Capturista',
            'email' => 'capturista@cebv.com',
            'password' => Hash::make('capturista')
        ]);

        $consultor = User::create([
            'name' => 'Consultor',
            'email' => 'consultor@cebv.com',
            'password' => Hash::make('consultor')
        ]);

        $admin->assignRole('administrador');
        $supervisor->assignRole('supervisor');
        $capturista->assignRole('capturista');
        $consultor->assignRole('consultor');
    }
}
