@props(['href'=> null, 'active' => false])

@if($href)
    <a href="{{ $href }}"
       class="{{ $active ? 'border-indigo-500 text-indigo-500' : 'border-gray-200 dark:text-white hover:text-indigo-500'  }} flex items-center border-b-2 pb-2 mr-5 last:mr-0 font-medium transition-colors ease-in-out duration-200">
        {{ $slot }}
    </a>
@else
    <button
        type="button"
        class="{{ $active ? 'border-indigo-500 text-indigo-500' : 'border-gray-200'  }} hover:text-indigo-500 flex items-center border-b-2 pb-2 mr-5 last:mr-0 font-medium transition-colors ease-in-out duration-200">
        {{ $slot }}
    </button>
@endif

