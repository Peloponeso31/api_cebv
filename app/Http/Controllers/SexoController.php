<?php

namespace App\Http\Controllers;

use App\Http\Resources\SexoResource;
use App\Models\Sexo;
use Illuminate\Http\Request;

class SexoController extends Controller
{
    public function index()
    {
        return SexoResource::collection(Sexo::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new SexoResource(Sexo::create($data));
    }

    public function show(Sexo $sexo)
    {
        return new SexoResource($sexo);
    }

    public function update(Request $request, Sexo $sexo)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $sexo->update($data);

        return new SexoResource($sexo);
    }

    public function destroy(Sexo $sexo)
    {
        $sexo->delete();

        return response()->json();
    }
}
