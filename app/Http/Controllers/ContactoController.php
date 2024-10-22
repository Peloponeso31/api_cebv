<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoRequest;
use App\Http\Resources\ContactoResource;
use App\Models\Contacto;
use App\Services\CrudService;
use Illuminate\Http\Request;

class ContactoController extends Controller
{

    protected CrudService $service;
    protected Contacto $model;

    public function __construct(CrudService $service, Contacto $model)
    {
        $this->service = $service;
        $this->model = $model;
    }
    
   
    public function index()
    {
        $query = $this->model::query();

        if (request()->has('search')) {
            $query = $this->model::search(request('search'));
        }

        return ContactoResource::collection($query->get());
    }

   
    public function store(ContactoRequest $request)
    {
        return $this->service->store($request, $this->model, new ContactoResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new ContactoResource($this->model::class));
    }

    public function update($id, ContactoRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new ContactoResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
