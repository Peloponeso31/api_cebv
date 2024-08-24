<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoIntervencionQuirurgicaRequest;
use App\Http\Resources\TipoIntervencionQuirurgicaResource;
use App\Models\TipoIntervencionQuirurgica;

class TipoIntervencionQuirurgicaController extends Controller
{
    public function index()
    {
        return TipoIntervencionQuirurgicaResource::collection(TipoIntervencionQuirurgica::all());
    }

    public function store(TipoIntervencionQuirurgicaRequest $request)
    {
        return new TipoIntervencionQuirurgicaResource(TipoIntervencionQuirurgica::create($request->validated()));
    }

    public function show(TipoIntervencionQuirurgica $tipoIntervencionQuirurgica)
    {
        return new TipoIntervencionQuirurgicaResource($tipoIntervencionQuirurgica);
    }

    public function update(TipoIntervencionQuirurgicaRequest $request, TipoIntervencionQuirurgica $tipoIntervencionQuirurgica)
    {
        $tipoIntervencionQuirurgica->update($request->validated());

        return new TipoIntervencionQuirurgicaResource($tipoIntervencionQuirurgica);
    }

    public function destroy(TipoIntervencionQuirurgica $tipoIntervencionQuirurgica)
    {
        $tipoIntervencionQuirurgica->delete();

        return response()->json();
    }
}
