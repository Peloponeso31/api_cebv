<?php

namespace Database\Seeders;

use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Seeder;

class DireccionSeeder extends Seeder
{
    public function run(): void
    {
        Direccion::factory()
            ->count(100)
            ->create();
    }
}
