<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\StoreModificacionPabellonAuricularRequest;
use App\Http\Requests\Catalogos\UpdateModificacionPabellonAuricularRequest;
use App\Models\Catalogos\MediaFiliacion\ModificacionPabellonAuricular;

class ModificacionPabellonAuricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ModificacionPabellonAuricular::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModificacionPabellonAuricularRequest $request)
    {
        return ModificacionPabellonAuricular::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return ModificacionPabellonAuricular::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateModificacionPabellonAuricularRequest $request)
    {
        $modificacionPabellonAuricular= ModificacionPabellonAuricular::findOrFail($id);
        return $modificacionPabellonAuricular->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return ModificacionPabellonAuricular::findOrFail($id)->delete();
    }
}
