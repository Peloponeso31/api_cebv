<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\AscendenciaRequest;
use App\Models\Catalogos\Ascendencia;
use Illuminate\Http\Request;

class AscendenciaController extends Controller
{
   
    public function index()
    {
        return Ascendencia::all();
    }

    
    public function store(AscendenciaRequest $request)
    {
        return Ascendencia::create($request->all());
    }

    
    public function show($id)
    {
        return Ascendencia::FindOrFail($id);
    }

    
    public function update($id, AscendenciaRequest $request)
    {
        $ascendencia= Ascendencia::findOrFail($id);
        return $ascendencia->update($request->all());
    }

    
    public function destroy($id)
    {
        return Ascendencia::FindOrFail($id)->delete();
    }
}
