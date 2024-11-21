<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocalizacionResource;
use App\Models\Localizacion;
use Illuminate\Http\Request;

class LocalizacionController extends Controller
{
    public function index()
    {
        return LocalizacionResource::collection(Localizacion::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'desaparecido_id' => ['required', 'exists:desaparecidos'],
            'sitio_id' => ['nullable', 'exists:cat_sitios'],
            'area_id' => ['nullable', 'exists:cat_areas'],
            'fecha_localizacion' => ['nullable', 'date'],
            'fecha_hallazgo' => ['nullable', 'date'],
            'fecha_identificacion_familiar' => ['nullable', 'date'],
            'sintesis_localizacion' => ['nullable'],
            'descripcion_condicion_persona' => ['nullable'],
            'descripcion_causas_fallecimiento' => ['required'],
            'municipio_localizacion_id' => ['nullable', 'exists:cat_municipios'],
        ]);

        return new LocalizacionResource(Localizacion::create($data));
    }

    public function show(Localizacion $localizacion)
    {
        return new LocalizacionResource($localizacion);
    }

    public function update(Request $request, Localizacion $localizacion)
    {
        $data = $request->validate([
            'desaparecido_id' => ['required', 'exists:desaparecidos'],
            'sitio_id' => ['nullable', 'exists:cat_sitios'],
            'area_id' => ['nullable', 'exists:cat_areas'],
            'fecha_localizacion' => ['nullable', 'date'],
            'fecha_hallazgo' => ['nullable', 'date'],
            'fecha_identificacion_familiar' => ['nullable', 'date'],
            'sintesis_localizacion' => ['nullable'],
            'descripcion_condicion_persona' => ['nullable'],
            'descripcion_causas_fallecimiento' => ['required'],
            'municipio_localizacion_id' => ['nullable', 'exists:cat_municipios'],
        ]);

        $localizacion->update($data);

        return new LocalizacionResource($localizacion);
    }

    public function destroy(Localizacion $localizacion)
    {
        $localizacion->delete();

        return response()->json();
    }
}
