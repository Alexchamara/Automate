@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'text-sm text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/30 px-4 py-2 rounded-md']) }}>
        @foreach ((array) $messages as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
@endif