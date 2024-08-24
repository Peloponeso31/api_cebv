<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstatusEscolaridadRequest;
use App\Http\Resources\EstatusEscolaridadResource;
use App\Models\EstatusEscolaridad;

class EstatusEscolaridadController extends Controller
{
    public function index()
    {
        return EstatusEscolaridadResource::collection(EstatusEscolaridad::all());
    }

    public function store(EstatusEscolaridadRequest $request)
    {
        return new EstatusEscolaridadResource(EstatusEscolaridad::create($request->validated()));
    }

    public function show(EstatusEscolaridad $estatusEscolaridad)
    {
        return new EstatusEscolaridadResource($estatusEscolaridad);
    }

    public function update(EstatusEscolaridadRequest $request, EstatusEscolaridad $estatusEscolaridad)
    {
        $estatusEscolaridad->update($request->validated());

        return new EstatusEscolaridadResource($estatusEscolaridad);
    }

    public function destroy(EstatusEscolaridad $estatusEscolaridad)
    {
        $estatusEscolaridad->delete();

        return response()->json();
    }
}
