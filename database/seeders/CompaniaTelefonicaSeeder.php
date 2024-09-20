<?php

namespace Database\Seeders;

use App\Models\CompaniaTelefonica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniaTelefonicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companias = [
            'Telcel',
            'AT&T',
            'Movistar',
            'Telecomunicaciones Indígenas Comunitarias',
            'Aló',
            'Unefon',
            'Bueno Cell',
            'Soriana Móvil',
            'Nox Móvil',
            'Freedompop',
            'Oui Móvil',
            'Neus Mobile',
            'Yuhu',
            'Megatel',
            'Quattrocom',
            'Weex',
            'QBOCel',
            'Flash Mobile',
            'Tokamóvil',
            'InXel',
            'Netium',
            'IENTC',
            'Simpati Mobile',
            'Her Mobile',
            'Inten Móvil',
            'Six Móvil',
            'Virgin Mobile',
            'Simplii',
            'Cierto',
            'Protokol',
            'Maz Tiempo',
            'Helppy',
            'MaXsaldo',
            'Unefon',
            'Miio',
            'Vission Cable',
            'PilloFon',
            'No especifica'
        ];

        foreach ($companias as $compania) {
            CompaniaTelefonica::create([
                'nombre' => $compania,
            ]);
        }
    }
}
