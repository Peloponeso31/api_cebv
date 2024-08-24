<?php

namespace App\Http\Controllers;

use App\Http\Resources\TamanoBocaResource;
use App\Models\TamanoBoca;
use Illuminate\Http\Request;

class TamanoBocaController extends Controller
{
    public function index()
    {
        return TamanoBocaResource::collection(TamanoBoca::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new TamanoBocaResource(TamanoBoca::create($data));
    }

    public function show(TamanoBoca $tamanoBoca)
    {
        return new TamanoBocaResource($tamanoBoca);
    }

    public function update(Request $request, TamanoBoca $tamanoBoca)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tamanoBoca->update($data);

        return new TamanoBocaResource($tamanoBoca);
    }

    public function destroy(TamanoBoca $tamanoBoca)
    {
        $tamanoBoca->delete();

        return response()->json();
    }
}
