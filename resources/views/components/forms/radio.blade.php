@props(['id' => '', 'checked' => false, 'textClass' => 'text-base', 'disabled' => false])
<div class="flex items-center">
    <div class="checkbox">
        <input {{ $attributes->merge(['class' => 'rounded-full w-5 h-5 border-gray-200 text-brand-500 shadow-sm focus:border-brand-200 focus:ring focus:ring-brand-200 focus:ring-opacity-50 disabled:border-gray-100 disabled:cursor-not-allowed']) }} type="radio" id="{{ $id }}" @if($checked) checked @endif @if($disabled) disabled="disabled" @endif />
        <label for="{{ $id }}" class="radio {{ $disabled ? 'disabled' : '' }}">
            <span class="inline-block ml-1 mt-1 {{ $textClass }}">{{ $slot }}</span>
        </label>
    </div>
</div>
