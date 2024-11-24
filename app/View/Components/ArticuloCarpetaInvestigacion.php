<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticuloCarpetaInvestigacion extends Component
{
    function __construct(public string|null $numeroCarpeta = null)
    {
        //
    }

    public function render(): View
    {
        return view('components.articulo-carpeta-investigacion');
    }

    public function shouldRender(): bool
    {

        return strlen($this->numeroCarpeta) > 0;
    }
}
