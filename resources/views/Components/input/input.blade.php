@if(empty($icon))
    <input type="{{$type}}"
           id="{{$id}}"
           name="{{$name}}"
           class="block bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg outline-0 focus:ring-orange-500 focus:border-orange-500  w-full p-2 "
           placeholder="{{$placeholder}}">
@else
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-500">
            {!! $icon !!}
        </div>
        <input type="{{$type}}"
               id="{{$id}}"
               name="{{$name}}"
               class="block bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg outline-0 focus:ring-orange-500 focus:border-orange-500  w-full pl-10 p-2 "
               placeholder="{{$placeholder}}">
    </div>
@endif

