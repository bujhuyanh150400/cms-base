<div class="drop_down_container relative">
        <div
                data-dropdown="{{trim($idDropdown)}}"
                class="drop_drown_btn cursor-pointer  {{!empty($classBtn) ? $classBtn : 'inline-flex items-center gap-2'}}">
            {{$btn_dropdown}}
        </div>
        <div id="{{trim($idDropdown)}}"
             class="drop_down_list absolute bg-white bg-opacity-90 hidden top-[150%] right-0 z-20 block bg-gray-100 rounded-lg shadow-xl w-auto">
            {{ $content_dropdown }}
        </div>
</div>


