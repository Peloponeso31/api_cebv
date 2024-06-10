<?php

namespace App\Http\Controllers\Catalogos\MediaFiliacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\MediaFiliacion\TipoMentonRequest;
use App\Models\Catalogos\MediaFiliacion\IntervencionQuirurgica;
use Illuminate\Http\Request;

class IntervencionQuirurgicaController extends Controller
{
   
    public function index()
    {
        return IntervencionQuirurgica::all();
    }

    public function store(IntervencionQuirurgicaRequest $request)
    {
        return IntervencionQuirurgica::create($request->all());
    }

    public function show( $id)
    {
        return IntervencionQuirurgica::FindOrFail($id);
    }

    public function update( $id, IntervencionQuirurgicaRequest $request)
    {
        $intervencionquirurgica= IntervencionQuirurgica::findOrFail($id);
        return $intervencionquirurgica->update($request->all());
    }

    public function destroy( $id)
    {
        return IntervencionQuirurgica::findOrFail($id)->delete();
    }
}
