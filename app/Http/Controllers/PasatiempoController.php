<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasatiempoRequest;
use App\Http\Resources\PasatiempoResource;
use App\Models\Pasatiempo;

class PasatiempoController extends Controller
{
    public function index()
    {
        return PasatiempoResource::collection(Pasatiempo::all());
    }

    public function store(PasatiempoRequest $request)
    {
        return new PasatiempoResource(Pasatiempo::create($request->validated()));
    }

    public function show(Pasatiempo $pasatiempo)
    {
        return new PasatiempoResource($pasatiempo);
    }

    public function update(PasatiempoRequest $request, Pasatiempo $pasatiempo)
    {
        $pasatiempo->update($request->validated());

        return new PasatiempoResource($pasatiempo);
    }

    public function destroy(Pasatiempo $pasatiempo)
    {
        $pasatiempo->delete();

        return response()->json();
    }
}
