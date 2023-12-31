<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct
    (
        public string $id,
        public string $label,
        public string $type,
        public string $placeholder,
        public string $name,
        public string $icon,
    )
    {}
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.form-group');
    }
}
