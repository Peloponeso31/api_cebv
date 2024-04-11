<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVelloFacialRequest;
use App\Http\Requests\UpdateVelloFacialRequest;
use App\Http\Resources\VelloFacialResource;
use App\Models\Catalogos\VelloFacial;

class VelloFacialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VelloFacialResource::collection(VelloFacial::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVelloFacialRequest $request)
    {
        return new VelloFacialResource(VelloFacial::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new VelloFacialResource(VelloFacial::findOrFail($id));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VelloFacial $velloFacial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateVelloFacialRequest $request)
    {
        $model = VelloFacial::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VelloFacial $velloFacial)
    {
        if (VelloFacial::findOrFail($id)->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
        }
    }
}
