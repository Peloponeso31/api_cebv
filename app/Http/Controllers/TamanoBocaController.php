<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\TamanoBoca;
use Illuminate\Http\Request;

class TamanoBocaController extends Controller
{
    public function index()
    {
        $tamanosbocas = TamanoBoca::withTamanosbocasCount()->orderBy('bocas_count','desc')->get();

        return CatalogoResource::collection($tamanosbocas);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(TamanoBoca::create($data));
    }

    public function show(TamanoBoca $tamanoBoca)
    {
        return new CatalogoResource($tamanoBoca);
    }

    public function update(Request $request, TamanoBoca $tamanoBoca)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tamanoBoca->update($data);

        return new CatalogoResource($tamanoBoca);
    }

    public function destroy(TamanoBoca $tamanoBoca)
    {
        $tamanoBoca->delete();

        return response()->json();
    }
}
