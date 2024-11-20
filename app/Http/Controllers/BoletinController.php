<?php

namespace App\Http\Controllers;

use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoletinController extends Controller
{
    private $tamanoPapel = [0.0, 0.0, 2215, 2215];

    public function busquedaInmediata(string $id, Request $request) {
        $desaparecido = Desaparecido::findOrFail($id);
        $reporte = Reporte::findOrFail($desaparecido->reporte_id);

        $folio = Folio::firstWhere([
            ["reporte_id", "=", $reporte->id],
            ["persona_id", "=", $desaparecido->persona->id]
        ]);

        $imagen = Storage::get($desaparecido->boletin_img_path);

        return Pdf::loadView("reportes.boletines.busqueda_inmediata", [
            "desaparecido" => $desaparecido,
            "imagen" => "data:image/jpg;base64," . base64_encode($imagen),
            "folio" => $folio,
            "senas" => $request->senas ?? null
        ])->setPaper($this->tamanoPapel)->stream();
    }
}
