<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\EspecificacionCabelloRequest
use App\Models\Catalogos\CaracteristicasFisicas\EspecificacionCabello;
use Illuminate\Http\Request;

class EspecificacionCabelloController extends Controller
{

    public function index()
    {
        return EspecificacionCabello::all();
    }

    public function store(EspecificacionCabelloRequest $request)
    {
        return EspecificacionCabello::create($request->all());
    }

    public function show( $id)
    {
        return EspecificacionCabello::FindOrFail($id);
    }

    public function update( $id, EspecificacionCabelloRequest $request)
    {
        $especificacioncabello= EspecificacionCabello::findOrFail($id);
        return $especificacioncabello->update($request->all());
    }

    public function destroy( $id)
    {
        return EspecificacionCabello::findOrFail($id)->delete();
    }
}
