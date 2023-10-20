<div class="relative w-full">
    <input type="{{ $type }}"
           placeholder="{{ $label }}"
           name="{{ $name }}"
           id="{{ $id }}"
           @if($required == 'true') required @endif
           class="@if(!empty(trim($icon))) pl-10 @else pl-4 @endif pr-4 py-2 text-gray-400 w-full border-0 border-b border-gray-300 outline-none focus:bg-sky-50  focus:border-blue-300 focus:shadow-md transition-all duration-300"
    >
    @if(!empty(trim($icon)))
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
        {!! $icon !!}
    </div>
    @endif
</div>

