<?php

namespace App\Http\Controllers\Catalogos\MediaFiliacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\MediaFiliacion\TipoMentonRequest;
use App\Models\Catalogos\MediaFiliacion\TipoMenton;
use Illuminate\Http\Request;

class TipoMentonController extends Controller
{
   
    public function index()
    {
        return TipoMenton::all();
    }

    public function store(TipoMentonRequest $request)
    {
        return TipoMenton::create($request->all());
    }

    public function show( $id)
    {
        return TipoMenton::FindOrFail($id);
    }

    public function update( $id, TipoMentonRequest $request)
    {
        $tipomenton= TipoMenton::findOrFail($id);
        return $tipomenton->update($request->all());
    }

    public function destroy( $id)
    {
        return TipoMenton::findOrFail($id)->delete();
    }
}
