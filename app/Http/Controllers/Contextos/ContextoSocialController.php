<?php

namespace App\Http\Controllers\Contextos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contextos\StoreContextoSocialRequest;
use App\Http\Requests\Contextos\UpdateContextoSocialRequest;
use App\Http\Resources\Contextos\ContextoSocialResource;
use App\Models\Contextos\ContextoSocial;
use Illuminate\Http\Request;

class ContextoSocialController extends Controller
{
    
    public function __construct() {
        $this->middleware(['can:consulta'])->only('index','show');
        $this->middleware(['can:agregar'])->only('store');
        $this->middleware(['can:edicion'])->only('update');
        $this->middleware(['can:eliminacion'])->only('destroy');;
    }

    public function index()
    {
        return ContextoSocialResource::collection(ContextoSocial::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContextoSocialRequest $request)
    {
        return new ContextoSocialResource(ContextoSocial::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = ContextoSocial::findOrFail($id);

        return new ContextoSocialResource($model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateContextoSocialRequest $request)
    {
        $model = ContextoSocial::findOrFail($id);

        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->tokenCan('delete')) {
            $model = ContextoSocial::findOrFail($id);

            $model->delete();

            return response()->json(['message' => 'Deleted']);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
