<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\EspecificacionOjosRequest;
use App\Models\Catalogos\CaracteristicasFisicas\EspecificacionOjos;
use Illuminate\Http\Request;

class EspecificacionOjosController extends Controller
{
    public function index()
    {
        return EspecificacionOjos::all();
    }

    public function store(EspecificacionOjosRequest $request)
    {
        return EspecificacionOjos::create($request->all());
    }

    public function show( $id)
    {
        return EspecificacionOjos::FindOrFail($id);
    }


    public function update($id, EspecificacionOjosRequest $request)
    {
        $especificacionojos= EspecificacionOjos::findOrFail($id);
        return $especificacionojos->update($request->all());
    }

    public function destroy($id)
    {
        return EspecificacionOjos::findOrFail($id)->delete();
    }
}
