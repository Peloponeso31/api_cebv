<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ubicaciones\EstadoResource;
use App\Models\Ubicaciones\Estado;

class EstadoController extends Controller
{
    public function index()
    {
        $query = Estado::query();

        if (request()->has('search')) {
            $query = Estado::search(request('search'));
        }

        return EstadoResource::collection($query->get());
    }

    public function show($id)
    {
        return new EstadoResource(Estado::findOrFail($id));
    }
}
