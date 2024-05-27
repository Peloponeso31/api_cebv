<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\ColorPielRequest;
use App\Models\Catalogos\ColorPiel;
use Illuminate\Http\Request;

class ColorPielController extends Controller
{
    
    public function index()
    {
        return ColorPiel::all();
    }

    
    public function store(ColorPielRequest $request)
    {
        return ColorPiel::create($request->all());
    }

    
    public function show( $id)
    {
        return ColorPiel::FindOrFail($id);
    }

   
    public function update($id, ColorPielRequest $request)
    {
        $colorpiel= ColorPiel::findOrFail($id);
        return $colorpiel->update($request->all());
    }

   
    public function destroy( $id)
    {
        return ColorPiel::findOrFail($id)->delete();
    }
}
