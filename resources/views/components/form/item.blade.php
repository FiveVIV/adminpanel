<div class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:py-6">
    {{ $label }}
    <div class="mt-2 sm:col-span-2 sm:mt-0">
        <div class="flex flex-col gap-x-3">
            {{ $slot }}
        </div>
    </div>
</div>