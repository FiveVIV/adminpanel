@props(["active"])

@php
    $classes = ($active ?? false)
                ? "block rounded-md py-2 pl-9 pr-2 text-sm/6 text-gray-700 bg-gray-100"
                : "block rounded-md py-2 pl-9 pr-2 text-sm/6 text-gray-700 hover:bg-gray-100"
@endphp






<li>
    <a {{ $attributes->merge(["class" => $classes]) }}>
        {{ $slot }}
    </a>
</li>