<?php

namespace App\Http\Controllers;

use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\SenasParticulares;
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
            $paths[] = $file->storeAs($desaparecido->persona->id, $file->getClientOriginalName());
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

    public function uploadSenas($desaparecido_id, Request $request)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecido_id);

        $paths = [];
        foreach ($request->allFiles() as $key => $file) {
            $sena = SenasParticulares::findOrFail($key);
            $paths[] = $file->storeAs($desaparecido->id.'/senas_particulares/', $sena->id);
            $sena->foto = end($paths);
            $sena->save();
        }

        return response()->json([
            "mensaje" => "Fotografias guardadas correctamente",
            "archivos" => $paths,
        ])->setStatusCode(201);
    }

    public function getFotoSena($sena_id) {
        $sena = SenasParticulares::findOrFail($sena_id);

        if ($sena->foto != null) {
            $foto = Storage::get($sena->foto);
            return base64_encode($foto);
        }
        return response('', 404);
    }
}
