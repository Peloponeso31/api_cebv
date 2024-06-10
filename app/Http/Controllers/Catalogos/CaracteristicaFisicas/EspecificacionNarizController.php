<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\EspecificacionNarizRequest;
use App\Models\Catalogos\CaracteristicasFisicas\EspecificacionNariz;
use Illuminate\Http\Request;

class EspecificacionNarizController extends Controller
{

    public function index()
    {
        return EspecificacionNariz::all();
    }

    public function store(EspecificacionNarizRequest $request)
    {
        return EspecificacionNariz::create($request->all());
    }

    public function show( $id)
    {
        return EspecificacionNariz::FindOrFail($id);
    }

    public function update( $id, EspecificacionNarizRequest $request)
    {
        $especificacionnariz= EspecificacionNariz::findOrFail($id);
        return $especificacionnariz->update($request->all());
    }

    public function destroy( $id)
    {
        return EspecificacionNariz::findOrFail($id)->delete();
    }
}
