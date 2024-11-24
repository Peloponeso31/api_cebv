<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\MedioDifusion;
use Illuminate\Http\Request;

class MedioDifusionController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(MedioDifusion::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return MedioDifusion::create($data);
    }

    public function show(MedioDifusion $medioDifusion)
    {
        return $medioDifusion;
    }

    public function update(Request $request, MedioDifusion $medioDifusion)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $medioDifusion->update($data);

        return $medioDifusion;
    }

    public function destroy(MedioDifusion $medioDifusion)
    {
        $medioDifusion->delete();

        return response()->json();
    }
}
