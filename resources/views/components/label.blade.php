@props(['value'])

<label {{ $attributes->merge(['class' => 'block mb-2 text-sm font-bold text-start text-gray-900 dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
