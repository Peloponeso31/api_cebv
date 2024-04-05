<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\LenguaRequest;
use App\Models\Catalogos\Lengua;
use Illuminate\Http\Request;

class LenguaController extends Controller
{
    
    public function index()
    {
        return Lengua::all();
    }

    
    public function store(LenguaRequest $request)
    {
        return Lengua::create($request->all());
    }

   
    public function show( $id)
    {
        return Lengua::FindOrFail($id);
    }


    public function update($id, LenguaRequest $request)
    {
        $lengua= Lengua::findOrFail($id);
        return $lengua->update($request->all());
    }

    
    public function destroy( $id)
    {
        return Lengua::findOrFail($id)->delete();
    }
}
