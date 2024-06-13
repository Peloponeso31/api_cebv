<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaFiliacionRequest;
use App\Http\Requests\UpdateMediaFiliacionRequest;
use App\Http\Resources\MediaFiliacionResource;
use App\Models\MediaFiliacion;
use Illuminate\Http\Request;

class MediaFiliacionController extends Controller
{
    
    public function index()
    {
        return MediaFiliacionResource::collection(MediaFiliacion::all());
    }

    public function store(StoreMediaFiliacionRequest $request)
    {
        return new MediaFiliacionResource(MediaFiliacion::create($request->all()));
    }

    public function show( $id)
    {
        return new MediaFiliacionResource(MediaFiliacion::findOrFail($id));
    }

    public function update( $id, UpdateMediaFiliacionRequest $request)
    {
        $mediafiliacion= MediaFiliacion::findOrFail($id);
        $mediafiliacion->update($request->all());
    }

    public function destroy( $id)
    {
        if (MediaFiliacion::findOrFail($id)->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
    }
}
}
