<x-layouts.app>
    <x-slot:header>
        Edit role
    </x-slot:header>

    <x-form method="POST" :action="route('roles.update', $role)" cancelRoute="roles.index">
        @method("PUT")
        <x-form.item>
            <x-slot:label>
                <x-input.label for="name" :value="__('Name')" />
            </x-slot:label>
            <x-input.text id="name" class="w-full" name="name" required autofocus autocomplete="name" :value="old('name', $role->name)" />
            <x-input.error :messages="$errors->get('name')" class="mt-2" />
        </x-form.item>
        <x-form.item>
            <x-slot:label>
                <x-input.label for="permissions[]" :value="__('Permissions')" />
            </x-slot:label>
            <x-input.checkbox title="Permissions">
                @foreach($permissions as $permission)
                <x-input.checkbox.item name="permissions[]" id="permission-{{ $permission->id }}" :value="$permission->id" :checked="in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray()))">
                    {{ Str::headline($permission->name) }}
                </x-input.checkbox.item>
                @endforeach
            </x-input.checkbox>
        </x-form.item>

    </x-form>
</x-layouts.app>
