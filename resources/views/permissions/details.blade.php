<x-layouts.app>
    <x-description-list :title="Str::headline($permission->name)" resource="permissions" :model="$permission" permissionSuffix="permission">
        <x-description-list.item label="Name">
            {{ $permission->name }}
        </x-description-list.item>
        <x-description-list.item label="Roles">
            @foreach($permission->roles as $role)
            <li>
                {{ ($role->name) }}
            </li>
            @endforeach
        </x-description-list.item>
    </x-description-list>
</x-layouts.app>
