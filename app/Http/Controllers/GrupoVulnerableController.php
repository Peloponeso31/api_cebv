<?php

namespace App\Http\Controllers;

use App\Http\Resources\GrupoVulnerableResource;
use App\Models\GrupoVulnerable;
use Illuminate\Http\Request;

class GrupoVulnerableController extends Controller
{
    public function index()
    {
        return GrupoVulnerableResource::collection(GrupoVulnerable::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new GrupoVulnerableResource(GrupoVulnerable::create($data));
    }

    public function show(GrupoVulnerable $grupoVulnerable)
    {
        return new GrupoVulnerableResource($grupoVulnerable);
    }

    public function update(Request $request, GrupoVulnerable $grupoVulnerable)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $grupoVulnerable->update($data);

        return new GrupoVulnerableResource($grupoVulnerable);
    }

    public function destroy(GrupoVulnerable $grupoVulnerable)
    {
        $grupoVulnerable->delete();

        return response()->json();
    }
}
