<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\TipoLabiosRequest;
use App\Models\Catalogos\TipoLabios;
use Illuminate\Http\Request;

class TipoLabiosController extends Controller
{
    
    public function index()
    {
       return TipoLabios::all();
    }

    
    public function store(TipoLabiosRequest $request)
    {
        return TipoLabios::create($request->all());
    }

   
    public function show( $id)
    {
        return TipoLabios::FindOrFail($id);
    }

    
    public function update( $id, TipoLabiosRequest $request)
    {
        $tipolabios= TipoLabios::findOrFail($id);
        return $tipolabios->update($request->all());
    }

    public function destroy( $id)
    {
        return TipoLabios::findOrFail($id)->delete();
    }
}
