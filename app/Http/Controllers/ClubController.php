<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubRequest;
use App\Http\Resources\ClubResource;
use App\Models\Club;

class ClubController extends Controller
{
    public function index()
    {
        return ClubResource::collection(Club::all());
    }

    public function store(ClubRequest $request)
    {
        return new ClubResource(Club::create($request->validated()));
    }

    public function show(Club $club)
    {
        return new ClubResource($club);
    }

    public function update(ClubRequest $request, Club $club)
    {
        $club->update($request->validated());

        return new ClubResource($club);
    }

    public function destroy(Club $club)
    {
        $club->delete();

        return response()->json();
    }
}
