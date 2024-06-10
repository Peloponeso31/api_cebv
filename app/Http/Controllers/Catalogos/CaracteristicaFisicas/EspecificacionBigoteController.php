<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\EspecificacionBigoteRequest;
use App\Models\Catalogos\CaracteristicasFisicas\EspecificacionBigote;
use Illuminate\Http\Request;

class EspecificacionBigoteController extends Controller
{
   
    public function index()
    {
        return EspecificacionBigote::all();
    }

    public function store(EspecificacionBigoteRequest $request)
    {
        return EspecificacionBigote::create($request->all());
    }

    public function show( $id)
    {
        return EspecificacionBigote::FindOrFail($id);
    }

    public function update( $id, EspecificacionBigoteRequest $request)
    {
        $especificacionbigote= EspecificacionBigote::findOrFail($id);
        return $especificacionbigote->update($request->all());
    }

    public function destroy( $id)
    {
        return EspecificacionBigote::findOrFail($id)->delete();
    }
}
