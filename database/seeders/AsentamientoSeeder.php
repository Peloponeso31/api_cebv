<?php

namespace Database\Seeders;

use App\Models\Ubicaciones\Asentamiento;
use Illuminate\Database\Seeder;

class AsentamientoSeeder extends Seeder
{
    public function run(): void
    {
        Asentamiento::factory()
            ->count(100)
            ->create();
    }
}
