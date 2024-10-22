<?php

namespace App\Http\Controllers\Catalogos\Etnia;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\Etnia\ReligionRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Catalogos\Etnia\Religion;

class ReligionController extends Controller
{

    public function index()
    {
        return CatalogoResource::collection(Religion::all());
    }

    public function store(ReligionRequest $request)
    {
        return Religion::create($request->all());
    }


    public function show($id)
    {
        return Religion::FindOrFail($id);
    }


    public function update($id, ReligionRequest $request)
    {
        $religion = Religion::findOrFail($id);
        return $religion->update($request->all());
    }


    public function destroy($id)
    {
        return Religion::findOrFail($id)->delete();
    }
}
