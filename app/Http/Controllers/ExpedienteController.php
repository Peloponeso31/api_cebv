<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpedienteRequest;
use App\Http\Resources\ExpedienteResource;
use App\Models\Expediente;

class ExpedienteController extends Controller
{
    public function index()
    {
        return ExpedienteResource::collection(Expediente::all());
    }

    public function store(ExpedienteRequest $request)
    {
        return new ExpedienteResource(Expediente::create($request->validated()));
    }

    public function show(Expediente $expediente)
    {
        return new ExpedienteResource($expediente);
    }

    public function update(ExpedienteRequest $request, Expediente $expediente)
    {
        $expediente->update($request->validated());

        return new ExpedienteResource($expediente);
    }

    public function destroy(Expediente $expediente)
    {
        $expediente->delete();

        return response()->json();
    }
}
