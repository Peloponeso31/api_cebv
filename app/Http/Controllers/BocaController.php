<?php

namespace App\Http\Controllers;

use App\Http\Requests\BocaRequest;
use App\Http\Resources\BocaResource;
use App\Models\Boca;

class BocaController extends Controller
{
    public function index()
    {
        return BocaResource::collection(Boca::all());
    }

    public function store(BocaRequest $request)
    {
        return new BocaResource(Boca::create($request->validated()));
    }

    public function show(Boca $boca)
    {
        return new BocaResource($boca);
    }

    public function update(BocaRequest $request, Boca $boca)
    {
        $boca->update($request->validated());

        return new BocaResource($boca);
    }

    public function destroy(Boca $boca)
    {
        $boca->delete();

        return response()->json();
    }
}
