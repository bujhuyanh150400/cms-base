<?php

namespace App\View\Components\Container;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class NavbarAdmin extends Component
{

    protected $arrayNavMenu = [];
    public function __construct()
    {
        $this->arrayNavMenu = [
            [
                'title' => trans('lang_admin.navbar.dashboard.title'),
                'icon' => '<i class="bi bi-speedometer2"></i>',
                'action' => route('admin-dashboard')
            ],
            [
                'title' => trans('lang_admin.navbar.users.title'),
                'icon' => '<i class="bi bi-people"></i>',
                'menu_items'=>[
                    [
                        'title'=>trans('lang_admin.navbar.users.menu-items.list-users'),
                        'action' => route('admin-dashboard')
                    ],
                ]
            ],
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.container.navbar-admin', [
            'list_menu'=> $this->arrayNavMenu,
            'current-route'=>request()->url(),
        ]);
    }
}
