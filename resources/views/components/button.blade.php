@props(['type' => 'button'])

@if($type === 'a' || $attributes->has('href'))
    <a {{ $attributes->merge(['class' => 'font-medium inline-flex justify-center items-center px-4 py-2 text-base text-center text-white rounded-lg bg-brand-500 hover:bg-brand-700 active:bg-brand-700 focus:border-brand-700 focus:shadow-outline-brand disabled:bg-brand-400 transition-colors ease-in-out duration-200']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => 'font-medium inline-flex justify-center items-center px-4 py-2 text-base tracking-tight text-center text-white rounded-lg bg-brand-500 hover:bg-brand-700 active:bg-brand-700 focus:border-brand-700 focus:shadow-outline-brand disabled:bg-brand-400 transition-colors ease-in-out duration-200']) }}>
        {{ $slot }}
    </button>
@endif
