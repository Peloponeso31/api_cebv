<?php

namespace App\Http\Controllers\Catalogos\Etnia;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\Etnia\LenguaRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Catalogos\Etnia\Lengua;
use Illuminate\Http\Request;

class LenguaController extends Controller
{

    public function index()
    {
        $lenguas = Lengua::withLenguasCount()->orderBy('personas_count','desc')->get();

        return CatalogoResource::collection($lenguas);
    }


    public function store(LenguaRequest $request)
    {
        return Lengua::create($request->all());
    }


    public function show($id)
    {
        return Lengua::FindOrFail($id);
    }


    public function update($id, LenguaRequest $request)
    {
        $lengua = Lengua::findOrFail($id);
        return $lengua->update($request->all());
    }


    public function destroy($id)
    {
        return Lengua::findOrFail($id)->delete();
    }
}
