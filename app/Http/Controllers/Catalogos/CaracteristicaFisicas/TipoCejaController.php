<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\TipoCejaRequest;
use App\Models\Catalogos\CaracteristicasFisicas\TipoCeja;
use Illuminate\Http\Request;

class TipoCejaController extends Controller
{
    
    public function index()
    {
        return TipoCeja::all();
    }

    public function store(TipoCejaRequest $request)
    {
        return TipoCeja::create($request->all());
    }

    public function show( $id)
    {
        return TipoCeja::FindOrFail($id);
    }

    public function update( $id, TipoCejaRequest $request)
    {
        $tipoceja= TipoCeja::findOrFail($id);
        return $tipoceja->update($request->all());
    }

    public function destroy( $id)
    {
        return TipoCeja::findOrFail($id)->delete();
    }
}
