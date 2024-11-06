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

        User::factory()->create([
            'empleado_id' => Empleado::create([
                'persona_id' => Persona::create([
                    'nombre' => 'Mizar Janai',
                    'apellido_paterno' => 'Chiquito',
                    'apellido_materno' => 'Espino',
                ])->id,
                'puesto_id' => 2,
            ])->id,
            'email' => 'mizar@cebv.com',
        ]);


        // Usuarios de la CEBV
        User::factory()->create([
            'empleado_id' => Empleado::create([
                'persona_id' => Persona::create([
                    'nombre' => 'Luz',
                    'apellido_paterno' => 'Uribe',
                    'apellido_materno' => 'Vargas',
                ])->id,
                'puesto_id' => 2,
            ])->id,
            'email' => 'luz@cebv.com',
        ]);

        User::factory()->create([
            'empleado_id' => Empleado::create([
                'persona_id' => Persona::create([
                    'nombre' => 'Luis',
                    'apellido_paterno' => 'Arguello',
                    'apellido_materno' => 'Hernandez',
                ])->id,
                'puesto_id' => 2,
            ])->id,
            'email' => 'luis@cebv.com',
        ]);

        User::factory()->create([
            'empleado_id' => Empleado::create([
                'persona_id' => Persona::create([
                    'nombre' => 'Armando',
                    'apellido_paterno' => 'Luna',
                    'apellido_materno' => 'Sanchez',
                ])->id,
                'puesto_id' => 2,
            ])->id,
            'email' => 'armando@cebv.com',
        ]);
    }
}
