<?php

namespace App\Services;

use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Reporte;

class ReporteService
{
    public function setFolio(mixed $id)
    {
        $reporte = Reporte::findOrFail($id);

        $desaparecidos = Desaparecido::where('reporte_id', '=', $id)->get();

        if ($reporte) {
            foreach ($desaparecidos as $desaparecido) {
                // TODO: Add if en folio
                Folio::create([
                    'folio' => 'mazapan',
                    'persona_id' => $desaparecido->persona_id,
                    'reporte_id' => $id,
                    'user_id' => auth()->id(),
                ]);
                echo "Jaló el folio\n";
            }

            echo "Jala";
        } else {
            echo "No jala";
        }
    }
}
