<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\StoreTipoPabellonAuricularRequest;
use App\Http\Requests\Catalogos\UpdateTipoPabellonAuricularRequest;
use App\Models\Catalogos\MediaFiliacion\TipoPabellonAuricular;

class TipoPabellonAuricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TipoPabellonAuricular::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoPabellonAuricularRequest $request)
    {
        return TipoPabellonAuricular::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return TipoPabellonAuricular::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateTipoPabellonAuricularRequest $request)
    {
        $tipoPabellonAuricular= TipoPabellonAuricular::findOrFail($id);
        return $tipoPabellonAuricular->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return TipoPabellonAuricular::findOrFail($id)->delete();
    }
}
