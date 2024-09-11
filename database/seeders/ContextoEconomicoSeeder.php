<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContextoEconomicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ContextoEconomico::factory(10)->create();



        // \App\Models\ContextoEconomico::create([
        //     "empresa" => "Coca Cola Company",
        //     "puesto" => "Tecnico",
        //     "fechaDeIngreso" => "1999-01-01",
        //     "deudas" => 2000
        // ]);

    }
}