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
        $query = Sitio::query();

        if (request()->has('search')) {
            $query = Sitio::search(request('search'));
        }

        return SitioResource::collection($query->get());
    }

    public function store(SitioRequest $request)
    {
        return new SitioResource(Sitio::create($request->all()));
    }

    public function show(Sitio $sitio)
    {
        return new SitioResource($sitio);
    }

    public function update(SitioRequest $request, Sitio $sitio)
    {
        $sitio->update($request->all());

        return new SitioResource($sitio);
    }

    public function destroy(Sitio $sitio)
    {
        $sitio->delete();

        return response()->json();
    }
}
