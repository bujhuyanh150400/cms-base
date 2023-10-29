<?php

namespace App\View\Components\Container;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class HeaderAdmin extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct(
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        unset(Auth::user()->password);
        return view('components.container.header-admin',[
            'user_name'=> Auth::user()->name,

        ]);
    }
}
