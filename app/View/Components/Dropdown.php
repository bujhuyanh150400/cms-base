<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
    public $classBtn;
    public $idDropdown;
    public function __construct(
        $classBtn,
        $idDropdown)
    {
        $this->classBtn = $classBtn;
        $this->idDropdown = $idDropdown;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdown');
    }
}
