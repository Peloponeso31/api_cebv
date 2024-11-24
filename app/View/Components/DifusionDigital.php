<?php

namespace App\View\Components;

use App\Models\MedioDifusion;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DifusionDigital extends Component
{
    function __construct(public int|null $medioDifusion)
    {

    }

    public function render(): View
    {
        return view('components.difusion-digital');
    }

    public function shouldRender(): bool
    {
        return $this->medioDifusion == 1;
    }
}
