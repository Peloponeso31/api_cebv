<?php

namespace App\Http\Controllers\Catalogos\MediaFiliacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\MediaFiliacion\RegionDeformacionRequest;
use App\Models\Catalogos\MediaFiliacion\RegionDeformacion;
use Illuminate\Http\Request;

class RegionDeformacionController extends Controller
{

    public function index()
    {
        return RegionDeformacion::all();
    }

    public function store(RegionDeformacionRequest $request)
    {
        return RegionDeformacion::create($request->all());
    }

    public function show( $id)
    {
        return RegionDeformacion::FindOrFail($id);
    }

    public function update( $id, RegionDeformacionRequest $request)
    {
        $regiondeformacion= RegionDeformacion::findOrFail($id);
        return $regiondeformacion->update($request->all());
    }

    public function destroy( $id)
    {
        return RegionDeformacion::findOrFail($id)->delete();
    }
}
