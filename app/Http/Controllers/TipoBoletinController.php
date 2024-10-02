<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoBoletinRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\TipoBoletin;

class TipoBoletinController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(TipoBoletin::all());
    }

    public function store(TipoBoletinRequest $request)
    {
        return new CatalogoResource(TipoBoletin::create($request->validated()));
    }

    public function show(TipoBoletin $tipoBoletin)
    {
        return new CatalogoResource($tipoBoletin);
    }

    public function update(TipoBoletinRequest $request, TipoBoletin $tipoBoletin)
    {
        $tipoBoletin->update($request->validated());

        return new CatalogoResource($tipoBoletin);
    }

    public function destroy(TipoBoletin $tipoBoletin)
    {
        $tipoBoletin->delete();

        return response()->json();
    }
}
