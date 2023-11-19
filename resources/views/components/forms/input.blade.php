@props(['error' => null, 'border' => 'border-gray-300', 'borderPy' => 'py-3'])
<input {{ $attributes->merge(['class' => 'px-5 '.$borderPy.' border-2 '.$border.' dark:border-gray-500 dark:bg-dark-primary dark:text-white focus:border-brand-200 focus:ring focus:ring-brand-500 outline-none rounded-md transition-colors ease-in-out duration-200 w-full'.($error ? ' border-red-600' : '')]) }} />
