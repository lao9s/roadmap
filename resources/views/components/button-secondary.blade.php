@props(['type' => 'button'])

@if($type === 'a' || $attributes->has('href'))
    <a {{ $attributes->merge(['class' => 'inline-flex justify-center items-center px-4 py-2 text-base tracking-widest text-center bg-white text-gray-900 rounded-lg hover:bg-gray-400 transition-colors ease-in-out duration-200']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => 'inline-flex justify-center items-center px-4 py-2 text-base tracking-widest text-center bg-white text-gray-900 rounded-lg hover:bg-gray-400 focus:ring-4 transition-colors ease-in-out duration-200']) }}>
        {{ $slot }}
    </button>
@endif
