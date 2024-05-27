<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCejaRequest;
use App\Http\Requests\UpdateCejaRequest;
use App\Http\Resources\CejaResource;
use App\Models\Catalogos\Ceja;

class CejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CejaResource::collection(Ceja::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCejaRequest $request)
    {
        return new CejaResource(Ceja::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new CejaResource(Ceja::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateCejaRequest $request)
    {
        $model = Ceja::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ceja $ceja)
    {
        if (Ceja::findOrFail($id)->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
        }
    }
}
