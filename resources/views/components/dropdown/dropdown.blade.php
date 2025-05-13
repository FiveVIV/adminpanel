@props(['width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php


$width = match ($width) {
    'full' => 'w-full px-3',
    '48' => 'w-48',
    default => $width,
};
@endphp

<div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open" x-ref="button">
        {{ $trigger }}
    </div>

    <div x-show="open" x-anchor.offset.10="$refs.button"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="z-50 mt-2 {{ $width }} rounded-md"
            style="display: none;"
            @click="open = false">
        <div class="rounded-md shadow-lg ring-1 ring-black/5 focus:outline-none {{ $contentClasses }}">
            {{ $slot }}
        </div>
    </div>
</div>