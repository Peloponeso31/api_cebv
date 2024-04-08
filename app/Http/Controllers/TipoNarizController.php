<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\TipoNarizRequest;
use App\Models\Catalogos\TipoNariz;
use Illuminate\Http\Request;

class TipoNarizController extends Controller
{
    
    public function index()
    {
        return TipoNariz::all();
    }

   
    public function store(TipoNarizRequest $request)
    {
        return TipoNariz::create($request->all());  
    }

    
    public function show( $id)
    {
        return TipoNariz::FindOrFail($id);
    }

    public function update( $id, TipoNarizRequest $request)
    {
        $tiponariz= TipoNariz::findOrFail($id);
        return $tiponariz->update($request->all());
    }

    public function destroy( $id)
    {
        return TipoNariz::findOrFail($id)->delete();
    }
}
