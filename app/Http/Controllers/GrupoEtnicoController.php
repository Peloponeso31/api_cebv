<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\GrupoEtnicoRequest;
use App\Models\Catalogos\GrupoEtnico;
use Illuminate\Http\Request;

class GrupoEtnicoController extends Controller
{
   
    public function index()
    {
        return GrupoEtnico::all();
    }

    
    public function store(GrupoEtnicoRequest $request)
    {
        return GrupoEtnico::create($request->all());
    }

    
    public function show( $id)
    {
        return GrupoEtnico::FindOrFail($id);
    }

   
    public function update($id, GrupoEtnicoRequest $request)
    {
        $grupoetnico= GrupoEtnico::findOrFail($id);
        return $grupoetnico->update($request->all());
    }

    public function destroy($id)
    {
        return GrupoEtnico::findOrFail($id)->delete();
    }
}
