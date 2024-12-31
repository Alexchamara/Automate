@props([
    'tag' => 'span',
    'size' => 'base',
    'color' => 'black',
    'darkColor' => 'gray-100',
    'weight' => 'normal'
])

@php
$sizes = [
    'xs' => 'text-xs',
    'sm' => 'text-sm',
    'base' => 'text-base',
    'lg' => 'text-lg',
    'xl' => 'text-xl',
    '2xl' => 'text-2xl',
];

$weights = [
    'light' => 'font-light',
    'normal' => 'font-normal',
    'medium' => 'font-medium',
    'semibold' => 'font-semibold',
    'bold' => 'font-bold'
];

$classes = $attributes->merge([
    'class' => "{$sizes[$size]} {$weights[$weight]} text-{$color} dark:text-{$darkColor} transition-colors duration-200"
])->get('class');
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</{{ $tag }}>