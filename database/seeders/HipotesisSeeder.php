<?php

namespace Database\Seeders;

use App\Models\Hipotesis;
use Illuminate\Database\Seeder;

class HipotesisSeeder extends Seeder
{
    public function run(): void
    {
        $circunstancia1 = "La persona no localizada no fue víctima de ningún delito.";
        $circunstancia2 = "La persona no localizada fue víctima de un delito.";
        $circunstancia3 = "La persona no localizada fue víctima de un delito diverso";
        $circunstancia4 = "No se especifica la circunstancia de la desaparición.";

        $hipotesis1 = [
            'Por consumo de alcohol u otras sustancias psicoactivas',
            'Accidente',
            'Por razones de salud mental',
            'Ausencia no grave',
            'Por otras razones de salud',
            'Ausencia voluntaria o deliberada',
            'Catasrofe natural',
            'Detención legal',
            'Desacuerdo familiar',
            'Extravío',
            'Falta de medios de comunicación',
            'Otra situación involuntaria',
            'Reporte falso',
        ];

        $hipotesis2 = [
            'Desaparición forzada',
            'Desaparición por particulares',
        ];

        $hipotesis3 = [
            'Desaparición por violencia familiar',
            'Desaparición por violencia hacia las mujeres',
            'Desaparición por violencia social',
            'Desaparición por violencia en razón de su actividad o pertenencia grupal',
            'Discriminación y violencia hacias las personas de diversidad sexual',
            'Delitos sexuales',
            'Desaparición por ser víctima de robo o atraco',
            'Feminicidio',
            'Homicidio',
            'Lesiones',
            'Omisión de cuidados',
            'Privación ilegal de la libertad',
            'Secuestro',
            'Sustracción de menores',
            'Trata de personas',
            'Desaparición que conlleva riesgo de ser víctima de un delito a determinar',
        ];

        $hipotesis4 = [
            'Otra situación involuntaria',
            'Se desconoce',
        ];

        foreach ($hipotesis1 as $hipotesis) {
            Hipotesis::firstOrCreate([
                'nombre' => $hipotesis,
                'descripcion' => $circunstancia1,
            ]);
        }

        foreach ($hipotesis2 as $hipotesis) {
            Hipotesis::firstOrCreate([
                'nombre' => $hipotesis,
                'descripcion' => $circunstancia2,
            ]);
        }

        foreach ($hipotesis3 as $hipotesis) {
            Hipotesis::firstOrCreate([
                'nombre' => $hipotesis,
                'descripcion' => $circunstancia3,
            ]);
        }

        foreach ($hipotesis4 as $hipotesis) {
            Hipotesis::firstOrCreate([
                'nombre' => $hipotesis,
                'descripcion' => $circunstancia4,
            ]);
        }
    }
}
