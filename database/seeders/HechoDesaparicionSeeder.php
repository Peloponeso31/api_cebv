<?php

namespace Database\Seeders;

use App\Models\Reportes\Informacion\HechoDesaparicion;
use Illuminate\Database\Seeder;

class HechoDesaparicionSeeder extends Seeder
{
    public function run(): void
    {
        HechoDesaparicion::factory(25)->create();
    }
}
