<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\FormaOjosRequest;
use App\Models\Catalogos\CaracteristicasFisicas\FormaOjos;
use Illuminate\Http\Request;

class FormaOjosController extends Controller
{
    public function index()
    {
        return FormaOjos::all();
    }

    public function store(FormaOjosRequest $request)
    {
        return FormaOjos::create($request->all());
    }

    public function show($id)
    {
        return FormaOjos::FindOrFail($id);
    }

    public function update($id, FormaOjosRequest $request)
    {
        $formaojos= FormaOjos::findOrFail($id);
        return $formaojos->update($request->all());
    }

    public function destroy($id)
    {
        return FormaOjos::findOrFail($id)->delete();
    }
}
