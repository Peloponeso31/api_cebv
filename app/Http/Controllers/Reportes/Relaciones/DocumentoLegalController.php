<?php

namespace App\Http\Controllers\Reportes\Relaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Relaciones\DocumentoLegalRequest;
use App\Http\Resources\Reportes\Relaciones\DocumentoLegalResource;
use App\Models\Reportes\Relaciones\DocumentoLegal;
use App\Services\CrudService;

class DocumentoLegalController extends Controller
{
    public function index()
    {
        return DocumentoLegalResource::collection(DocumentoLegal::all());
    }

    public function store(DocumentoLegalRequest $request)
    {
        return new DocumentoLegalResource(DocumentoLegal::create($request->validated()));
    }

    public function show($documentoLegal)
    {
        return new DocumentoLegalResource(DocumentoLegal::find($documentoLegal));
    }

    public function update(DocumentoLegalRequest $request, $documentoLegal)
    {
        $documento = DocumentoLegal::find($documentoLegal);
        $documento->update($request->validated());
        return new DocumentoLegalResource($documento);
    }

    public function destroy(DocumentoLegal $documentoLegal)
    {
        $documentoLegal->delete();

        return response()->json();
    }
}
