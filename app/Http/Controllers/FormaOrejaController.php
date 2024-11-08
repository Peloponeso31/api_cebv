<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\FormaOreja;
use Illuminate\Http\Request;

class FormaOrejaController extends Controller
{
    public function index()
    {
        $formasorejas= FormaOreja::withFormasorejasCount()->orderBy('orejas_count','desc')->get();
        return CatalogoResource::collection($formasorejas);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(FormaOreja::create($data));
    }

    public function show(FormaOreja $formaOreja)
    {
        return new CatalogoResource($formaOreja);
    }

    public function update(Request $request, FormaOreja $formaOreja)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $formaOreja->update($data);

        return new CatalogoResource($formaOreja);
    }

    public function destroy(FormaOreja $formaOreja)
    {
        $formaOreja->delete();

        return response()->json();
    }
}
