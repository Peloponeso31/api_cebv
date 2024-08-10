<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerpetradorRequest;
use App\Http\Resources\PerpetradorResource;
use App\Models\Perpetrador;

class PerpetradorController extends Controller
{
    public function index()
    {
        return PerpetradorResource::collection(Perpetrador::all());
    }

    public function store(PerpetradorRequest $request)
    {
        return new PerpetradorResource(Perpetrador::create($request->validated()));
    }

    public function show(Perpetrador $perpetrador)
    {
        return new PerpetradorResource($perpetrador);
    }

    public function update(PerpetradorRequest $request, Perpetrador $perpetrador)
    {
        $perpetrador->update($request->validated());

        return new PerpetradorResource($perpetrador);
    }

    public function destroy(Perpetrador $perpetrador)
    {
        $perpetrador->delete();

        return response()->json();
    }
}
