<?php

namespace App\Http\Controllers;

use App\Http\Requests\Personas\OcupacionRequest;
use App\Http\Resources\Personas\OcupacionResource;
use App\Models\Personas\Ocupacion;
use Illuminate\Http\Request;

class OcupacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OcupacionResource::collection(Ocupacion::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OcupacionRequest $request)
    {
        return new OcupacionResource(Ocupacion::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ocupacion = Ocupacion::findOrFail($id);

        return new OcupacionResource($ocupacion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, OcupacionRequest $request)
    {
        $ocupacion = Ocupacion::findOrFail($id);

        $ocupacion->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Ocupacion::findOrFail($id)->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
        }
    }
}
