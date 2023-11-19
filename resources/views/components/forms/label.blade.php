<label {{ $attributes->merge(['class' => 'block font-medium leading-5']) }}>
    {{ $value ?? $slot }}
</label>
