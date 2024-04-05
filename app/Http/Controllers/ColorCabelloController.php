<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\ColorCabelloRequest;
use App\Models\Catalogos\ColorCabello;
use Illuminate\Http\Request;

class ColorCabelloController extends Controller
{
    
    public function index()
    {
        return ColorCabello::all();
    }

    public function store(ColorCabelloRequest $request)
    {
        return ColorCabello::create($request->all());
    }

    public function show( $id)
    {
        return ColorCabello::FindOrFail($id);
    }

    public function update($id, ColorCabelloRequest $request)
    {
        $colorcabello= ColorCabello::findOrFail($id);
        return $colorcabello->update($request->all());
    }

    public function destroy( $id)
    {
        return ColorCabello::FindOrFail($id)->delete();
    }
}
