<x-layouts.app>
    <x-slot:header>
        Create permission
    </x-slot:header>

    <x-form method="POST" :action="route('permissions.store')" cancelRoute="permissions.index">
        @method("POST")
        <x-form.item>
            <x-slot:label>
                <x-input.label for="name" :value="__('Name')" />
            </x-slot:label>
            <x-input.text id="name" class="w-full" name="name" required autofocus autocomplete="name" :value="old('name')" />
            <x-input.error :messages="$errors->get('name')" class="mt-2" />
        </x-form.item>
    </x-form>
</x-layouts.app>
