<?php

namespace App\Http\Controllers;

use App\Http\Requests\NarizRequest;
use App\Http\Resources\NarizResource;
use App\Models\Nariz;

class NarizController extends Controller
{
    public function index()
    {
        return NarizResource::collection(Nariz::all());
    }

    public function store(NarizRequest $request)
    {
        return new NarizResource(Nariz::create($request->validated()));
    }

    public function show(Nariz $nariz)
    {
        return new NarizResource($nariz);
    }

    public function update(NarizRequest $request, Nariz $nariz)
    {
        $nariz->update($request->validated());

        return new NarizResource($nariz);
    }

    public function destroy(Nariz $nariz)
    {
        $nariz->delete();

        return response()->json();
    }
}
