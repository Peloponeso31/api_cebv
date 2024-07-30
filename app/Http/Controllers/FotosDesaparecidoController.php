<?php

namespace App\Http\Controllers;

use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Relaciones\Desaparecido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotosDesaparecidoController extends Controller
{
    // Generado con Gemini.
    private function sanitize($string) {
        $string = preg_replace('/[^a-zA-Z0-9\._-]/', '', $string);
        $string = trim($string, '. ');
        $string = preg_replace('/[\/\\\]+/', '/', $string);
        $string = str_replace(['..', './'], '', $string);
        return $string;
    }
    public function upload($desaparecido_id, Request $request)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecido_id);

        $folio = Folio::where([
            ['reporte_id', '=', $desaparecido->reporte_id],
            ['persona_id', '=', $desaparecido->persona_id]
        ])->first();

        if ($folio == null) return response()->json(["Los desaparecidos aun no tienen folio"])->setStatusCode(507);

        $paths = [];
        foreach ($request->allFiles() as $file) {
            $paths[] = $file->storeAs(
                $this->sanitize($folio->folio_cebv), $file->getClientOriginalName()
            );
        }

        return response()->json([
            "mensaje" => "Fotografias guardadas correctamente",
            "archivos" => $paths
        ])->setStatusCode(201);
    }
}
