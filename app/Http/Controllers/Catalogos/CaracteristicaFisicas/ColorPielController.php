<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\ColorPielRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Catalogos\CaracteristicasFisicas\ColorPiel;
use Illuminate\Http\Request;

class ColorPielController extends Controller
{

    public function index()
    {
        return CatalogoResource::collection(ColorPiel::all());
    }


    public function store(ColorPielRequest $request)
    {
        return ColorPiel::create($request->all());
    }


    public function show($id)
    {
        return ColorPiel::FindOrFail($id);
    }


    public function update($id, ColorPielRequest $request)
    {
        $colorpiel = ColorPiel::findOrFail($id);
        return $colorpiel->update($request->all());
    }


    public function destroy($id)
    {
        return ColorPiel::findOrFail($id)->delete();
    }
}
