@props(["routes" => []])

@php
    $isActive = collect($routes)->contains(fn ($route) => Route::is($route));
@endphp

<li x-data="{ open: {{ $isActive ? 'true' : 'false' }} }">
    <div>
        {{-- Trigger --}}
        <button @click="open = !open" type="button" class="flex w-full items-center gap-x-3 rounded-md p-2 text-left text-sm/6 font-semibold text-gray-700 hover:bg-gray-50">
            <svg class="size-5 shrink-0" :class="open ? 'rotate-90 text-gray-500' : 'text-gray-400'" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
            {{ $trigger }}
        </button>  
        {{-- /Trigger --}}
        
        {{-- Links --}}
        <ul class="mt-1 mx-2 space-y-2 border-l-2" id="sub-menu-1" x-show="open" style="display: none;">
            {{ $slot }}
        </ul>
        {{-- /Links --}}
    </div>
</li>
