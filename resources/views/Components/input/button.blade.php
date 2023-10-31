@php
    switch ($color){
        case 'color':
            $class = "bg-gradient-to-t from-orange-600 to-orange-300 font-bold text-sm rounded-lg shadow-lg px-4 py-2 duration-200 text-white hover:-translate-y-1";
            break;
        case 'non-color':
            $class = "bg-stone-400 font-bold text-sm rounded-lg shadow-lg px-4 py-2 duration-200 text-white hover:-translate-y-1";
            break;
    }
@endphp


@switch($type)
    @case('submit')
    @case('button')
        <button type='{{$type}}' class="{{$class}}" >
            {!! $slot !!}
        </button>
        @break
    @case('disabled')
        <button type='{{$type}}' class="{{$class}} cursor-no-drop" disabled>
            {!! $slot !!}
        </button>
        @break
@endswitch
