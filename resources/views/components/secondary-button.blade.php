@props([
    'bgColor' => 'trasparent', 
    'hoverBgColor' => '[#0b196f]', 
    'textColor' => '[#0b196f]', 
    'darkBgColor' => '[#A82E23]', 
    'darkHoverColor' => '[#D32F2F]'
])

@php
$classes = "bg-{$bgColor} hover:bg-{$hoverBgColor} text-{$textColor} dark:bg-{$darkBgColor} dark:hover:bg-{$darkHoverColor} dark:text-white hover:text-white px-4 py-2 border border-customBlue rounded-full ud-btn";
@endphp

<button {{ $attributes->merge(['type' => 'submit','class' => $classes]) }}>
    {{ $slot }}
</button>