<?php

namespace App\Http\Controllers;

use App\Models\Desaparicion;
use Illuminate\Http\Request;

class DesaparicionController extends Controller
{
    public function index()
    {
        return Desaparicion::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'persona_id' => ['required', 'integer'],
            'dependencia_id' => ['required', 'integer'],
            'ubicacion_id' => ['required', 'integer'],
            'fecha_desaparicion' => ['nullable', 'date'],
            'fecha_percato' => ['nullable', 'date'],
            'zona_estado' => ['required'],
            'area_id' => ['required', 'integer'],
            'fue_amenazado' => ['boolean'],
            'descripcion_amenaza' => ['nullable'],
            'contador_desaparicion' => ['required', 'integer'],
            'hechos_desaparicion' => ['nullable'],
            'sintesis_desaparicion' => ['nullable'],
        ]);

        return Desaparicion::create($data);
    }

    public function show(Desaparicion $desaparicion)
    {
        return $desaparicion;
    }

    public function update(Request $request, Desaparicion $desaparicion)
    {
        $data = $request->validate([
            'persona_id' => ['required', 'integer'],
            'dependencia_id' => ['required', 'integer'],
            'ubicacion_id' => ['required', 'integer'],
            'fecha_desaparicion' => ['nullable', 'date'],
            'fecha_percato' => ['nullable', 'date'],
            'zona_estado' => ['required'],
            'area_id' => ['required', 'integer'],
            'fue_amenazado' => ['boolean'],
            'descripcion_amenaza' => ['nullable'],
            'contador_desaparicion' => ['required', 'integer'],
            'hechos_desaparicion' => ['nullable'],
            'sintesis_desaparicion' => ['nullable'],
        ]);

        $desaparicion->update($data);

        return $desaparicion;
    }

    public function destroy(Desaparicion $desaparicion)
    {
        $desaparicion->delete();

        return response()->json();
    }
}
