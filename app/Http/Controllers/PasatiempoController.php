<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasatiempoRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Pasatiempo;

class PasatiempoController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(Pasatiempo::all());
    }

    public function store(PasatiempoRequest $request)
    {
        return new CatalogoResource(Pasatiempo::create($request->validated()));
    }

    public function show(Pasatiempo $pasatiempo)
    {
        return new CatalogoResource($pasatiempo);
    }

    public function update(PasatiempoRequest $request, Pasatiempo $pasatiempo)
    {
        $pasatiempo->update($request->validated());

        return new CatalogoResource($pasatiempo);
    }

    public function destroy(Pasatiempo $pasatiempo)
    {
        $pasatiempo->delete();

        return response()->json();
    }
}
