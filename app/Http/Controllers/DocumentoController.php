<?php

namespace App\Http\Controllers;

use App\Models\Reportes\Relaciones\Desaparecido;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentoController extends Controller
{
    public function fichaBusquedaInmediata(string $desaparecido)
    {
        $desaparecido = Desaparecido::findOrFail($desaparecido);

        // TODO: Nicolas: El que esta bien es el copy, el que generes renombralo de manera que tenga sentido
        return Pdf::loadView('reportes.ficha_bi_copy')->stream();
    }
}
