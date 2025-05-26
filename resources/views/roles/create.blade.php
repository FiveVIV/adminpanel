<x-layouts.app>
    <x-slot:header>
        Edit role
    </x-slot:header>

    <x-form method="POST" :action="route('roles.store')" cancelRoute="roles.index">
        @method("POST")
        <x-form.item>
            <x-slot:label>
                <x-input.label for="name" :value="__('Name')" />
            </x-slot:label>
            <x-input.text id="name" class="w-full" name="name" required autofocus autocomplete="name" :value="old('name')" />
            <x-input.error :messages="$errors->get('name')" class="mt-2" />
        </x-form.item>
        <x-form.item>
            <x-slot:label>
                <x-input.label for="permissions[]" :value="__('Permissions')" />
            </x-slot:label>
            <x-input.checkbox title="Permissions">
                @foreach($permissions as $permission)
                <x-input.checkbox.item name="permissions[]" id="permission-{{ $permission->id }}" :value="$permission->id">
                    {{ Str::headline($permission->name) }}
                </x-input.checkbox.item>
                @endforeach
            </x-input.checkbox>
        </x-form.item>

    </x-form>
</x-layouts.app>
