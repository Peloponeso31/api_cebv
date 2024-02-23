<?php

namespace Database\Seeders;

use App\Models\Desaparicion;
use Illuminate\Database\Seeder;

class DesaparicionSeeder extends Seeder
{
    public function run(): void
    {
        Desaparicion::factory(25)->create();
    }
}
