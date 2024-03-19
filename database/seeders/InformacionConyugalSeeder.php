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
            ["tipo_estadocivil" => "Soltero"], 
            ["tipo_estadocivil" => "Casado"], 
            ["tipo_estadocivil" => "Viudo"],
            ["tipo_estadocivil" => "Divorciado"], 
            ["tipo_estadocivil" => "Separado/a en proceso judicial"],  
            ["tipo_estadocivil" => "Concubinato"]
        ]);
    }
}
