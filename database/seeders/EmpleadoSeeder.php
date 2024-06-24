<?php

namespace Database\Seeders;

use App\Models\Empleado\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        Empleado::factory(100)->create();
    }
}
