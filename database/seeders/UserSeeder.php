<?php

namespace Database\Seeders;

use App\Models\Empleado\Empleado;
use App\Models\Personas\Persona;
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
            'empleado_id' => Empleado::create([
                'persona_id' => Persona::create([
                    'nombre' => 'Tanil',
                    'apellido_paterno' => 'Izquierdo',
                    'apellido_materno' => 'Cordova',
                ])->id,
                'puesto_id' => 2,
            ])->id,
            'email' => 'tanil@cebv.com',
        ]);

        User::factory()->create([
            'empleado_id' => Empleado::create([
                'persona_id' => Persona::create([
                    'nombre' => 'Ismael',
                    'apellido_paterno' => 'Matus',
                    'apellido_materno' => 'García',
                ])->id,
                'puesto_id' => 2,
            ])->id,
            'email' => 'ismael@cebv.com',
        ]);

        User::factory()->create([
            'empleado_id' => Empleado::create([
                'persona_id' => Persona::create([
                    'nombre' => 'Josue Nicolas',
                    'apellido_paterno' => 'Castillo',
                    'apellido_materno' => 'Agosto',
                ])->id,
                'puesto_id' => 2,
            ])->id,
            'email' => 'nicolas@cebv.com',
        ]);

        User::factory()->create([
            'empleado_id' => Empleado::create([
                'persona_id' => Persona::create([
                    'nombre' => 'Jonatan',
                    'apellido_paterno' => 'Luna',
                    'apellido_materno' => 'Franco',
                ])->id,
                'puesto_id' => 2,
            ])->id,
            'email' => 'jon@cebv.com',
        ]);

        /*
         * Test users for permissions
         */
        //$admin = User::create([
        //    'name' => 'Admin Test',
        //    'email' => 'q@q.com',
        //    'password' => Hash::make('qqqq')
        //]);
//
        //$user = User::create([
        //    'name' => 'User Test',
        //    'email' => 'user@user.com',
        //    'password' => Hash::make('user')
        //]);
//
        //$guest = User::create([
        //    'name' => 'Guest Test',
        //    'email' => 'guest@guest.com',
        //    'password' => Hash::make('guest')
        //]);
//
        //$admin->assignRole('admin_test');
        //$user->assignRole('user_test');
        //$guest->assignRole('guest_test');
    }
}
