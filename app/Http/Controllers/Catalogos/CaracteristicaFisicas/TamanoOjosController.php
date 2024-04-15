<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\TamanoOjosRequest;
use App\Models\Catalogos\CaracteristicasFisicas\TamanoOjos;
use Illuminate\Http\Request;

class TamanoOjosController extends Controller
{
   
    public function index()
    {
        return TamanoOjos::all();
    }

   
    public function store(TamanoOjosRequest $request)
    {
        return TamanoOjos::create($request->all());
    }

    
    public function show( $id)
    {
        return TamanoOjos::FindOrFail($id);
    }

    public function update( $id, TamanoOjosRequest $request)
    {
        $tamanoojos= TamanoOjos::findOrFail($id);
        return $tamanoojos->update($request->all());
    }

    
    public function destroy( $id)
    {
        return TamanoOjos::findOrFail($id)->delete();
    }
}
