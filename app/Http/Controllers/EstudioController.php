<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudioRequest;
use App\Http\Resources\EstudioResource;
use App\Models\Estudio;

class EstudioController extends Controller
{
    public function index()
    {
        return EstudioResource::collection(Estudio::all());
    }

    public function store(EstudioRequest $request)
    {
        return new EstudioResource(Estudio::create($request->validated()));
    }

    public function show(Estudio $estudio)
    {
        return new EstudioResource($estudio);
    }

    public function update(EstudioRequest $request, Estudio $estudio)
    {
        $estudio->update($request->validated());

        return new EstudioResource($estudio);
    }

    public function destroy(Estudio $estudio)
    {
        $estudio->delete();

        return response()->json();
    }
}
