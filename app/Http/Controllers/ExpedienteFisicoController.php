<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpedienteFisicoRequest;
use App\Http\Resources\ExpedienteFisicoResource;
use App\Models\ExpedienteFisico;

class ExpedienteFisicoController extends Controller
{
    public function index()
    {
        return ExpedienteFisicoResource::collection(ExpedienteFisico::all());
    }

    public function store(ExpedienteFisicoRequest $request)
    {
        return new ExpedienteFisicoResource(ExpedienteFisico::create($request->validated()));
    }

    public function show(ExpedienteFisico $expedienteFisico)
    {
        return new ExpedienteFisicoResource($expedienteFisico);
    }

    public function update(ExpedienteFisicoRequest $request, ExpedienteFisico $expedienteFisico)
    {
        $expedienteFisico->update($request->validated());

        return new ExpedienteFisicoResource($expedienteFisico);
    }

    public function destroy(ExpedienteFisico $expedienteFisico)
    {
        $expedienteFisico->delete();

        return response()->json();
    }
}
