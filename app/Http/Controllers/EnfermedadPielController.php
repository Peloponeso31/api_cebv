<?php

namespace App\Http\Controllers;

use App\Http\Resources\EnfermedadPielResource;
use App\Models\EnfermedadPiel;
use Illuminate\Http\Request;

class EnfermedadPielController extends Controller
{
    public function index()
    {
        return EnfermedadPielResource::collection(EnfermedadPiel::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'persona_id' => ['required', 'exists:personas,id'],
            'tipo_enfermedad_piel_id' => ['required', 'exists:cat_tipos_enfermedades_piel,id'],
            'descripcion' => ['nullable'],
        ]);

        return new EnfermedadPielResource(EnfermedadPiel::create($data));
    }

    public function show(EnfermedadPiel $enfermedadPiel)
    {
        return new EnfermedadPielResource($enfermedadPiel);
    }

    public function update(Request $request, EnfermedadPiel $enfermedadPiel)
    {
        $data = $request->validate([
            'persona_id' => ['sometimes', 'exists:personas,id'],
            'tipo_enfermedad_piel_id' => ['sometimes', 'exists:cat_tipos_enfermedades_piel,id'],
            'descripcion' => ['sometimes'],
        ]);

        $enfermedadPiel->update($data);

        return new EnfermedadPielResource($enfermedadPiel);
    }

    public function destroy(EnfermedadPiel $enfermedadPiel)
    {
        $enfermedadPiel->delete();

        return response()->json();
    }
}
