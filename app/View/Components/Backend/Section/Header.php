<?php

namespace App\View\Components\Backend\Section;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{

    public function __construct()
    {
    }

    public function render(): View|Closure|string
    {
        unset(Auth::user()->password);
        return view('components.backend.section.header',[
            'user_name'=> Auth::user()->name,
        ]);
    }
}
