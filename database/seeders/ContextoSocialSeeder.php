<?php

namespace Database\Seeders;

use App\Models\ContextoSocial;
use Illuminate\Database\Seeder;

class ContextoSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContextoSocial::factory(10)->create();
    }
}
