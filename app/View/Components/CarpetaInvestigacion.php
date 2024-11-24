<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarpetaInvestigacion extends Component
{
    function __construct(public string|null $numeroCarpeta = null)
    {
        //
    }

    public function render(): View
    {
        return view('components.carpeta-investigacion');
    }

    public function shouldRender(): bool
    {

        return strlen($this->numeroCarpeta) > 0;
    }
}
