<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\EspecificacionBarbaRequest;
use App\Models\Catalogos\CaracteristicasFisicas\EspecificacionBarba;
use Illuminate\Http\Request;

class EspecificacionBarbaController extends Controller
{

    public function index()
    {
        return EspecificacionBarba::all();
    }

    public function store(EspecificacionBarbaRequest $request)
    {
        return EspecificacionBarba::create($request->all());
    }

    public function show( $id)
    {
        return EspecificacionBarba::FindOrFail($id);
    }

    public function update( $id, EspecificacionBarbaRequest $request)
    {
        $especificacionbarba= EspecificacionBarba::findOrFail($id);
        return $especificacionbarba->update($request->all());
    }

    public function destroy( $id)
    {
        return EspecificacionBarba::findOrFail($id)->delete();
    }
}
