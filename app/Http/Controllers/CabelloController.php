<?php

namespace App\Http\Controllers;

use App\Http\Requests\CabelloRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Cabello;

class CabelloController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(Cabello::all());
    }

    public function store(CabelloRequest $request)
    {
        return new CatalogoResource(Cabello::create($request->validated()));
    }

    public function show(Cabello $cabello)
    {
        return new CatalogoResource($cabello);
    }

    public function update(CabelloRequest $request, Cabello $cabello)
    {
        $cabello->update($request->validated());

        return new CatalogoResource($cabello);
    }

    public function destroy(Cabello $cabello)
    {
        $cabello->delete();

        return response()->json();
    }
}
