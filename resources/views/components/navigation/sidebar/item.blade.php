@props(["active"])

@php
    $classes = ($active ?? false)
                ? "block rounded-md bg-gray-100 py-2 pl-10 pr-2 text-sm/6 font-semibold text-gray-700"
                : "block rounded-md hover:bg-gray-100 py-2 pl-10 pr-2 text-sm/6 font-semibold text-gray-700"
@endphp






<li>
    <a {{ $attributes->merge(["class" => $classes]) }}>
        {{ $slot }}
    </a>
</li>