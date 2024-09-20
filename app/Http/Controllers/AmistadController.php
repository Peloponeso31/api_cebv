<?php

namespace App\Http\Controllers;

use App\Http\Requests\AmistadRequest;
use App\Http\Resources\AmistadResource;
use App\Models\Amistad;

class AmistadController extends Controller
{
    public function index()
    {
        return AmistadResource::collection(Amistad::all());
    }

    public function store(AmistadRequest $request)
    {
        return new AmistadResource(Amistad::create($request->validated()));
    }

    public function show(Amistad $amistad)
    {
        return new AmistadResource($amistad);
    }

    public function update(AmistadRequest $request, Amistad $amistad)
    {
        $amistad->update($request->validated());

        return new AmistadResource($amistad);
    }

    public function destroy(Amistad $amistad)
    {
        $amistad->delete();

        return response()->json();
    }
}
