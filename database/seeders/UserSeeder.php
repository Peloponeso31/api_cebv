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
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        /*
         * Test users for permissions
         */
        $admin = User::create([
            'name' => 'Administrador', 
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ]);

        $super = User::create([
            'name' => 'Supervisor',
            'email' => 'super@admin.com',
            'password' => Hash::make('super')
        ]);

        $captu = User::create([
            'name' => 'Capturista',
            'email' => 'captu@admin.com',
            'password' => Hash::make('captu')
        ]);

        $consu = User::create([
            'name' => 'Consultista',
            'email' => 'consu@admin.com',
            'password' => Hash::make('consu')
        ]);

        

        // $user = User::create([
        //     'name' => 'User Test',
        //     'email' => 'user@user.com',
        //     'password' => Hash::make('user')
        // ]);

        // $guest = User::create([
        //     'name' => 'Guest Test',
        //     'email' => 'guest@guest.com',
        //     'password' => Hash::make('guest')
        // ]); 

        $admin->assignRole('administrador');
        $super->assignRole('supervisor');
        $captu->assignRole('capturista');
        $consu->assignRole('consulta');
    
    }
}
