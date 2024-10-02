<?php

namespace App\Http\Controllers\Reportes\Hechos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Informacion\HechoDesaparicionRequest;
use App\Http\Resources\Reportes\Hechos\HechoDesaparicionResource;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Services\CrudService;
use DB;
use Spatie\QueryBuilder\QueryBuilder;

class HechoDesaparicionController extends Controller
{
    protected CrudService $service;
    protected HechoDesaparicion $model;

    public function __construct(CrudService $service, HechoDesaparicion $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    public function index()
    {
        $hechos = QueryBuilder::for(HechoDesaparicion::class)
            ->allowedFilters(['reporte_id'])
            ->get();

        return HechoDesaparicionResource::collection($hechos);
    }

    public function store(HechoDesaparicionRequest $request)
    {
        return $this->service->store($request, $this->model, new HechoDesaparicionResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new HechoDesaparicionResource($this->model::class));
    }

    public function update($id, HechoDesaparicionRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new HechoDesaparicionResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }

    public function filtrarPersonas()
    {
        $nombre = null;
        $apellidoPaterno = null;
        $apellidoMaterno = null;

        if (request()->has('nombre')) {
            $nombre = request()->nombre;
        }

        if (request()->has('apellidoPaterno')) {
            $apellidoPaterno = request()->apellidoPaterno;
        }

        if (request()->has('apellidoMaterno')) {
            $apellidoMaterno = request()->apellidoMaterno;
        }

        // Esta es la cosa más puerca que jamás he escrito en mi vida
        // pero funciona mejor que nada.
        $query = DB::table('hechos_desapariciones as h')
            ->join('desaparecidos as d', 'h.reporte_id', '=', 'd.reporte_id')
            ->join('personas as p', 'd.persona_id', '=', 'p.id')
            ->select('h.id', 'h.reporte_id', 'h.hechos_desaparicion', 'h.sintesis_desaparicion', 'p.nombre', 'p.apellido_paterno', 'p.apellido_materno')
            ->where('p.nombre', 'like', '%' . $nombre . '%')
            ->where('p.apellido_paterno', 'like', '%' . $apellidoPaterno . '%')
            ->where('p.apellido_materno', 'like', '%' . $apellidoMaterno . '%')
            ->get();

        $hechos = HechoDesaparicion::find($query->pluck('id'));

        return HechoDesaparicionResource::collection($hechos);

    }
}
