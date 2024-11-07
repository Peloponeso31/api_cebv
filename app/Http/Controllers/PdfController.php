<?php

namespace App\Http\Controllers;

use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function boletinBusquedInmediata(string $id, Request $request) {
        $desaparecido = Desaparecido::findOrFail($id);
        $reporte = Reporte::findOrFail($desaparecido->reporte_id);
        $reportante = Reportante::findOrFail($reporte->reportantes->first()->id);
        $tamanoPapel = [0.0, 0.0, 2215, 2215];

        $folio = Folio::where([
            ["reporte_id", "=", $reporte->id],
            ["persona_id", "=", $desaparecido->persona->id]
        ])->first();

        $imagen = Storage::get($desaparecido->boletin_img_path);

        return Pdf::loadView("reportes.boletin_BI", [
            "desaparecido" => $desaparecido,
            "imagen" => "data:image/jpg;base64," . base64_encode($imagen),
            "folio" => $folio,
            "senas" => $request->senas ?? null
        ])->setPaper($tamanoPapel)->stream();
    }
}
