<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\TamanoOjosRequest;
use App\Models\Catalogos\TamanoOjos;
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
