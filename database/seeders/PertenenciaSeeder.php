<?php

namespace Database\Seeders;

use App\Models\GrupoPertenencia;
use App\Models\Pertenencia;
use Illuminate\Database\Seeder;

class PertenenciaSeeder extends Seeder
{
    
    public function run(): void
    {
        $gpspertenencias = [
            'PRENDA DE VESTIR',
            'ALHAJA',
            'ACCESORIO DE DAMA Y CABALLERO',
            'OTRO'
        ];
        sort($gpspertenencias);

        foreach ($gpspertenencias as $gppertenencia){
            GrupoPertenencia::firstOrCreate([
                "nombre" => $gppertenencia
            ]);
        }

        $prendaId = GrupoPertenencia::where('nombre','PRENDA DE VESTIR')->first()->id;
        $alhajaId = GrupoPertenencia::where('nombre','ALHAJA')->first()->id;
        $accesorioId = GrupoPertenencia::where('nombre','ACCESORIO DE DAMA Y CABALLERO')->first()->id;
        $otroId = GrupoPertenencia::where('nombre','OTRO')->first()->id;

        $prendas = [
            'ABRIGO',
            'ALBA',
            'BAÑADOR',
            'BABERO',
            'BATA',
            'BERMUDA',
            'BIKINI',
            'BLUSA',
            'BOTAS',
            'BRASSIER',
            'CALCETAS',
        ];

        $alhajas = [
            'JOYERIA',
            'RELOJES DE PULSO'
        ];

        $accesorios = [
            'ANILLO',
            'ARETES',
            'BOINA',
            'BOLSO',
            'BUFANDA',
            'CINTURON',
            'COLLAR',
            'CORBATA',
        ];

        $otros = [
            'NO ESPECIFICA',
            'OTRO'
        ];

        sort($prendas);
        sort($alhajas);
        sort($accesorios);
        sort($otros);

        foreach ($prendas as $prenda) {
            Pertenencia::firstOrCreate([
                'grupo_pertenencia_id' => $prendaId,
                'nombre' => $prenda
            ]);
        }

        foreach ($alhajas as $alhaja) {
            Pertenencia::firstOrCreate([
                'grupo_pertenencia_id' => $alhajaId,
                'nombre' => $alhaja
            ]);
        }

        foreach ($accesorios as $accesorio) {
            Pertenencia::firstOrCreate([
                'grupo_pertenencia_id' => $accesorioId,
                'nombre' => $accesorio
            ]);
        }

        foreach ($otros as $otro) {
            Pertenencia::firstOrCreate([
                'grupo_pertenencia_id' => $otroId,
                'nombre' => $otro
            ]);
        }
    }
}
