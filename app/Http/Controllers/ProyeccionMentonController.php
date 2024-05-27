<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProyeccionMentonRequest;
use App\Http\Requests\UpdateProyeccionMentonRequest;
use App\Http\Resources\ProyeccionMentonResource;
use App\Models\Catalogos\ProyeccionMenton;

class ProyeccionMentonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProyeccionMentonResource::collection(ProyeccionMenton::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProyeccionMentonRequest $request)
    {
        return new ProyeccionMentonResource(ProyeccionMenton::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new ProyeccionMentonResource(ProyeccionMenton::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateProyeccionMentonRequest $request)
    {
        $model = ProyeccionMenton::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProyeccionMenton $proyeccionMenton)
    {
        if (VProyeccionMenton::findOrFail($id)->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
        }
    }
}
