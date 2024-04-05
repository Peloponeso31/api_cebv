<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\ComplexionRequest;
use App\Models\Catalogos\Complexion;
use Illuminate\Http\Request;

class ComplexionController extends Controller
{
   
    public function index()
    {
        return Complexion::all();
    }

  
    public function store(ComplexionRequest $request)
    {
        return Complexion::create($request->all());
    }

  
    public function show($id)
    {
        return Complexion::FindOrFail($id);
    }

    
    public function update( $id, ComplexionRequest $request)
    {
        $complexion= Complexion::findOrFail($id);
        return $complexion->update($request->all());
    }

    
    public function destroy( $id)
    {
        return Complexion::findOrFail($id)->delete();
    }
}
