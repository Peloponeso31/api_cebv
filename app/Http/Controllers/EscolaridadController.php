<?php

namespace App\Http\Controllers;

use App\Http\Resources\EscolaridadResource;
use App\Models\Escolaridad;
use Illuminate\Http\Request;

class EscolaridadController extends Controller
{
    public function index()
    {
        return EscolaridadResource::collection(Escolaridad::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new EscolaridadResource(Escolaridad::create($data));
    }

    public function show(Escolaridad $escolaridad)
    {
        return new EscolaridadResource($escolaridad);
    }

    public function update(Request $request, Escolaridad $escolaridad)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $escolaridad->update($data);

        return new EscolaridadResource($escolaridad);
    }

    public function destroy(Escolaridad $escolaridad)
    {
        $escolaridad->delete();

        return response()->json();
    }
}
