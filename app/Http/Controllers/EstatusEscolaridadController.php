<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstatusEscolaridadRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\EstatusEscolaridad;

class EstatusEscolaridadController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(EstatusEscolaridad::all());
    }

    public function store(EstatusEscolaridadRequest $request)
    {
        return new CatalogoResource(EstatusEscolaridad::create($request->validated()));
    }

    public function show(EstatusEscolaridad $estatusEscolaridad)
    {
        return new CatalogoResource($estatusEscolaridad);
    }

    public function update(EstatusEscolaridadRequest $request, EstatusEscolaridad $estatusEscolaridad)
    {
        $estatusEscolaridad->update($request->validated());

        return new CatalogoResource($estatusEscolaridad);
    }

    public function destroy(EstatusEscolaridad $estatusEscolaridad)
    {
        $estatusEscolaridad->delete();

        return response()->json();
    }
}
