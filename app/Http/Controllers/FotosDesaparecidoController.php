<?php

namespace App\Http\Controllers;

use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\SenasParticulares;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotosDesaparecidoController extends Controller
{
    public function index($desaparecido_id)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecido_id);
        //Storage para acceder al repositorio del servidor,
        $files = Storage::allFiles($desaparecido->persona->id);
        $content = [];
        $acc = 0;

        foreach ($files as $file) {
            $bytes = Storage::get($file);
            $content[] = base64_encode($bytes);

        }
        return $content;
    }
    public function deleteFotos($desaparecido_id)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecido_id);
        $directory = $desaparecido->persona->id;
        if (Storage::exists($directory)) {
            Storage::deleteDirectory($directory);
            return response()->json([
                "mensaje" => "Todos los archivos han sido eliminados."
            ])->setStatusCode(200);
        }
        return response()->json([
            "mensaje" => "El directorio no existe"
        ])->setStatusCode(404);
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
