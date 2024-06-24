<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\TipoCabelloRequest;
use App\Http\Resources\TipoCabelloResource;
use App\Models\Catalogos\CaracteristicasFisicas\TipoCabello;
use Illuminate\Http\Request;

class TipoCabelloController extends Controller
{

    public function index()
    {
        return TipoCabelloResource::collection(TipoCabello::all());
    }


    public function store(TipoCabelloRequest $request)
    {
        return TipoCabello::create($request->all());
    }


    public function show( $id)
    {
        return TipoCabello::FindOrFail($id);
    }

    public function update( $id, TipoCabelloRequest $request)
    {
        $tipocabello= TipoCabello::findOrFail($id);
        return $tipocabello->update($request->all());
    }


    public function destroy( $id)
    {
        return TipoCabello::findOrFail($id)->delete();
    }
}
