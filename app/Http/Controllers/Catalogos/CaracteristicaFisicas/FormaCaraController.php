<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Models\Catalogos\CaracteristicasFisicas\FormaCara;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\FormaCaraRequest;
use Illuminate\Http\Request;

class FormaCaraController extends Controller
{
    
    public function index()
    {
        return FormaCara::all();
    }

    public function store(FormaCaraRequest $request)
    {
        return FormaCara::create($request->all());
    }

    public function show($id)
    {
        return FormaCara::FindOrFail($id);
    }

    public function update($id, FormaCaraRequest $request)
    {
        $formacara= FormaCara::findOrFail($id);
        return $formacara->update($request->all());
    }

    public function destroy($id)
    {
        return FormaCara::findOrFail($id)->delete();
    }
}
