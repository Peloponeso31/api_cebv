<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\BigoteRequest;
use App\Models\Catalogos\CaracteristicasFisicas\Bigote;
use Illuminate\Http\Request;

class BigoteController extends Controller
{

    public function index()
    {
        return Bigote::all();
    }

    public function store(BigoteRequest $request)
    {
        return Bigote::create($request->all());
    }

    public function show( $id)
    {
        return Bigote::FindOrFail($id);
    }

    public function update( $id, BigoteRequest $request)
    {
        $bigote= Bigote::findOrFail($id);
        return $bigote->update($request->all());
    }

    public function destroy( $id)
    {
        return Bigote::findOrFail($id)->delete();
    }
}
