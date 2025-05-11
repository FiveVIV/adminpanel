<li>
    <a {{ $attributes->merge(["class" => "block rounded-md py-2 pl-9 pr-2 text-sm/6 text-gray-700 hover:bg-gray-100"]) }}>
        {{ $slot }}
    </a>
</li>