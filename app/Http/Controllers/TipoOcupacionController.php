<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\TipoOcupacion;
use Illuminate\Http\Request;

class TipoOcupacionController extends Controller
{
    public function index()
    {
        $tiposocupaciones = TipoOcupacion::withTipoocupacionesCount()->orderBy('ocupaciones_count','desc')->get();

        return CatalogoResource::collection($tiposocupaciones);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(TipoOcupacion::create($data));
    }

    public function show(TipoOcupacion $tipoOcupacion)
    {
        return new CatalogoResource($tipoOcupacion);
    }

    public function update(Request $request, TipoOcupacion $tipoOcupacion)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tipoOcupacion->update($data);

        return new CatalogoResource($tipoOcupacion);
    }

    public function destroy(TipoOcupacion $tipoOcupacion)
    {
        $tipoOcupacion->delete();

        return response()->json();
    }
}
