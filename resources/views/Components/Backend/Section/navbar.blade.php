<script type="module">
    const navMenu = {
        openNav: JSON.parse(localStorage.getItem("openNav")),
        subNav: null,
        navMenu: $('#navLeftMenu'),
        toggleNav: () => {
            this.openNav = !this.openNav;
            console.log(this.openNav)
            this.updateLocalStorage();
        },
        updateLocalStorage: () => {
            localStorage.setItem('openNav', this.openNav);
        },
        toggleSubNav: (key) => {
            this.subNav === key ? this.subNav = null : this.subNav = key;
        },
        updateNavStyle: () => {

        }
    }
</script>

<div id="navLeftMenu" class="relative h-full min-h-screen bg-[#0E162A] text-white duration-300 z-20">
    <div class="sticky top-5 left-0">
        <div class="relative flex flex-col text-white p-5">
            <button onclick="return navMenu.toggleNav()"
                    class="absolute bg-white shadow-2xl w-8 h-8 rounded-full text-blue-950 font-bold -right-4 top-[4.7rem] duration-100 hover:scale-110">
                <i class="bi bi-arrow-left"></i>
            </button>
            <div class="inline-flex items-center">
                <div
                    class="bg-amber-300 text-2xl text-blue-900 px-2 py-1 rounded-full block float-left mr-2 duration-500">
                    <i class="bi bi-dribbble "></i>
                </div>
                <h1 class="duration-200 font-bold">{{ __('lang_admin.logo-admin') }}
                </h1>
            </div>

            <div class="w-full h-[1px] bg-gray-200 opacity-90 mt-8 mb-4"></div>
            <ul class="flex flex-col gap-2">
                @foreach ($list_menu as $key => $menu)
                    @if (isset($menu['space_menu']) && $menu['space_menu'] === true)
                        <li class="my-1">
                            <span class="text-sm text-gray-400 font-bold">{{ $menu['title'] }}</span>
                        </li>
                    @else
                        <li class="text-gray-200 text-sm flex items-center gap-2 cursor-pointer p-3 duration-200 hover:bg-[#1E283A] rounded-md @if (!isset($menu['sub_menu']) && $curret_route == $menu['route_name']) bg-[#1E283A] @endif">
                            {{--                            @if (!isset($menu['sub_menu'])) x-on:click='window.location.href ="{{ $menu['action'] }}"'--}}
                            {{--                            @else--}}
                            {{--                                x-on:click="toggleSubNav({{ $key }})" @endif>--}}
                            <div class="text-xl">
                                {!! $menu['icon'] !!}
                            </div>
                            <span :class="!openNav && 'hidden'" class="inline-flex justify-between w-full">
                                    {{ $menu['title'] }} @if (isset($menu['sub_menu']))
                                    <i class="bi bi-chevron-down duration-200"
                                       :class="subNav === {{ $key }} ? 'rotate-180' : ''"></i>
                                @endif
                                </span>
                        </li>
                        @if (isset($menu['sub_menu']))
                            <ul :class="subNav === {{ $key }} ? 'flex flex-col gap-2' : 'hidden'">
                                @foreach ($menu['sub_menu'] as $sub_menu)
                                    <li @if ($curret_route == $sub_menu['route_name']) x-init="subNav = {{ $key }}"
                                        @endif
                                        x-data="{ isTooltipVisible: false }"
                                        class=" relative text-gray-200 text-sm flex items-center gap-2 cursor-pointer p-3 duration-200 hover:bg-gray-500/40 rounded-md
                                            @if ($curret_route == $sub_menu['route_name']) bg-gray-500/40 @endif"
                                        x-on:click="window.location.href ='{{ $sub_menu['action'] }}'"
                                        x-on:mouseenter="isTooltipVisible = true"
                                        x-on:mouseleave="isTooltipVisible = false">
                                        <div>
                                            <i class="bi bi-menu-button-wide"></i>
                                        </div>
                                        <span :class="!openNav && 'hidden'"
                                              class="inline-flex justify-between w-full">
                                                {{ $sub_menu['title'] }}
                                            </span>
                                        <div x-show="isTooltipVisible && !openNav"
                                             class="absolute block w-auto min-w-[5rem] top-0 z-30 left-[4rem] bg-gray-800 text-white p-2 rounded-lg ">
                                            {{ $sub_menu['title'] }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>

