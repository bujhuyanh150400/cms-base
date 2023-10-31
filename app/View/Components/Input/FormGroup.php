<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormGroup extends Component
{
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
    public function render(): View|Closure|string
    {
        return view('components.input.form-group');
    }
}
