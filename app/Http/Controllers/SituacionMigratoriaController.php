<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\SituacionMigratoria;
use Illuminate\Http\Request;

class SituacionMigratoriaController extends Controller
{
    public function index()
    {
        $situaciones = SituacionMigratoria::withSituacionesmigratoriasCount()->orderBy('contextos_Sociales_count','desc')->get();

        return CatalogoResource::collection($situaciones);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(SituacionMigratoria::create($data));
    }

    public function show(SituacionMigratoria $situacionMigratoria)
    {
        return new CatalogoResource($situacionMigratoria);
    }

    public function update(Request $request, SituacionMigratoria $situacionMigratoria)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $situacionMigratoria->update($data);

        return new CatalogoResource($situacionMigratoria);
    }

    public function destroy(SituacionMigratoria $situacionMigratoria)
    {
        $situacionMigratoria->delete();

        return response()->json();
    }
}
