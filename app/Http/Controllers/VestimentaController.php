<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\VestimentaRequest;
use App\Models\Catalogos\Vestimenta;
use Illuminate\Http\Request;

class VestimentaController extends Controller
{
    
    public function index()
    {
        return Vestimenta::all();
    }

   
    public function store(VestimentaRequest $request)
    {
        
        return Vestimenta::create($request->all()); 
    }

    
    public function show( $id)
    {
        return Vestimenta::FindOrFail($id);
    }
    
    public function update( $id, VestimentaRequest $request)
    {
        $vestimenta= Vestimenta::findOrFail($id);
        return $vestimenta->update($request->all());
    }

    public function destroy( $id)
    {
        return Vestimenta::findOrFail($id)->delete();
    }
}
