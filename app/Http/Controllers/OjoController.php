<?php

namespace App\Http\Controllers;

use App\Http\Requests\OjoRequest;
use App\Http\Resources\OjoResource;
use App\Models\Ojo;

class OjoController extends Controller
{
    public function index()
    {
        return OjoResource::collection(Ojo::all());
    }

    public function store(OjoRequest $request)
    {
        return new OjoResource(Ojo::create($request->validated()));
    }

    public function show(Ojo $ojo)
    {
        return new OjoResource($ojo);
    }

    public function update(OjoRequest $request, Ojo $ojo)
    {
        $ojo->update($request->validated());

        return new OjoResource($ojo);
    }

    public function destroy(Ojo $ojo)
    {
        $ojo->delete();

        return response()->json();
    }
}
