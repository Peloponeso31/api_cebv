<?php

namespace App\Http\Controllers\Catalogos\Etnia;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\Etnia\VestimentaRequest;
use App\Models\Catalogos\Etnia\Vestimenta;
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
