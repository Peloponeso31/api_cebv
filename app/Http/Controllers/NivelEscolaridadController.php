<?php

namespace App\Http\Controllers;

use App\Http\Requests\NivelEscolaridadRequest;
use App\Http\Resources\NivelEscolaridadResource;
use App\Models\NivelEscolaridad;
use Illuminate\Http\Request;

class NivelEscolaridadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NivelEscolaridadResource::collection(NivelEscolaridad::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NivelEscolaridadRequest $request)
    {
        return new NivelEscolaridadResource(NivelEscolaridad::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $nivel = NivelEscolaridad::findOrFail($id);

        return new NivelEscolaridadResource($nivel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, NivelEscolaridadRequest $request)
    {
        $nivel = NivelEscolaridad::findOrFail($id);

        $nivel->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (NivelEscolaridad::findOrFail($id)->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
        }
    }
}
