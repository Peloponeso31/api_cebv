<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaFiliacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Catalogos\MediaFiliacion\ColorVellofacial::insert([
            ["nombre" => "Castaño"],
            ["nombre" => "Negro"],
            ["nombre" => "Rubio"],
            ["nombre" => "Pelirrojo"],
            ["nombre" => "Entrecano"],
            ["nombre" => "Canoso"]
        ]);

        \App\Models\Catalogos\MediaFiliacion\CorteVellofacial::insert([
            ["nombre" => "Cerrada"],
            ["nombre" => "Rasurada"],
            ["nombre" => "De candado"],
            ["nombre" => "Depilada"],
            ["nombre" => "Larga"],
        ]);

        \App\Models\Catalogos\MediaFiliacion\RegionVellofacial::insert([
            ["nombre" => "Barba"],
            ["nombre" => "Bigote"],
            ["nombre" => "Patilla"],
        ]);

        \App\Models\Catalogos\MediaFiliacion\VolumenVellofacial::insert([
            ["nombre" => "Poblada"],
            ["nombre" => "Lampiña"],
            ["nombre" => "Escasa"]
        ]);

        \App\Models\Catalogos\MediaFiliacion\TipoProyeccionMenton::insert([
            ["nombre" => "Saliente"],
            ["nombre" => "Retraído"],
            ["nombre" => "Recto"]
        ]);

        \App\Models\Catalogos\MediaFiliacion\TipoPabellonAuricular::insert([
            ["nombre" => "Completos"],
            ["nombre" => "Incompletos"],
            ["nombre" => "Cuadrados"],
            ["nombre" => "Ovalados"],
            ["nombre" => "Redondos"],
            ["nombre" => "Triángulares"]
        ]);

        \App\Models\Catalogos\MediaFiliacion\ModificacionPabellonAuricular::insert([
            ["nombre" => "Aretes"],
            ["nombre" => "Sin aretes"],
            ["nombre" => "Obliterada"],
            ["nombre" => "Prótesis auditiva"]
        ]);

        \App\Models\Catalogos\MediaFiliacion\TipoCeja::insert([
            ["nombre" => "Pobladas"],
            ["nombre" => "Regulares"],
            ["nombre" => "Escasas"],
            ["nombre" => "Depiladas"],
            ["nombre" => "Rasuradas"],
            ["nombre" => "Tatuadas"]
        ]);

        \App\Models\Catalogos\MediaFiliacion\TamanoBoca::insert([
            ["tamano" => "Chica"],
            ["tamano" => "Mediana"],
            ["tamano" => "Grande"]
        ]);

        \App\Models\Catalogos\MediaFiliacion\FormaOjo::insert([
            ["forma" => "Redondos"],
            ["forma" => "Ovales"],
            ["forma" => "Rasgados"],
            ["forma" => "Alargados"]
        ]);

        \App\Models\Catalogos\MediaFiliacion\TipoCalvicie::insert([
            ["tipo" => "Incipiente"],
            ["tipo" => "Frontal"],
            ["tipo" => "Coronal"],
            ["tipo" => "Tonsural"]
        ]);

        \App\Models\Catalogos\MediaFiliacion\ModificacionCabello::insert([
            ["modificacion" => "Base/Permanente"],
            ["modificacion" => "Alaciado"],
            ["modificacion" => "Mechas"],
            ["modificacion" => "Militar"],
            ["modificacion" => "Extensiones"],
            ["modificacion" => "Trenzado"],
            ["modificacion" => "Rastas"],
            ["modificacion" => "Tatuado"],
            ["modificacion" => "Peluca (se deben especificar)"],
            ["modificacion" => "Bisoñe"],
            ["modificacion" => "Teñido"]
        ]);

        \App\Models\Catalogos\MediaFiliacion\TamanoCabello::insert([
            ["tamano" => "Corto"],
            ["tamano" => "Al hombro"],
            ["tamano" => "Largo"],
            ["tamano" => "Rapado"],
            ["tamano" => "No valorable"]
        ]);

    }
}
