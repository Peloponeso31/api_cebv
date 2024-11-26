<?php

namespace Database\Seeders;

use App\Models\Catalogos\Oficina;
use App\Models\Catalogos\Puesto;
use App\Models\Empleado\Empleado;
use App\Models\User;
use Illuminate\Database\Seeder;

/*
 * This seeder is used to create a test user for the application.
 */

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'empleado_id' => Empleado::create([
                'sexo_id' => 1,
                'puesto_id' => Puesto::inRandomOrder()->first()->id,
                'oficina_id' => Oficina::inRandomOrder()->first()->id,
                'nombre' => 'Jonatan',
                'apellido_paterno' => 'Luna',
                'apellido_materno' => 'Franco',
            ])->id,
            'email' => 'jon@cebv.com',
        ]);

        User::factory()->create([
            'empleado_id' => Empleado::create([
                'sexo_id' => 1,
                'puesto_id' => Puesto::inRandomOrder()->first()->id,
                'oficina_id' => Oficina::inRandomOrder()->first()->id,
                'nombre' => 'Tanil',
                'apellido_paterno' => 'Izquierdo',
                'apellido_materno' => 'Cordova',
            ])->id,
            'email' => 'tanil@cebv.com',
        ]);

        User::factory()->create([
            'empleado_id' => Empleado::create([
                'sexo_id' => 1,
                'puesto_id' => Puesto::inRandomOrder()->first()->id,
                'oficina_id' => Oficina::inRandomOrder()->first()->id,
                'nombre' => 'Armando',
                'apellido_paterno' => 'Luna',
                'apellido_materno' => 'Sanchez',
            ])->id,
            'email' => 'armando@cebv.com',
        ]);

        User::factory()->create([
            'empleado_id' => Empleado::create([
                'sexo_id' => 1,
                'puesto_id' => Puesto::inRandomOrder()->first()->id,
                'oficina_id' => Oficina::inRandomOrder()->first()->id,
                'nombre' => 'Luz',
                'apellido_paterno' => 'Uribe',
                'apellido_materno' => 'Vargas',
            ])->id,
            'email' => 'luz@cebv.com',
        ]);

        User::factory()->create([
            'empleado_id' => Empleado::create([
                'sexo_id' => 1,
                'puesto_id' => Puesto::inRandomOrder()->first()->id,
                'oficina_id' => Oficina::inRandomOrder()->first()->id,
                'nombre' => 'Luis',
                'apellido_paterno' => 'Arguello',
                'apellido_materno' => 'Hernandez',
            ])->id,
            'email' => 'luis@cebv.com',
        ]);
    }
}
