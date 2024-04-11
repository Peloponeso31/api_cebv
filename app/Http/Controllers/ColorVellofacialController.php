<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColorVellofacialRequest;
use App\Http\Requests\UpdateColorVellofacialRequest;
use App\Models\Catalogos\MediaFiliacion\ColorVellofacial;

class ColorVellofacialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ColorVellofacial::all();
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
    public function store(StoreColorVellofacialRequest $request)
    {
        return ColorVellofacial::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return ColorVellofacial::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ColorVellofacial $colorVellofacial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateColorVellofacialRequest $request)
    {
        $colorvello= ColorVellofacial::findOrFail($id);
        return $colorvello->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return ColorVellofacial::findOrFail($id)->delete();
    }
}
