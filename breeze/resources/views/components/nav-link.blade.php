@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'text-white border-b-2 border-indigo-300'
                : 'text-white hover:text-indigo-200';
@endphp

<a {{ $attributes->merge(['class' => $classes . ' inline-flex items-center px-1 pt-1 text-sm font-medium leading-5']) }}>
    {{ $slot }}
</a>
