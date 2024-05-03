<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePabellonAuricularRequest;
use App\Http\Requests\UpdatePabellonAuricularlRequest;
use App\Http\Resources\PabellonAuricularResource;
use App\Models\Catalogos\PabellonAuricular;

class PabellonAuricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PabellonAuricularResource::collection(PabellonAuricular::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePabellonAuricularRequest $request)
    {
        return new PabellonAuricularResource(PabellonAuricular::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new PabellonAuricularResource(PabellonAuricular::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdatePabellonAuricularRequest $request)
    {
        $model = PabellonAuricular::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PabellonAuricular $pabellonAuricular)
    {
        if (PabellonAuricular::findOrFail($id)->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
        }
    }
}
