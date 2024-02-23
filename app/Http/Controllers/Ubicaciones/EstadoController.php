<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ubicaciones\EstadoResource;
use App\Models\Ubicaciones\Estado;

class EstadoController extends Controller
{
    public function index()
    {
        return EstadoResource::collection(Estado::all());
    }
}
