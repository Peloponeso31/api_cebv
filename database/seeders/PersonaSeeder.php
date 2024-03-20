<?php

namespace Database\Seeders;

use App\Models\Personas\Persona;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Persona::factory(100)->create();
    }
}
