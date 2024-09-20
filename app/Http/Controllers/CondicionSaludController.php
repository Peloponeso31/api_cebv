<?php

namespace App\Http\Controllers;

use App\Http\Resources\CondicionSaludResource;
use App\Models\CondicionSalud;
use Illuminate\Http\Request;

class CondicionSaludController extends Controller
{
    public function index()
    {
        return CondicionSaludResource::collection(CondicionSalud::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'persona_id' => ['required', 'exists:personas,id'],
            'tipo_condicion_salud_id' => ['required', 'exists:cat_tipos_condiciones_salud,id'],
            'indole_salud' => ['required'],
            'tratamiento' => ['nullable'],
            'observaciones' => ['nullable'],
        ]);

        return new CondicionSaludResource(CondicionSalud::create($data));
    }

    public function show(CondicionSalud $condicionSalud)
    {
        return new CondicionSaludResource($condicionSalud);
    }

    public function update(Request $request, CondicionSalud $condicionSalud)
    {
        $data = $request->validate([
            'persona_id' => ['sometimes', 'exists:personas,id'],
            'tipo_condicion_salud_id' => ['sometimes', 'exists:cat_tipos_condiciones_salud,id'],
            'indole_salud' => ['sometimes'],
            'tratamiento' => ['sometimes'],
            'observaciones' => ['sometimes'],
        ]);

        $condicionSalud->update($data);

        return new CondicionSaludResource($condicionSalud);
    }

    public function destroy(CondicionSalud $condicionSalud)
    {
        $condicionSalud->delete();

        return response()->json();
    }
}
