<?php

namespace App\Http\Controllers;

use App\Http\Requests\FamiliarRequest;
use App\Http\Resources\FamiliarResource;
use App\Models\Familiar;

class FamiliarController extends Controller
{
    public function index()
    {
        return FamiliarResource::collection(Familiar::all());
    }

    public function store(FamiliarRequest $request)
    {
        return new FamiliarResource(Familiar::create($request->validated()));
    }

    public function show(Familiar $familiar)
    {
        return new FamiliarResource($familiar);
    }

    public function update(FamiliarRequest $request, Familiar $familiar)
    {
        $familiar->update($request->validated());

        return new FamiliarResource($familiar);
    }

    public function destroy(Familiar $familiar)
    {
        $familiar->delete();

        return response()->json();
    }
}
