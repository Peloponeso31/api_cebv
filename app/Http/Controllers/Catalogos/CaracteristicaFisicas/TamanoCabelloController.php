<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\TamanoCabelloRequest;
use App\Models\Catalogos\CaracteristicasFisicas\TamanoCabello;
use Illuminate\Http\Request;

class TamanoCabelloController extends Controller
{

    public function index()
    {
        return TamanoCabello::all();
    }

    public function store(TamanoCabelloRequest $request)
    {
        return TamanoCabello::create($request->all());
    }

   
    public function show( $id)
    {
        return TamanoCabello::FindOrFail($id);
    }


    public function update( $id, TamanoCabelloRequest $request)
    {
        $tamanocabello= TamanoCabello::findOrFail($id);
        return $tamanocabello->update($request->all());
    }

   
    public function destroy( $id)
    {
        return TamanoCabello::findOrFail($id)->delete();
    }
}
