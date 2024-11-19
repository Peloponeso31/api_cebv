<?php

namespace App\Http\Controllers;

use App\Http\Requests\VelloFacialRequest;
use App\Http\Resources\VelloFacialResource;
use App\Models\VelloFacial;

class VelloFacialController extends Controller
{
    public function index()
    {
        return VelloFacialResource::collection(VelloFacial::all());
    }

    public function store(VelloFacialRequest $request)
    {
        return new VelloFacialResource(VelloFacial::create($request->validated()));
    }

    public function show(VelloFacial $velloFacial)
    {
        return new VelloFacialResource($velloFacial);
    }

    public function update(VelloFacialRequest $request, VelloFacial $velloFacial)
    {
        $velloFacial->update($request->validated());

        return new VelloFacialResource($velloFacial);
    }

    public function destroy(VelloFacial $velloFacial)
    {
        $velloFacial->delete();

        return response()->json();
    }
}
