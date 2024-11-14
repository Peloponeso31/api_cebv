<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrejaRequest;
use App\Http\Resources\OrejaResource;
use App\Models\Oreja;

class OrejaController extends Controller
{
    public function index()
    {
        return OrejaResource::collection(Oreja::all());
    }

    public function store(OrejaRequest $request)
    {
        return new OrejaResource(Oreja::create($request->validated()));
    }

    public function show(Oreja $oreja)
    {
        return new OrejaResource($oreja);
    }

    public function update(OrejaRequest $request, Oreja $oreja)
    {
        $oreja->update($request->validated());

        return new OrejaResource($oreja);
    }

    public function destroy(Oreja $oreja)
    {
        $oreja->delete();

        return response()->json();
    }
}
