<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ubicaciones\MunicipioResource;
use App\Models\Ubicaciones\Municipio;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MunicipioController extends Controller
{
    public function index()
    {
        $query = QueryBuilder::for(Municipio::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('estado_id')
            ])->get();

        return MunicipioResource::collection($query);
    }

    public function show($id)
    {
        return new MunicipioResource(Municipio::findOrFail($id));
    }
}
