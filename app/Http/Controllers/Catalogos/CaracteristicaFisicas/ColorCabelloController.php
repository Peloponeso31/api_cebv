<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\ColorCabelloRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Catalogos\CaracteristicasFisicas\ColorCabello;

class ColorCabelloController extends Controller
{

    public function index()
    {
        $cabelloscolor = ColorCabello::withColorescabellosCount()->orderBy('cabellos_count','desc')->get();

        return CatalogoResource::collection($cabelloscolor);
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
