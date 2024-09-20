<?php

namespace Database\Seeders;

use App\Models\Informaciones\Medio;
use App\Models\Informaciones\TipoMedio;
use Illuminate\Database\Seeder;

class MedioSeeder extends Seeder
{
    public function run(): void
    {
        $tiposMedios = [
            'Noticia',
            'Reporte',
            'Denuncia'
        ];

        sort($tiposMedios);

        foreach ($tiposMedios as $tipoMedio) {
            TipoMedio::firstOrCreate([
                'nombre' => $tipoMedio
            ]);
        }

        $noticiaId = TipoMedio::where('nombre', 'Noticia')->first()->id;
        $reporteId = TipoMedio::where('nombre', 'Reporte')->first()->id;
        $denunciaId = TipoMedio::where('nombre', 'Denuncia')->first()->id;

        $noticias = [
            'Redes sociales',
            'Prensa digital',
            'Otra fuente',
            'No especificado'
        ];

        $reportes = [
            'Amparo Buscador',
            'C2,C4,C5,911',
            'CLB',
            'CNB',
            'Comisiones de Derechos Humanos',
            'Declaraciones de Ausencia',
            'Fiscalía General del Estado',
            'Presencial',
            'Telefonico',
            'Correo electrónico',
            'Redes sociales CEBV',
            'RNPDNO',
            'Otra autoridad',
            'Otros medios',
        ];

        $denuncias = [
            'Carpeta de investigación',
            'Investigación ministerial',
            'Alerta Amber',
        ];

        sort($noticias);
        sort($reportes);
        sort($denuncias);

        foreach ($denuncias as $denuncia) {
            Medio::firstOrCreate([
                'tipo_medio_id' => $denunciaId,
                'nombre' => $denuncia
            ]);
        }

        foreach ($noticias as $noticia) {
            Medio::firstOrCreate([
                'tipo_medio_id' => $noticiaId,
                'nombre' => $noticia
            ]);
        }

        foreach ($reportes as $reporte) {
            Medio::firstOrCreate([
                'tipo_medio_id' => $reporteId,
                'nombre' => $reporte
            ]);
        }

    }
}
