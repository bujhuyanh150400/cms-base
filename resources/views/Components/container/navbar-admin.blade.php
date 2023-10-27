<div class="fixed top-0 left-0 w-1/6 h-screen bg-transparent p-6">
    <div class="flex flex-col gap-2 h-full bg-gradient-to-b from-stone-400 to-gray-500 text-white rounded-2xl shadow-2xl backdrop-blur backdrop-saturate-200 border border-white overflow-y-auto">
        <div class="flex items-center justify-center border-b py-4 px-2">
            <h1 class="font-bold text-xl"><i class="bi bi-archive"></i> LOGO nào đó</h1>
        </div>
        <div class="py-2 px-5 flex flex-col gap-2">
            @foreach ($list_menu as $item_menu)
                @if(empty($item_menu['menu_items']))
                    <a href="{{$item_menu['action']}}"
                       class="bg-stone-600 p-3 rounded-lg text-"
                    >{!! $item_menu['icon'] !!}
                        {{ $item_menu['title'] }}
                    </a>
                @else
                    <p>This is user {{ $item_menu['title'] }}</p>
                    @foreach($item_menu['menu_items'] as $item_menu_sub)
                        {{$item_menu_sub['title']}}
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</div>
