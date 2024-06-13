<?php

namespace App\Http\Controllers\Catalogos\MediaFiliacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\MediaFiliacion\TipoEnfermedadPielRequest;
use App\Models\Catalogos\MediaFiliacion\TipoEnfermedadPiel;
use Illuminate\Http\Request;

class TipoEnfermedadPielController extends Controller
{
   
    public function index()
    {
        return TipoEnfermedadPiel::all();
    }

    public function store(TipoEnfermedadPielRequest $request)
    {
        return TipoEnfermedadPiel::create($request->all());
    }

    public function show( $id)
    {
        return TipoEnfermedadPiel::FindOrFail($id);
    }

    public function update( $id, TipoEnfermedadPielRequest $request)
    {
        $tipoenfermedadpiel= TipoEnfermedadPiel::findOrFail($id);
        return $tipoenfermedadpiel->update($request->all());
    }

    public function destroy( $id)
    {
        return TipoEnfermedadPiel::findOrFail($id)->delete();
    }
}
