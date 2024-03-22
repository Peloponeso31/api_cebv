<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformacionConyugalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\InformacionConyugal::insert([
            ["tipo_estadocivil" => "Soltero/a"],
            ["tipo_estadocivil" => "Casado/a"],
            ["tipo_estadocivil" => "Divorciado/a"],
            ["tipo_estadocivil" => "Separado/a en proceso judicial"],
            ["tipo_estadocivil" => "Viudo/a"],
            ["tipo_estadocivil" => "Concubinato"],
        ]);
    }
}
