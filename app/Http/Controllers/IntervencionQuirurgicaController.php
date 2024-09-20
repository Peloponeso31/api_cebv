<?php

namespace App\Http\Controllers;

use App\Http\Resources\IntervencionQuirurgicaResource;
use App\Models\IntervencionQuirurgica;
use Illuminate\Http\Request;

class IntervencionQuirurgicaController extends Controller
{
    public function index()
    {
        return IntervencionQuirurgicaResource::collection(IntervencionQuirurgica::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'persona_id' => ['required'],
            'tipo_intervencion_quirurgica_id' => ['required'],
            'descripcion' => ['nullable'],
        ]);

        return new IntervencionQuirurgicaResource(IntervencionQuirurgica::create($data));
    }

    public function show(IntervencionQuirurgica $intervencionQuirurgica)
    {
        return new IntervencionQuirurgicaResource($intervencionQuirurgica);
    }

    public function update(Request $request, IntervencionQuirurgica $intervencionQuirurgica)
    {
        $data = $request->validate([
            'persona_id' => ['sometimes'],
            'tipo_intervencion_quirurgica_id' => ['sometimes'],
            'descripcion' => ['sometimes'],
        ]);

        $intervencionQuirurgica->update($data);

        return new IntervencionQuirurgicaResource($intervencionQuirurgica);
    }

    public function destroy(IntervencionQuirurgica $intervencionQuirurgica)
    {
        $intervencionQuirurgica->delete();

        return response()->json();
    }
}
