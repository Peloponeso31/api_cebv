<?php

namespace Database\Seeders;

use App\Models\CondicionVulnerabilidad\CondicionVulnerabilidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CondicionVulnerabilidadSeeder extends Seeder
{
    
    public function run(): void
    {
        CondicionVulnerabilidad::factory(100)->create();
    }
}
