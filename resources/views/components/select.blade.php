@props(['options' => []])

<select {{ $attributes->merge(['class' => 'block w-full px-3 py-2 border border-gray-300 dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm']) }}>
    @foreach($options as $value => $label)
        <option value="{{ $value }}">{{ $label }}</option>
    @endforeach
</select>