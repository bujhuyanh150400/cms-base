<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $icon;
    public $type;
    public $id;
    public $name;
    public $placeholder;

    public function __construct(
        $icon,
        $type,
        $id,
        $name,
        $placeholder
    )
    {
        $this->icon = $icon;
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->placeholder = $placeholder;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.input');
    }
}
