<?php

namespace App\Services;

use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Reporte;
use Illuminate\Http\JsonResponse;

class ReporteService
{
    /**
     * @param mixed $id
     * @return JsonResponse
     */
    public function setFolio(mixed $id)
    {
        $reporte = Reporte::findOrFail($id);

        if ($reporte->desaparecidos_count > 0) {
            foreach ($reporte->desaparecidos as $desaparecido) {
               echo "Desaparecido $desaparecido->id";
            }
            return response()->json("Se asigno el folio - reporte $reporte->id 000");

        } else {
            return response()->json("Sin personas para asignar folio - reporte $reporte->id", 404);
        }
    }
}
