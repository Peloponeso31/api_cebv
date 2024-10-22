<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmbarazoRequest;
use App\Http\Resources\EmbarazoResource;
use App\Models\Embarazo;

class EmbarazoController extends Controller
{
    public function index()
    {
        return EmbarazoResource::collection(Embarazo::all());
    }

    public function store(EmbarazoRequest $request)
    {
        return new EmbarazoResource(Embarazo::create($request->validated()));
    }

    public function show(Embarazo $embarazo)
    {
        return new EmbarazoResource($embarazo);
    }

    public function update(EmbarazoRequest $request, Embarazo $embarazo)
    {
        $embarazo->update($request->validated());

        return new EmbarazoResource($embarazo);
    }

    public function destroy(Embarazo $embarazo)
    {
        $embarazo->delete();

        return response()->json();
    }
}
