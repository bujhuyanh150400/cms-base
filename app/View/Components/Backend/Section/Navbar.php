<?php

namespace App\View\Components\Backend\Section;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Navbar extends Component
{

    protected $arrayNavMenu = [];
    public function __construct()
    {
        $this->arrayNavMenu = [
            [
                'title' => trans('lang_admin.dashboard_title'),
                'icon' => '<i class="bi bi-speedometer2"></i>',
                'action' => route('admin-dashboard'),
                'route_name'=>'admin-dashboard'
            ],
            [
                'title' => trans('lang_admin.internal'),
                'space_menu'=> true,

            ],
            [
                'title' => trans('lang_admin.user-manager'),
                'icon' => '<i class="bi bi-people"></i>',
                'sub_menu'=>[
                    [
                        'title'=>trans('lang_admin.list-user'),
                        'action' => route('users/list'),
                        'route_name'=>'users'
                    ],
                     [
                         'title'=>trans('lang_admin.list-role'),
                         'action' => route('role/list'),
                         'route_name'=>'role'
                     ],
                ]
            ],


        ];
    }

    public function render(): View|Closure|string
    {
        $route_name = Route::currentRouteName();
        $parts = explode('/', $route_name);
        $current_route = reset($parts);
        return view('components.backend.section.navbar', [
            'list_menu'=> $this->arrayNavMenu,
            'curret_route'=>$current_route,
        ]);
    }
}
