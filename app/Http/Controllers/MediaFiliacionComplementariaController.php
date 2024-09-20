<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaFiliacionComplementariaRequest;
use App\Http\Resources\MediaFiliacionComplementariaResource;
use App\Models\MediaFiliacionComplementaria;

class MediaFiliacionComplementariaController extends Controller
{
    public function index()
    {
        return MediaFiliacionComplementariaResource::collection(MediaFiliacionComplementaria::all());
    }

    public function store(MediaFiliacionComplementariaRequest $request)
    {
        return new MediaFiliacionComplementariaResource(MediaFiliacionComplementaria::create($request->validated()));
    }

    public function show(MediaFiliacionComplementaria $mediaFiliacionComplementaria)
    {
        return new MediaFiliacionComplementariaResource($mediaFiliacionComplementaria);
    }

    public function update(MediaFiliacionComplementariaRequest $request, MediaFiliacionComplementaria $mediaFiliacionComplementaria)
    {
        $mediaFiliacionComplementaria->update($request->validated());

        return new MediaFiliacionComplementariaResource($mediaFiliacionComplementaria);
    }

    public function destroy(MediaFiliacionComplementaria $mediaFiliacionComplementaria)
    {
        $mediaFiliacionComplementaria->delete();

        return response()->json();
    }
}
