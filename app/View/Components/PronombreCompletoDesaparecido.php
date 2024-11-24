<?php

namespace App\View\Components;

use App\Models\Reportes\Relaciones\Desaparecido;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PronombreCompletoDesaparecido extends Component
{
    function __construct(public Desaparecido $desaparecido)
    {

    }

    public function render(): View
    {
        return view('components.pronombre-completo-desaparecido');
    }
}
