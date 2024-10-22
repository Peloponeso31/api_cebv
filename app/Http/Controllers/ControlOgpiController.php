<?php

namespace App\Http\Controllers;

use App\Http\Requests\ControlOgpiRequest;
use App\Http\Resources\ControlOgpiResource;
use App\Models\ControlOgpi;

class ControlOgpiController extends Controller
{
    public function index()
    {
        return ControlOgpiResource::collection(ControlOgpi::all());
    }

    public function store(ControlOgpiRequest $request)
    {
        return new ControlOgpiResource(ControlOgpi::create($request->validated()));
    }

    public function show(ControlOgpi $controlOgpi)
    {
        return new ControlOgpiResource($controlOgpi);
    }

    public function update(ControlOgpiRequest $request, ControlOgpi $controlOgpi)
    {
        $controlOgpi->update($request->validated());

        return new ControlOgpiResource($controlOgpi);
    }

    public function destroy(ControlOgpi $controlOgpi)
    {
        $controlOgpi->delete();

        return response()->json();
    }
}
