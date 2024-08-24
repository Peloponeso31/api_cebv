<?php

namespace App\Http\Controllers;

use App\Http\Resources\TamanoCabelloResource;
use App\Models\TamanoCabello;
use Illuminate\Http\Request;

class TamanoCabelloController extends Controller
{
    public function index()
    {
        return TamanoCabelloResource::collection(TamanoCabello::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new TamanoCabelloResource(TamanoCabello::create($data));
    }

    public function show(TamanoCabello $tamanoCabello)
    {
        return new TamanoCabelloResource($tamanoCabello);
    }

    public function update(Request $request, TamanoCabello $tamanoCabello)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tamanoCabello->update($data);

        return new TamanoCabelloResource($tamanoCabello);
    }

    public function destroy(TamanoCabello $tamanoCabello)
    {
        $tamanoCabello->delete();

        return response()->json();
    }
}
