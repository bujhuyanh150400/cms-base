<header class="relative w-full h-auto ">
    <div class="absolute top-0 left-0 bg-gradient-to-br from-violet-900 to-pink-500 h-[10rem] w-full z-[-1]"></div>
    <div class="mx-10 py-10 flex justify-between items-center z-20">
            <h1 class="font-bold text-white">
                {{ $title }}
            </h1>

        <div class="bg-transparent flex items-center gap-4">
            {{-- Searching    --}}
            <div class="relative py-1.5 pr-2 pl-8  rounded-lg shadow-2xl bg-white">
                <input type="text" class="border-none outline-none bg-none text-sm text-gray-600"
                       placeholder="Tìm kiếm">
                <button class="absolute top-1/2 left-2 -translate-y-1/2 ">
                    <i class="bi bi-search text-gray-600"></i>
                </button>
            </div>
            <button type="button" class="text-white px-2 py-1">
                <i class="bi bi-bell-fill"></i>
            </button>
            <div x-data="{
                    openDropDown: false,
                    toggleOpenDropDown() {
                        this.openDropDown = !this.openDropDown
                    }
                }"
                class="relative"
            >
                <button x-on:click="toggleOpenDropDown" class="text-white px-2 py-1">
                    <i class="bi bi-person-circle"></i>
                </button>
                <div
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    @click.away="openDropDown = false"
                    class="absolute w-auto min-w-[10rem] top-10 right-0 h-auto bg-white rounded-lg shadow-2xl py-2 z-20 hidden"
                    :class="openDropDown && block"
                >
                    <p class="text-xs text-center font-medium">{{__('lang_admin.hello')}} {{$user_name}}</p>
                    <div class="mt-2 w-full h-[1px] bg-gray-300"></div>
                    <form action="{{ route('logout-admin') }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit"
                                class="block w-full text-left px-4 py-1 transition text-sm text-red-400 duration-200 hover:bg-gray-300 hover:text-white"
                        >
                            <i class="bi bi-box-arrow-right"></i> Log out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
