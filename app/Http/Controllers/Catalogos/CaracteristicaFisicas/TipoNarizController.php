<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\TipoNarizRequest;
use App\Http\Resources\TipoNarizResource;
use App\Models\Catalogos\CaracteristicasFisicas\TipoNariz;
use Illuminate\Http\Request;

class TipoNarizController extends Controller
{

    public function index()
    {
        return TipoNarizResource::collection(TipoNariz::all());
    }


    public function store(TipoNarizRequest $request)
    {
        return TipoNariz::create($request->all());
    }


    public function show( $id)
    {
        return TipoNariz::FindOrFail($id);
    }

    public function update( $id, TipoNarizRequest $request)
    {
        $tiponariz= TipoNariz::findOrFail($id);
        return $tiponariz->update($request->all());
    }

    public function destroy( $id)
    {
        return TipoNariz::findOrFail($id)->delete();
    }
}
