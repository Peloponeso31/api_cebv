<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\FormaOrejaRequest;
use App\Models\Catalogos\CaracteristicasFisicas\FormaOreja;
use Illuminate\Http\Request;

class FormaOrejaController extends Controller
{

    public function index()
    {
        return FormaOreja::all();
    }

    public function store(FormaOrejaRequest $request)
    {
        return FormaOreja::create($request->all());
    }

    public function show( $id)
    {
        return FormaOreja::FindOrFail($id);
    }

    public function update( $id, FormaOrejaRequest $request)
    {
        $formaoreja= FormaOreja::findOrFail($id);
        return $formaoreja->update($request->all());
    }

    public function destroy( $id)
    {
        return FormaOreja::findOrFail($id)->delete();
    }
}
