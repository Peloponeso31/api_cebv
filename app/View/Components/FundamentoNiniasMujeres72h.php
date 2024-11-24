<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FundamentoNiniasMujeres72h extends Component
{

    function __construct(public bool|null $mostrar)
    {
        //
    }

    public function render(): View
    {
        return view('components.fundamento-ninias-mujeres-72h');
    }

    public function shouldRender(): bool
    {
        if ($this->mostrar == null) return false;
        return $this->mostrar;
    }
}
