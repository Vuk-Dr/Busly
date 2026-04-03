<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Departure extends Component
{
    public $departure;

    public $i;
    public function __construct($departure, $i)
    {
        $this->departure = $departure;
        $this->i = $i;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.departure');
    }
}
