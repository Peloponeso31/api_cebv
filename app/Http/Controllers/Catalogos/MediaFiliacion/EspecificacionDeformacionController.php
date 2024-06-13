<?php

namespace App\Http\Controllers\Catalogos\MediaFiliacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\MediaFiliacion\EspecificacionDeformacionRequest;
use App\Models\Catalogos\MediaFiliacion\EspecificacionDeformacion;
use Illuminate\Http\Request;

class EspecificacionDeformacionController extends Controller
{

    public function index()
    {
        return EspecificacionDeformacion::all();
    }

    public function store(EspecificacionDeformacionRequest $request)
    {
        return EspecificacionDeformacion::create($request->all());
    }

    public function show( $id)
    {
        return EspecificacionDeformacion::FindOrFail($id);
    }

    public function update( $id, EspecificacionDeformacionRequest $request)
    {
        $especificaciondeformacion= EspecificacionDeformacion::findOrFail($id);
        return $especificaciondeformacion->update($request->all());
    }

    public function destroy( $id)
    {
        return EspecificacionDeformacion::findOrFail($id)->delete();
    }
}
