<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\TamanoOrejasRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Catalogos\CaracteristicasFisicas\TamanoOrejas;

class TamanoOrejasController extends Controller
{
    public function index()
    {
        $tamanoorejas = TamanoOrejas::withTamanosorejasCount()->orderBy('orejas_count','desc')->get();

        return CatalogoResource::collection($tamanoorejas);
    }

    public function store(TamanoOrejasRequest $request)
    {
        return TamanoOrejas::create($request->all());
    }

    public function show($id)
    {
        return TamanoOrejas::FindOrFail($id);
    }

    public function update($id, TamanoOrejasRequest $request)
    {
        $tamanoorejas = TamanoOrejas::findOrFail($id);
        return $tamanoorejas->update($request->all());
    }

    public function destroy($id)
    {
        return TamanoOrejas::findOrFail($id)->delete();
    }
}
