<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\EspecificacionOrejaRequest;
use App\Models\Catalogos\CaracteristicasFisicas\EspecificacionOreja;
use Illuminate\Http\Request;

class EspecificacionOrejaController extends Controller
{
   
    public function index()
    {
        return EspecificacionOreja::all();
    }

    public function store(EspecificacionOrejaRequest $request)
    {
        return EspecificacionOreja::create($request->all());
    }

    public function show( $id)
    {
        return EspecificacionOreja::FindOrFail($id);
    }

    public function update( $id, EspecificacionOrejaRequest $request)
    {
        $especificacionureja= EspecificacionOreja::findOrFail($id);
        return $especificacionoreja->update($request->all());
    }

    public function destroy( $id)
    {
        return EspecificacionOreja::findOrFail($id)->delete();
    }
}
