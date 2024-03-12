<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ubicaciones\AsentamientoResource;
use App\Models\Ubicaciones\Asentamiento;

class AsentamientoController extends Controller
{
    public function index()
    {
        $query = Asentamiento::query();

        if (request()->has('search')) {
            $query = Asentamiento::search(request('search'));
        }

        return AsentamientoResource::collection($query->paginate());
    }

    public function show($id)
    {
        return new AsentamientoResource(Asentamiento::findOrFail($id));
    }
}
