<div class="drop_down_container relative">
        <button type="button"
                data-dropdown="{{trim($idDropdown)}}"
                class="drop_drown_btn  {{!empty($classBtn) ? $classBtn : 'inline-flex items-center gap-2'}}">
            {{$btn_dropdown}}
        </button>
        <div id="{{trim($idDropdown)}}"
             class="drop_down_list absolute bg-gray-100 bg-opacity-80 hidden top-[150%] right-0 z-20 block bg-gray-100 rounded-lg shadow-xl w-auto">
            {{ $content_dropdown }}
        </div>
    </div>


