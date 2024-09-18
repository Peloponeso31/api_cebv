<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ubicaciones\AsentamientoResource;
use App\Models\Ubicaciones\Asentamiento;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AsentamientoController extends Controller
{
    public function index()
    {
        $query = QueryBuilder::for(Asentamiento::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('municipio_id')
            ])->get();

        return AsentamientoResource::collection($query);
    }

    public function show($id)
    {
        return new AsentamientoResource(Asentamiento::findOrFail($id));
    }
}
