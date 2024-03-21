<?php

namespace App\Http\Controllers\Informaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Informaciones\TipoMedioRequest;
use App\Http\Resources\Informaciones\TipoMedioResource;
use App\Models\Informaciones\TipoMedio;

class TipoMedioController extends Controller
{
    public function index()
    {
        $query = TipoMedio::query();

        if (request()->has('search')) {
            $query = TipoMedio::search(request('search'));
        }

        return TipoMedioResource::collection($query->get());
    }

    public function store(TipoMedioRequest $request)
    {
        return new TipoMedioResource(TipoMedio::create($request->all()));
    }

    public function show(TipoMedio $tipoMedio)
    {
        return new TipoMedioResource($tipoMedio);
    }

    public function update(TipoMedioRequest $request, TipoMedio $tipoMedio)
    {
        $tipoMedio->update($request->all());

        return new TipoMedioResource($tipoMedio);
    }

    public function destroy($id)
    {
        return TipoMedio::destroy($id);
    }
}
