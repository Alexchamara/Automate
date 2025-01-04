@extends('layouts.app')
@section('pages')
    <div class="flex flex-col items-center justify-center space-y-4 text-center p-8 mt-[10%]">
        <i class="fa-regular fa-circle-check text-green-600 text-8xl"></i>

        <x-text tag="h1" size="5xl" weight="bold" color="green-600" class="tracking-wide dark:text-green-600">
            Congratulations!
        </x-text>

        <x-text tag="h2" size="xl" weight="semibold" color="gray-700">
            Your advert is now submitted and after approval it will be published.
        </x-text>

        <x-text tag="p" size="base" color="gray-600">
            Thank you for your payment. Trough this advert potential buyers to contact you. The advert will be live and
            active for 60 days from the day.
            <br>Please visit
            <a href="{{ route('dashboard') }}"
                onclick="event.preventDefault(); window.location.href='{{ route('dashboard') }}?section=myAdverts'"
                class="text-blue-900 underline dark:text-white">
                my adverts section in my account
            </a>
            to manage all your adverts.
        </x-text>

        <x-secondary-button class="mt-4">
            <a href="{{ route('dashboard') }}">
                <i class="fa-solid fa-user-circle mr-1"></i>
                Go to my account
            </a>
        </x-secondary-button>
    </div>
@endsection
