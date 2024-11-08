<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\TamanoCabello;
use Illuminate\Http\Request;

class TamanoCabelloController extends Controller
{
    public function index()
    {
        $tamanoscabellos = TamanoCabello::withTamanoscabellosCount()->orderBy('cabellos_count','desc')->get();

        return CatalogoResource::collection($tamanoscabellos);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(TamanoCabello::create($data));
    }

    public function show(TamanoCabello $tamanoCabello)
    {
        return new CatalogoResource($tamanoCabello);
    }

    public function update(Request $request, TamanoCabello $tamanoCabello)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tamanoCabello->update($data);

        return new CatalogoResource($tamanoCabello);
    }

    public function destroy(TamanoCabello $tamanoCabello)
    {
        $tamanoCabello->delete();

        return response()->json();
    }
}
