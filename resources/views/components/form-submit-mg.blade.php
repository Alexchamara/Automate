<div x-data="{ show: false }" x-show="show" x-init="@if (session()->has('message')) show = true; 
    setTimeout(() => show = false, 3500); @endif"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    @if (session()->has('message'))
        <x-form-success :messages="[session('message')]" />
    @elseif (session()->has('error'))
        <x-form-error :messages="[session('error')]" />
    @endif
</div>