<div class="navbar-admin">
    <div class="flex flex-col gap-2 h-full bg-white text-gray-600 rounded-2xl shadow-2xl overflow-y-auto px-4 py-2">
        <div class="flex items-center justify-center gap-2 py-3">
            <i class="bi bi-dribbble text-2xl"></i><span class="text-sm font-medium">{{__('lang_admin.logo-admin')}}</span>
        </div>
        <hr>
        <div class="flex flex-col gap-2">
            @foreach ($list_menu as $item_menu)
                @if(empty($item_menu['menu_items']))
                    <a href="{{$item_menu['action']}}"
                       class="nav-menu-admin @if($current_route == $item_menu['action']) active-menu @endif"
                    >
                        <span class="text-xl text-orange-500">{!! $item_menu['icon'] !!}</span>
                        {{ $item_menu['title'] }}
                    </a>
                @else
                    <div class="menu-list">
                        <button
                            type="button"
                            class="menu-list-btn justify-between"
                        >
                            <div class="inline-flex gap-2 items-center">
                                <span class="text-xl text-orange-500">{!! $item_menu['icon'] !!}</span>
                                {{ $item_menu['title'] }}
                            </div>
                            <span class="" data-arrow="{{$item_menu['title']}}">
                            <i class="bi bi-chevron-compact-down"></i>
                        </span>
                        </button>
                        <ul class="sub-menu-list">
                            @foreach($item_menu['menu_items'] as $item_menu_sub)
                                <li class="w-full my-2">
                                    <a href="{{$item_menu_sub['action']}}"
                                       class="sub-menu-list-item @if($item_menu_sub['action'] == $current_route) active-menu-sub @endif"
                                    >
                                        {{$item_menu_sub['title']}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<script type="module">

</script>
