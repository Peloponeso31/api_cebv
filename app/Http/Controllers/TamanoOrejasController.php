<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\TamanoOrejasRequest;
use App\Models\Catalogos\TamanoOjos;
use App\Models\Catalogos\TamanoOrejas;
use Illuminate\Http\Request;

class TamanoOrejasController extends Controller
{
    
    public function index()
    {
        return TamanoOrejas::all();
    }

  
    
    public function store(TamanoOrejasRequest $request)
    {
        return TamanoOrejas::create($request->all());
    }

    
    public function show( $id)
    {
        return TamanoOrejas::FindOrFail($id);
    }

  
    
    public function update($id, TamanoOrejasRequest $request)
    {
        $tamanoorejas= TamanoOrejas::findOrFail($id);
        return $tamanoorejas->update($request->all());
    }

    public function destroy( $id)
    {
        
    return TamanoOrejas::findOrFail($id)->delete();

    }
}
