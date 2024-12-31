@props([
    'bgColor' => 'trasparent', 
    'hoverBgColor' => '[#A82E23]', 
    'textColor' => '[#A82E23]', 
    'darkBgColor' => '[#A82E23]', 
    'darkHoverColor' => '[#D32F2F]'
])

@php
$classes = "bg-{$bgColor} hover:bg-{$hoverBgColor} text-{$textColor} dark:bg-{$darkBgColor} dark:hover:bg-{$darkHoverColor} dark:text-white hover:text-white px-4 py-2 border border-customRed rounded-full ud-btn";
@endphp

<button {{ $attributes->merge(['type' => 'submit','class' => $classes]) }}>
    {{ $slot }}
</button>