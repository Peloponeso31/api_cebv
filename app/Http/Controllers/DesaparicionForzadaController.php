<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesaparicionForzadaRequest;
use App\Http\Resources\DesaparicionForzadaResource;
use App\Models\DesaparicionForzada;

class DesaparicionForzadaController extends Controller
{
    public function index()
    {
        return DesaparicionForzadaResource::collection(DesaparicionForzada::all());
    }

    public function store(DesaparicionForzadaRequest $request)
    {
        return new DesaparicionForzadaResource(DesaparicionForzada::create($request->validated()));
    }

    public function show(DesaparicionForzada $desaparicionForzada)
    {
        return new DesaparicionForzadaResource($desaparicionForzada);
    }

    public function update(DesaparicionForzadaRequest $request, DesaparicionForzada $desaparicionForzada)
    {
        $desaparicionForzada->update($request->validated());

        return new DesaparicionForzadaResource($desaparicionForzada);
    }

    public function destroy(DesaparicionForzada $desaparicionForzada)
    {
        $desaparicionForzada->delete();

        return response()->json();
    }
}
