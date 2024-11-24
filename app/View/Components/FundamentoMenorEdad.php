<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FundamentoMenorEdad extends Component
{
    public function __construct(public bool $esMenorEdad)
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.fundamento-menor-edad');
    }

    public function shouldRender(): bool
    {
        return $this->esMenorEdad;
    }
}
