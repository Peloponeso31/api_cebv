<?php

namespace Database\Seeders;

use App\Models\Contextos\ContextoEconomico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContextoEconomicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContextoEconomico::factory(100)->create();
    
    }
}
