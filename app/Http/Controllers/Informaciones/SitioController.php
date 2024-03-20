<?php

namespace App\Http\Controllers\Informaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Informaciones\SitioRequest;
use App\Http\Resources\Informaciones\SitioResource;
use App\Models\Informaciones\Sitio;

class SitioController extends Controller
{
    public function index()
    {
        return SitioResource::collection(Sitio::all());
    }

    public function store(SitioRequest $request)
    {
        return new SitioResource(Sitio::create($request->validated()));
    }

    public function show(Sitio $sitio)
    {
        return new SitioResource($sitio);
    }

    public function update(SitioRequest $request, Sitio $sitio)
    {
        $sitio->update($request->validated());

        return new SitioResource($sitio);
    }

    public function destroy(Sitio $sitio)
    {
        $sitio->delete();

        return response()->json();
    }
}
