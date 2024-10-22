<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\TipoLabiosRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Catalogos\CaracteristicasFisicas\TipoLabios;

class TipoLabiosController extends Controller
{
    public function index()
    {
       return CatalogoResource::collection(TipoLabios::all());
    }

    public function store(TipoLabiosRequest $request)
    {
        return TipoLabios::create($request->all());
    }

    public function show( $id)
    {
        return TipoLabios::FindOrFail($id);
    }

    public function update( $id, TipoLabiosRequest $request)
    {
        $tipolabios= TipoLabios::findOrFail($id);
        return $tipolabios->update($request->all());
    }

    public function destroy( $id)
    {
        return TipoLabios::findOrFail($id)->delete();
    }
}
