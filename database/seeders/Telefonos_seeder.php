<?php

namespace Database\Seeders;

use App\Models\Telefono\Telefono;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Telefonos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Telefono::factory(100)->create();
    }
}
