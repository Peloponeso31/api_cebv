<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\GrupoVulnerable;
use Illuminate\Http\Request;

class GrupoVulnerableController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(GrupoVulnerable::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(GrupoVulnerable::create($data));
    }

    public function show(GrupoVulnerable $grupoVulnerable)
    {
        return new CatalogoResource($grupoVulnerable);
    }

    public function update(Request $request, GrupoVulnerable $grupoVulnerable)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $grupoVulnerable->update($data);

        return new CatalogoResource($grupoVulnerable);
    }

    public function destroy(GrupoVulnerable $grupoVulnerable)
    {
        $grupoVulnerable->delete();

        return response()->json();
    }
}
