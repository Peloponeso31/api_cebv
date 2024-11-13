<?php

namespace App\Http\Controllers;

use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FichaDeDatosController extends Controller
{
    private $tamanoPapel = [0.0, 0.0, 2215, 2215];

    public function busquedaInmediata(string $id, Request $request) {
        $reportante = Reportante::findOrFail($id);
        $desaparecido = Desaparecido::findOrFail($id);
        $reporte = Reporte::findOrFail($desaparecido->reporte_id);

        return Pdf::loadView("reportes.fichasDatos.busqueda_inmediata", [
            "reportante" => $reportante,
            "desaparecido" => $desaparecido,
            "reporte" => $reporte,
            "senas" => $request->senas ?? null,
            "hechos" => $request->hechos ?? null,
            "media_filiacion" => $request->media_filiacion ?? null
        ])->setPaper($this->tamanoPapel)->stream();
    }
}
