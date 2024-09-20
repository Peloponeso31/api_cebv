<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ubicaciones\EstadoResource;
use App\Models\Ubicaciones\Estado;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class EstadoController extends Controller
{
    public function index()
    {
        $query = QueryBuilder::for(Estado::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
            ])->get();

        return EstadoResource::collection($query);
    }

    public function show($id)
    {
        return new EstadoResource(Estado::findOrFail($id));
    }
}
