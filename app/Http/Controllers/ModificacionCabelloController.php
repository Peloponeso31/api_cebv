<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModificacionCabelloRequest;
use App\Http\Requests\UpdateModificacionCabelloRequest;
use App\Models\Catalogos\MediaFiliacion\ModificacionCabello;

class ModificacionCabelloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ModificacionCabello::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModificacionCabelloRequest $request)
    {
        return ModificacionCabello::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return ModificacionCabello::FindOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateModificacionCabelloRequest $request)
    {
        $modificacionCabello= ModificacionCabello::findOrFail($id);
        return $modificacionCabello->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return ModificacionCabello::findOrFail($id)->delete();
    }
}
