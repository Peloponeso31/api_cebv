<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\TamanoBocaRequest;
use App\Models\Catalogos\CaracteristicasFisicas\TamanoBoca;
use Illuminate\Http\Request;

class TamanoBocaController extends Controller
{

    public function index()
    {
        return TamanoBoca::all();
    }

    public function store(TamanoBocaRequest $request)
    {
        return TamanoBoca::create($request->all());
    }

    public function show( $id)
    {
        return TamanoBoca::FindOrFail($id);
    }

    public function update( $id, TamanoBocaRequest $request)
    {
        $tamanoboca= TamanoBoca::findOrFail($id);
        return $tamanoboca->update($request->all());
    }

    public function destroy( $id)
    {
        return TamanoBoca::findOrFail($id)->delete();
    }
}
