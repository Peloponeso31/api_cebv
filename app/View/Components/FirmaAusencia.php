<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FirmaAusencia extends Component
{

    function __construct(public bool|null $firmaAusencia)
    {

    }

    public function render(): View
    {
        return view('components.firma-ausencia');
    }

    public function shouldRender(): bool
    {
        return $this->firmaAusencia && $this->firmaAusencia != null;
    }
}
