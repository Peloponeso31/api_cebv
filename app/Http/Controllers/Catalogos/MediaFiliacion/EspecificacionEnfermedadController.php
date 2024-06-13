<?php

namespace App\Http\Controllers\Catalogos\MediaFiliacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\MediaFiliacion\EspecificacionEnfermedadRequest;
use App\Models\Catalogos\MediaFiliacion\EspecificacionEnfermedad;
use Illuminate\Http\Request;

class EspecificacionEnfermedadController extends Controller
{
   
    public function index()
    {
        return EspecificacionEnfermedad::all();
    }

    public function store(EspecificacionEnfermedadRequest $request)
    {
        return EspecificacionEnfermedad::create($request->all());
    }

    public function show( $id)
    {
        return EspecificacionEnfermedad::FindOrFail($id);
    }

    public function update( $id, EspecificacionEnfermedadRequest $request)
    {
        $especificacionenfermedad= EspecificacionEnfermedad::findOrFail($id);
        return $especificacionenfermedad->update($request->all());
    }

    public function destroy( $id)
    {
        return EspecificacionEnfermedad::findOrFail($id)->delete();
    }
}
