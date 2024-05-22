<?php

namespace App\Http\Controllers;

use App\Http\Resources\GeneroResource;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        return GeneroResource::collection(Genero::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new GeneroResource(Genero::create($data));
    }

    public function show(Genero $genero)
    {
        return new GeneroResource($genero);
    }

    public function update(Request $request, Genero $genero)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $genero->update($data);

        return new GeneroResource($genero);
    }

    public function destroy(Genero $genero)
    {
        $genero->delete();

        return response()->json();
    }
}
