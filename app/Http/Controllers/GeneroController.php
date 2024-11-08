<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::withGenerosCount()->orderby('personas_count','desc')->get();
        return CatalogoResource::collection($generos);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(Genero::create($data));
    }

    public function show(Genero $genero)
    {
        return new CatalogoResource($genero);
    }

    public function update(Request $request, Genero $genero)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $genero->update($data);

        return new CatalogoResource($genero);
    }

    public function destroy(Genero $genero)
    {
        $genero->delete();

        return response()->json();
    }
}
