<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\Escolaridad;
use Illuminate\Http\Request;

class EscolaridadController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(Escolaridad::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(Escolaridad::create($data));
    }

    public function show(Escolaridad $escolaridad)
    {
        return new CatalogoResource($escolaridad);
    }

    public function update(Request $request, Escolaridad $escolaridad)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $escolaridad->update($data);

        return new CatalogoResource($escolaridad);
    }

    public function destroy(Escolaridad $escolaridad)
    {
        $escolaridad->delete();

        return response()->json();
    }
}
