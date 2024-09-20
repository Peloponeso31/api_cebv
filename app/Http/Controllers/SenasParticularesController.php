<?php

namespace App\Http\Controllers;

use App\Http\Requests\BulkSenasParticularesRequest;
use App\Http\Requests\DeleteSenasParticularesRequest;
use App\Http\Requests\StoreSenasParticularesRequest;
use App\Http\Requests\UpdateSenasParticularesRequest;
use App\Http\Resources\SenasParticularesResource;
use App\Models\SenasParticulares;
use Illuminate\Http\Request;

class SenasParticularesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SenasParticularesResource::collection(SenasParticulares::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSenasParticularesRequest $request)
    {
        return new SenasParticularesResource(SenasParticulares::create($request->all()));
    }

    public function bulkStore(BulkSenasParticularesRequest $request)
    {
        SenasParticulares::insert($request->all());
    }

    public function bulkDelete(DeleteSenasParticularesRequest $request)
    {
    $ids = $request->input('ids');
    SenasParticulares::whereIn('id', $ids)->delete();
    return response()->json(['message' => 'Registros eliminados exitosamente'], 200);
    }


    public function SenaPersona($persona_id)
    {
        // Busca todas las señas relacionadas a la persona por su ID
        $senas = SenasParticulares::where('persona_id', $persona_id)->get();
        // Verifica si se encontraron señas para la persona
        if ($senas->isEmpty()) {
            // Si no se encontraron, retorna una respuesta con un mensaje de error
            return response()->json(['message' => 'No se encontraron señas para la persona con el ID proporcionado'], 404);
        }
        // Si se encontraron señas, retorna las señas encontradas
        return response()->json(['senas' => $senas], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new SenasParticularesResource(SenasParticulares::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateSenasParticularesRequest $request)
    {
        $model = SenasParticulares::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (SenasParticulares::findOrFail($id)->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
        }
    }
}
