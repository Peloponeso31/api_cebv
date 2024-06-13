<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEtniaRequest;
use App\Http\Resources\EtniaResource;
use App\Models\Etnia;
use Illuminate\Http\Request;

class EtniaController extends Controller
{

    public function index()
    {
        return EtniaResource::collection(Etnia::all());
    }


    public function store(StoreEtniaRequest $request)
    {
        return new EtniaResource(Etnia::create($request->all()));
    }

    public function show($id)
    {
        return new EtniaResource(Etnia::findOrFail($id));
    }


    public function update($id, StoreEtniaRequest $request)
    {
        $etnia= Etnia::findOrFail($id);
        $etnia->update($request->all());
    }

    public function destroy( $id)
    {
        if (Etnia::findOrFail($id)->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
    }
}
}
