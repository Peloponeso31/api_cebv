<?php

namespace App\Http\Controllers\Reportes\Hechos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Informacion\HechoDesaparicionRequest;
use App\Http\Resources\Reportes\Hechos\HechoDesaparicionResource;
use App\Models\Personas\Persona;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Services\CrudService;
use DB;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\QueryBuilder\AllowedFilter;
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
            ->allowedFilters(AllowedFilter::exact('reporte_id'))
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

    public function update($id, FormRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new HechoDesaparicionResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }

    public function filtrarPersonas()
    {
        $query = Persona::query();

        if (request()->has('nombre') && request()->nombre !== null) {
            $nombre = request()->nombre;
            $query->where('nombre', 'like', "%$nombre%");
        }

        if (request()->has('apellidoPaterno' && request()->apellidoPaterno !== null)) {
            $apellidoPaterno = request()->apellidoPaterno;
            $query->where('apellido_paterno', 'like', "%$apellidoPaterno%");
        }

        if (request()->has('apellidoMaterno') && request()->apellidoMaterno !== null) {
            $apellidoMaterno = request()->apellidoMaterno;
            $query->where('apellido_materno', 'like', "%$apellidoMaterno%");
        }

        // Esta es la cosa más puerca que jamás he escrito en mi vida,
        // pero funciona mejor que nada.
        $personas = $query->get();
        $desaparecidos = Desaparecido::whereIn('persona_id', $personas->pluck('id'))->get();
        $hechos = HechoDesaparicion::whereIn('reporte_id', $desaparecidos->pluck('reporte_id'))->get();

        return HechoDesaparicionResource::collection($hechos);
    }
}
