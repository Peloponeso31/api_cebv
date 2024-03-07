<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ubicaciones\MunicipioResource;
use App\Models\Ubicaciones\Municipio;

class MunicipioController extends Controller
{
    public function index()
    {
        return MunicipioResource::collection(Municipio::all());
    }
}
