<?php

namespace App\Http\Controllers;

use App\Http\Resources\SituacionMigratoriaResource;
use App\Models\SituacionMigratoria;
use Illuminate\Http\Request;

class SituacionMigratoriaController extends Controller
{
    public function index()
    {
        return SituacionMigratoriaResource::collection(SituacionMigratoria::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new SituacionMigratoriaResource(SituacionMigratoria::create($data));
    }

    public function show(SituacionMigratoria $situacionMigratoria)
    {
        return new SituacionMigratoriaResource($situacionMigratoria);
    }

    public function update(Request $request, SituacionMigratoria $situacionMigratoria)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $situacionMigratoria->update($data);

        return new SituacionMigratoriaResource($situacionMigratoria);
    }

    public function destroy(SituacionMigratoria $situacionMigratoria)
    {
        $situacionMigratoria->delete();

        return response()->json();
    }
}
