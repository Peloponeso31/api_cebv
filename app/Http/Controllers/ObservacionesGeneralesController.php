<?php

namespace App\Http\Controllers\Catalogos\MediaFiliacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\MediaFiliacion\ObservacionesGeneralesRequest;
use App\Models\Catalogos\MediaFiliacion\ObservacionesGenerales;
use Illuminate\Http\Request;

class ObservacionesGeneralesController extends Controller
{
   
    public function index()
    {
        return ObservacionesGenerales::all();
    }

    public function store(ObservacionesGeneralesRequest $request)
    {
        return ObservacionesGenerales::create($request->all());
    }

    public function show( $id)
    {
        return ObservacionesGenerales::FindOrFail($id);
    }

    public function update( $id, ObservacionesGeneralesRequest $request)
    {
        $observacionesgenerales= ObservacionesGenerales::findOrFail($id);
        return $observacionesgenerales->update($request->all());
    }

    public function destroy( $id)
    {
        return ObservacionesGenerales::findOrFail($id)->delete();
    }
}
