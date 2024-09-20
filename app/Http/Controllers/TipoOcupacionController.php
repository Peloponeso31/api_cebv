<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\TipoOcupacion;
use Illuminate\Http\Request;

class TipoOcupacionController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(TipoOcupacion::all());
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
