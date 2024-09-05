<?php

namespace App\Http\Controllers;

use App\Http\Requests\CabelloRequest;
use App\Http\Resources\CabelloResource;
use App\Models\Cabello;

class CabelloController extends Controller
{
    public function index()
    {
        return CabelloResource::collection(Cabello::all());
    }

    public function store(CabelloRequest $request)
    {
        return new CabelloResource(Cabello::create($request->validated()));
    }

    public function show(Cabello $cabello)
    {
        return new CabelloResource($cabello);
    }

    public function update(CabelloRequest $request, Cabello $cabello)
    {
        $cabello->update($request->validated());

        return new CabelloResource($cabello);
    }

    public function destroy(Cabello $cabello)
    {
        $cabello->delete();

        return response()->json();
    }
}
