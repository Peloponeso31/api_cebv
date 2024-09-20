<?php

namespace App\Services;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class CrudService
{
    /**
     * Create and save a new model instance or register on database.
     *
     * @param FormRequest $request The incoming form request.
     * @param Model $model The model instance to create.
     * @param JsonResource $resource The JSON resource to return.
     * @return JsonResponse|JsonResource Returns a JSON response or a JSON resource.
     */
    public function store(FormRequest $request, Model $model, JsonResource $resource): JsonResponse|JsonResource
    {
        // Create a new model instance with the data from the request.
        $model = $model->create($request->all());

        // Return the newly created resource.
        return new $resource($model);
    }


    /**
     * Display the specified resource.
     *
     * @param mixed $id The identifier of the resource to show.
     * @param Model $model The model instance to retrieve.
     * @param JsonResource $resource The JSON resource to return.
     * @return JsonResponse|JsonResource Returns a JSON response or a JSON resource.
     */
    public function show(mixed $id, Model $model, JsonResource $resource): JsonResponse|JsonResource
    {
        // Retrieve the model with the specified ID, or throw a ModelNotFoundException if not found.
        $model = $model->findOrFail($id);

        // Return the requested resource.
        return new $resource($model);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param mixed $id The identifier of the resource to update.
     * @param FormRequest $request The incoming form request.
     * @param Model $model The model instance to update.
     * @param JsonResource $resource The JSON resource to return.
     * @return JsonResponse|JsonResource Returns a JSON response or a JSON resource.
     */
    public function update(mixed $id, FormRequest $request, Model $model, JsonResource $resource): JsonResponse|JsonResource
    {
        // Retrieve the model with the specified ID, or throw a ModelNotFoundException if not found.
        $model = $model->findOrFail($id);

        // Update the model with the data from the request.
        $model->update($request->all());

        // Return the updated resource.
        return new $resource($model);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param mixed $id The identifier of the resource to delete.
     * @param Model $model The model instance to delete.
     * @return JsonResponse Returns a JSON response.
     */
    public function destroy(mixed $id, Model $model): JsonResponse
    {
        // Retrieve the model with the specified ID, or throw a ModelNotFoundException if not found.
        $model = $model->findOrFail($id);

        // Delete the model from the database.
        $model->delete();

        // Return a JSON response indicating successful deletion.
        return response()->json(['message' => 'Recurso eliminado correctamente']);
    }
}
