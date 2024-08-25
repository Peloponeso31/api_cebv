<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Club;

class ClubController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(Club::all());
    }

    public function store(ClubRequest $request)
    {
        return new CatalogoResource(Club::create($request->validated()));
    }

    public function show(Club $club)
    {
        return new CatalogoResource($club);
    }

    public function update(ClubRequest $request, Club $club)
    {
        $club->update($request->validated());

        return new CatalogoResource($club);
    }

    public function destroy(Club $club)
    {
        $club->delete();

        return response()->json();
    }
}
