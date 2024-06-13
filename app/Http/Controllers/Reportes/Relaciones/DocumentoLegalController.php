<?php

namespace App\Http\Controllers\Reportes\Relaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Relaciones\DocumentoLegalRequest;
use App\Http\Resources\Reportes\Relaciones\DocumentoLegalResource;
use App\Models\Reportes\Relaciones\DocumentoLegal;

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

    public function show(DocumentoLegal $documentoLegal)
    {
        return new DocumentoLegalResource($documentoLegal);
    }

    public function update(DocumentoLegalRequest $request, DocumentoLegal $documentoLegal)
    {
        $documentoLegal->update($request->validated());

        return new DocumentoLegalResource($documentoLegal);
    }

    public function destroy(DocumentoLegal $documentoLegal)
    {
        $documentoLegal->delete();

        return response()->json();
    }
}
