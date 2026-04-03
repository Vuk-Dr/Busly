<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GenericTable extends Component
{
    public $items;
    public $tableName;

    public function __construct($items, $tableName)
    {
        $this->items = $items;
        $this->tableName = $tableName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.generic-table');
    }
}
