<?php

namespace App\Http\Controllers\Catalogos\MediaFiliacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\MediaFiliacion\EspecificacionIntervencionQuirurgicaRequest;
use App\Models\Catalogos\MediaFiliacion\EspecificacionIntervencionQuirurgica;
use Illuminate\Http\Request;

class EspecificacionIntervencionQuirurgicaController extends Controller
{
    
    public function index()
    {
        return EspecificacionIntervencionQuirurgica::all();
    }

    public function store(EspecificacionIntervencionQuirurgicaRequest $request)
    {
        return EspecificacionIntervencionQuirurgica::create($request->all());
    }

    public function show( $id)
    {
        return EspecificacionIntervencionQuirurgica::FindOrFail($id);
    }

    public function update( $id, EspecificacionIntervencionQuirurgicaRequest $request)
    {
        $especificacionintervencionquirurgica= EspecificacionIntervencionQuirurgica::findOrFail($id);
        return $especificacionintervencionquirurgica->update($request->all());
    }

    public function destroy( $id)
    {
        return EspecificacionIntervencionQuirurgica::findOrFail($id)->delete();
    }
}
