<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\ComplexionRequest;
use App\Http\Resources\ComplexionResource;
use App\Models\Catalogos\CaracteristicasFisicas\Complexion;
use Illuminate\Http\Request;

class ComplexionController extends Controller
{

    public function index()
    {
        return ComplexionResource::collection(Complexion::all());
    }


    public function store(ComplexionRequest $request)
    {
        return Complexion::create($request->all());
    }


    public function show($id)
    {
        return Complexion::FindOrFail($id);
    }


    public function update($id, ComplexionRequest $request)
    {
        $complexion = Complexion::findOrFail($id);
        return $complexion->update($request->all());
    }


    public function destroy($id)
    {
        return Complexion::findOrFail($id)->delete();
    }
}
