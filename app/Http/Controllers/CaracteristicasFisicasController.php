<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicasFisicasRequest;
use App\Http\Requests\UpdateCaracteristicasFisicasRequest;
use App\Http\Resources\CaracteristicasFisicasResource;
use App\Models\CaracteristicasFisicas;
use Illuminate\Http\Request;

class CaracteristicasFisicasController extends Controller
{

    public function index()
    {
        return CaracteristicasFisicasResource::collection(CaracteristicasFisicas::all());
    }

    public function store(StoreCaracteristicasFisicasRequest $request)
    {
        return new CaracteristicasFisicasResource(CaracteristicasFisicas::create($request->all()));
    }

    public function show($id)
    {
        return new CaracteristicasFisicasResource(CaracteristicasFisicas::findOrFail($id));
    }


    public function update($id, UpdateCaracteristicasFisicasRequest $request)
    {
        $caracteristicasfisicas= CaracteristicasFisicas::findOrFail($id);
        $caracteristicasfisicas->update($request->all());
    }

    public function destroy( $id)
    {
        if (CaracteristicasFisicas::findOrFail($id)->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
    }
}
}