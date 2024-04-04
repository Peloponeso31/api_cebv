<?php

namespace Database\Seeders;

use App\Models\Contextos\ContextoSocial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContextoSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContextoSocial::factory(100)->create();
    }
}
