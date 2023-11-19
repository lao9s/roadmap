@props(['type' => ''])

@php
    $typeClasses = match ($type) {
        'info' => 'bg-indigo-100 text-indigo-800',
        'success' => 'bg-lime-100 text-lime-600',
        'warning' => 'bg-orange-100 text-orange-600',
        'error' => 'bg-red-100 text-red-600',
        'dark' => 'bg-gray-800 text-gray-100',
        default => 'bg-gray-100 text-gray-800',
    };
@endphp

<span {{ $attributes->merge(['class' => 'px-2 inline-flex items-center rounded-md '. $typeClasses]) }}>
       {{ $slot }}
</span>
