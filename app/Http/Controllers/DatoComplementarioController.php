<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatoComplementarioRequest;
use App\Http\Resources\DatoComplementarioResource;
use App\Models\DatoComplementario;

class DatoComplementarioController extends Controller
{
    public function index()
    {
        return DatoComplementarioResource::collection(DatoComplementario::all());
    }

    public function store(DatoComplementarioRequest $request)
    {
        return new DatoComplementarioResource(DatoComplementario::create($request->validated()));
    }

    public function show(DatoComplementario $datoComplementario)
    {
        return new DatoComplementarioResource($datoComplementario);
    }

    public function update(DatoComplementarioRequest $request, DatoComplementario $datoComplementario)
    {
        $datoComplementario->update($request->validated());

        return new DatoComplementarioResource($datoComplementario);
    }

    public function destroy(DatoComplementario $datoComplementario)
    {
        $datoComplementario->delete();

        return response()->json();
    }
}
