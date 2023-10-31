@php
    if(!empty($icon)){
        $classInput = "block bg-white border border-gray-300 text-gray-500 text-sm rounded-lg outline-0 focus:ring-orange-500 focus:border-orange-500 pl-10 w-full p-2";
    }else{
        $classInput = "block bg-white border border-gray-300 text-gray-500 text-sm rounded-lg outline-0 focus:ring-orange-500 focus:border-orange-500 w-full p-2";
    }
@endphp



<div class="flex flex-col gap-2">
    <label class="font-medium text-sm @error($name) text-red-500 @enderror" for="{{$id}}">{{$label}}</label>
    <div class="relative">
        @if(!empty($icon))
            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-500 @error($name) text-red-500 @enderror">
                {!! $icon !!}
            </div>
        @endif
        <input type="{{$type}}"
               id="{{$id}}"
               name="{{$name}}"
               class="{{$classInput}} @error($name) border-red-500 @enderror"
               placeholder="{{$placeholder}}"
               value="{{old($name)}}"
        >
    </div>
    @error($name)
    <span class="text-xs font-medium text-red-500 inline-flex items-center gap-2"><i class="bi bi-exclamation-circle"></i>{{$message}}</span>
    @enderror
</div>


