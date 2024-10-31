<?php

namespace App\Http\Controllers;

use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function informeInicio(string $desaparecido_id) {
        $desaparecido = Desaparecido::findOrFail($desaparecido_id);
        $reporte = Reporte::findOrFail($desaparecido->reporte_id);
        $reportante = Reportante::findOrFail($reporte->reportantes->first()->id);

        $folio = Folio::where([
            ["reporte_id", "=", $reporte->id],
            ["persona_id", "=", $desaparecido->persona->id]
        ])->first();

        return Pdf::loadView("reportes.documentos.informe_inicio", [
            "desaparecido" => $desaparecido,
            "reporte" => $reporte,
            "reportante" => $reportante,
            "folio" => $folio
        ])->stream();
    }
}
