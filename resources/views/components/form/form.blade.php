<form {{ $attributes->merge(["class" => "space-y-12 sm:space-y-16"]) }}>
    @csrf
<div>
    <div>
        <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
        <p class="mt-1 max-w-2xl text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>
        <div class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
            {{ $slot }}
        </div>
    </div>
</div>
<div class="mt-6 flex items-center justify-between gap-x-6">
    <a href="{{ route($cancelRoute) }}">
        <x-button.danger type="button">
            Cancel
        </x-button.danger>
    </a>
    <x-button.success type="submit">
        Save
    </x-button.success>
</div>
</form>
