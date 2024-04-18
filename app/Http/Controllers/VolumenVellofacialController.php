<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVolumenVellofacialRequest;
use App\Http\Requests\UpdateVolumenVellofacialRequest;
use App\Models\Catalogos\MediaFiliacion\VolumenVellofacial;

class VolumenVellofacialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VolumenVellofacial::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVolumenVellofacialRequest $request)
    {
        return VolumenVellofacial::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return VolumenVellofacial::findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateVolumenVellofacialRequest $request)
    {
        $volumenVello= VolumenVellofacial::findOrFail($id);
        return $volumenVello->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return VolumenVellofacial::findOrFail($id)->delete();
    }
}
