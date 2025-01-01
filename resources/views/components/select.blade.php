{{-- filepath: resources/views/components/select.blade.php --}}
@props(['options' => [], 'value' => null])

<select {{ $attributes->merge(['class' => 'block w-full px-3 py-2 border border-gray-300 dark:border-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm']) }}>
    @foreach($options as $optionValue => $label)
        <option value="{{ $optionValue }}" {{ $value == $optionValue ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>