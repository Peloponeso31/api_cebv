<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\EstadoConyugal;
use Illuminate\Http\Request;

class EstadoConyugalController extends Controller
{
    public function index()
    {
        $estadosconyugales = EstadoConyugal::withEstadosConyugalesCount()->orderBy('contextos_Familiares_count','desc')->get();


        return CatalogoResource::collection($estadosconyugales);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(EstadoConyugal::create($data));
    }

    public function show(EstadoConyugal $estadoConyugal)
    {
        return new CatalogoResource($estadoConyugal);
    }

    public function update(Request $request, EstadoConyugal $estadoConyugal)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $estadoConyugal->update($data);

        return new CatalogoResource($estadoConyugal);
    }

    public function destroy(EstadoConyugal $estadoConyugal)
    {
        $estadoConyugal->delete();

        return response()->json();
    }
}
