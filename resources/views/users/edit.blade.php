<x-layouts.app>
    <x-slot:header>
        Edit user
    </x-slot:header>

    <x-form method="POST" :action="route('users.update', $user)" cancelRoute="users.index">
        @method("PUT")
        <x-form.item>
            <x-slot:label>
                <x-input.label for="name" :value="__('Name')" />
            </x-slot:label>
            <x-input.text id="name" class="w-full" name="name" required autofocus autocomplete="name" :value="old('name', $user->name)" />
            <x-input.error :messages="$errors->get('name')" class="mt-2" />
        </x-form.item>
        <x-form.item>
            <x-slot:label>
                <x-input.label for="email" :value="__('Email')" />
            </x-slot:label>
            <x-input.text id="email" class="w-full" type="email" name="email" required autocomplete="email" :value="old('email', $user->email)" />
            <x-input.error :messages="$errors->get('email')" class="mt-2" />
        </x-form.item>
        <x-form.item>
            <x-slot:label>
                <x-input.label for="email" :value="__('Access')" />
            </x-slot:label>
            <div class="w-full grid md:grid-cols-2 gap-4">
                <x-input.checkbox title="Roles">
                    @foreach($roles as $role)
                    <x-input.checkbox.item name="roles[]" id="role-{{ $role->id }}" :value="$role->id" :checked="in_array($role->id, old('roles', $user->roles->pluck('id')->toArray()))" :data-permissions="$role->permissions->pluck('id')->implode(',')">
                        {{ Str::headline($role->name) }}
                    </x-input.checkbox.item>
                    @endforeach
                </x-input.checkbox>
                <x-input.checkbox title="Permissions">
                    @foreach($permissions as $permission)
                    <x-input.checkbox.item name="permissions[]" id="permission-{{ $permission->id }}" :value="$permission->id" :checked="in_array($permission->id, old('permissions', $user->permissions->pluck('id')->toArray()))">
                        {{ Str::headline($permission->name) }}
                    </x-input.checkbox.item>
                    @endforeach
                </x-input.checkbox>

            </div>
            <x-input.error :messages="$errors->get('email')" class="mt-2" />
        </x-form.item>

    </x-form>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const roleCheckboxes = document.querySelectorAll("input[name='roles[]']");
                const permissionCheckboxes = document.querySelectorAll("input[name='permissions[]']");

                const permissionMap = {};
                roleCheckboxes.forEach(checkbox => {
                    const perms = checkbox.dataset.permissions?.split(',').map(id => parseInt(id)) || [];
                    permissionMap[checkbox.value] = perms;
                });

                function updatePermissions() {
                    let selectedPermissions = new Set();

                    roleCheckboxes.forEach(roleCheckbox => {
                        if (roleCheckbox.checked) {
                            const perms = permissionMap[roleCheckbox.value] || [];
                            perms.forEach(p => selectedPermissions.add(p));
                        }
                    });

                    permissionCheckboxes.forEach(permCheckbox => {
                        permCheckbox.checked = selectedPermissions.has(parseInt(permCheckbox.value));
                    });
                }

                roleCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', updatePermissions);
                });

                updatePermissions();
            });
        </script>
    @endpush
</x-layouts.app>


