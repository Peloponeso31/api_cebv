<?php

namespace App\View\Components;

use App\Models\Reportes\Relaciones\Desaparecido;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Encabezado extends Component
{
    public string $DesaparecidoId;
    public string $Anio;
    public string $Fecha;
    public string $Folio;

    function __construct(Desaparecido $desaparecido, string $fecha, string|null $folio)
    {
        $this->DesaparecidoId = str_pad($desaparecido->id, 5, '0', STR_PAD_LEFT);
        $this->Anio = substr($fecha, -4);
        $this->Fecha = substr($fecha, 21);
        $this->Folio = $folio ?? 'Sin folio';
    }

    public function render(): View
    {
        return view('components.encabezado');
    }
}
