@props(['active'])

@php
    $classes = $active ?? false ? 'rounded-md flex justify-start block w-full pl-3 pr-4 py-2 text-sm text-left text-base font-medium text-green-700 bg-white focus:outline-none focus:text-indigo-800 focus:bg-white-100 focus:border-indigo-700 transition duration-150 ease-in-out' : 'rounded-md flex justify-start block w-full pl-3 pr-4 py-2 border-transparent text-sm text-left text-base font-medium text-white hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
