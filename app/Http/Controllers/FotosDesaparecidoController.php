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

        $paths = [];
        foreach ($request->allFiles() as $key => $file) {
            $paths[] = $file->storeAs($desaparecido->id, $file->getClientOriginalName());
            if ($key == "boletin") {
                $desaparecido->boletin_img_path = end($paths);
                $desaparecido->save();
            }
        }

        return response()->json([
            "mensaje" => "Fotografias guardadas correctamente",
            "archivos" => $paths,
            "boletin_img" => $desaparecido->boletin_img_path
        ])->setStatusCode(201);
    }
}
