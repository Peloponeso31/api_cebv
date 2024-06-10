<?php

namespace App\Http\Controllers\Catalogos\MediaFiliacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\MediaFiliacion\EspecificacionMentonRequest;
use App\Models\Catalogos\MediaFiliacion\EspecificacionMenton;
use Illuminate\Http\Request;

class EspecificacionMentonController extends Controller
{
    
    public function index()
    {
        return EspecificacionMenton::all();
    }

    public function store(EspecificacionMentonRequest $request)
    {
        return EspecificacionMenton::create($request->all());
    }

    public function show( $id)
    {
        return EspecificacionMenton::FindOrFail($id);
    }

    public function update( $id, EspecificacionMentonRequest $request)
    {
        $especificacionmenton= EspecificacionMenton::findOrFail($id);
        return $especificacionmenton->update($request->all());
    }

    public function destroy( $id)
    {
        return EspecificacionMenton::findOrFail($id)->delete();
    }
}
