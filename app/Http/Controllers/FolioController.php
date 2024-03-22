<?php

namespace App\Http\Controllers;

use App\Http\Resources\FolioResource;
use App\Models\Folio;
use Illuminate\Http\Request;

class FolioController extends Controller
{
    public function index()
    {
        return FolioResource::collection(Folio::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'folio' => ['required'],
        ]);

        return new FolioResource(Folio::create($data));
    }

    public function show(Folio $folio)
    {
        return new FolioResource($folio);
    }

    public function update(Request $request, Folio $folio)
    {
        $data = $request->validate([
            'folio' => ['required'],
        ]);

        $folio->update($data);

        return new FolioResource($folio);
    }

    public function destroy(Folio $folio)
    {
        $folio->delete();

        return response()->json();
    }
}
