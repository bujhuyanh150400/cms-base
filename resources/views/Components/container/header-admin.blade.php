<header class="relative w-full ">
    <div class="flex justify-between items-center text-white">
        <div class="font-bold flex items-center gap-2">
            <button type="button" id="admin-btn_show-hide" class="text-2xl">
                <i class="bi bi-list-nested"></i>
            </button>
            {{ $headerTitle }}
        </div>
        <div class="flex items-center gap-3">
            {{-- searching --}}
            <x-input.input icon='<i class="bi bi-search"></i>' type="text" name="search-header" id="search-header" placeholder="{{__('lang_admin.header-admin.search')}}"  />
            {{-- notification --}}
            <x-dropdown class-btn="text-sm font-bold" id-dropdown="header-notification">
                <x-slot name="btn_dropdown">
                    <i class="bi bi-bell-fill"></i>
                </x-slot>
                <x-slot name="content_dropdown">
                    <div class="min-w-[100px] text-gray-800 text-sm text-center">
                        Chưa làm
                    </div>
                </x-slot>
            </x-dropdown>
            {{-- user  --}}
            <x-dropdown class-btn="inline-flex items-center gap-2 text-sm font-bold"  id-dropdown="header-user">
                <x-slot name="btn_dropdown">
                    <i class="bi bi-person-circle"></i>
                    {{ __('lang_admin.header-admin.hello') }} {{$user_name}}
                </x-slot>
                <x-slot name="content_dropdown">
                    <ul class="py-2 text-sm text-gray-800">
                        <li>
                            <a href="#" class="block px-4 py-2 transition duration-200 hover:bg-gray-400 hover:text-white">My Account</a>
                        </li>
                        <li>
                            <form action="{{ route('logout-admin') }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit"
                                        class="block w-full text-left px-4 py-2 transition text-red-400 duration-200 hover:bg-gray-400 hover:text-white"
                                >
                                    <i class="bi bi-box-arrow-right"></i> Log out
                                </button>
                            </form>
                        </li>
                    </ul>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</header>




