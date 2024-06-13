<?php

namespace App\Http\Controllers\Catalogos\Etnia;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\Etnia\ReligionRequest;
use App\Http\Resources\ReligionResource;
use App\Models\Catalogos\Etnia\Religion;
use Illuminate\Http\Request;

class ReligionController extends Controller
{

    public function index()
    {
        return ReligionResource::collection(Religion::all());
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
