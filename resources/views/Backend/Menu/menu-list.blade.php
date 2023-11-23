{{--File này dùng để hiển thị menu-list ra ngoài--}}
<div class="ps-2 my-2 py-1 border-s-2 border-purple-300">
    <div class="flex justify-between items-start text-sm me-2 px-2.5 py-0.5 rounded duration-200 hover:text-purple-800 border hover:border-purple-400 hover:shadow-lg cursor-pointer">
       <div class="flex flex-col gap-1">
           <span class="uppercase font-medium">{{ $menu->title }}</span>
           <span class="text-xs font-medium"><i class="bi bi-three-dots me-1"></i>Mô tả</span>
           <span class="text-xs"> {{ empty($menu->description) ? 'Không có' : $menu->description }}</span>
           <span class="text-xs font-medium"><i class="bi bi-sign-turn-right me-1"></i></i>Đường dẫn</span>
           <span class="text-xs"> {{ empty($menu->description) ? 'Không có' : $menu->description }}</span>
       </div>
        <div class="mt-3 flex items-center gap-2">
            <button
                type="button"
                class="px-1.5 py-1 rounded-lg bg-gradient-to-br from-violet-900 to-pink-500 text-white text-xs font-medium duration-200 outline-none border-none hover:"
            >
                <i class="bi bi-pen"></i>
            </button>
            <button
                type="button"
                class="w-[1.5rem] h-[1.5rem] rounded-lg bg-gradient-to-br from-violet-900 to-pink-500 text-white text-xs font-medium duration-200 outline-none border-none hover:"
            >
                <i class="bi bi-trash"></i>
            </button>
        </div>
    </div>
    @if(count($menu->children))
        <div class="ps-2 py-1 my-1">
            @each('Backend.Menu.menu-list', $menu->children, 'menu','Backend.Menu.menu-list')
        </div>
    @endif
</div>
