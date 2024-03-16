<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ubicaciones\MunicipioResource;
use App\Models\Ubicaciones\Municipio;

class MunicipioController extends Controller
{
    public function index()
    {
        $query = Municipio::query();

        if (request()->has('search')) {
            $query = Municipio::search(request('search'));
        }

        $municipios = $query->paginate(); // Check appropriate number of items per page

        return MunicipioResource::collection($municipios);
    }

    public function show($id)
    {
        return new MunicipioResource(Municipio::findOrFail($id));
    }
}
