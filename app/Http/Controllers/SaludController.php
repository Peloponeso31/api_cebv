<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaludRequest;
use App\Http\Resources\SaludResource;
use App\Models\Salud;

class SaludController extends Controller
{
    public function index()
    {
        return SaludResource::collection(Salud::all());
    }

    public function store(SaludRequest $request)
    {
        return new SaludResource(Salud::create($request->validated()));
    }

    public function show(Salud $salud)
    {
        return new SaludResource($salud);
    }

    public function update(SaludRequest $request, Salud $salud)
    {
        $salud->update($request->validated());

        return new SaludResource($salud);
    }

    public function destroy(Salud $salud)
    {
        $salud->delete();

        return response()->json();
    }
}
