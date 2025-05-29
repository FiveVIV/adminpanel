<x-layouts.app>
    <x-description-list :title="$role->name" resource="roles" :model="$role" permissionSuffix="role">
        <x-description-list.item label="Name">
            {{ $role->name }}
        </x-description-list.item>
        <x-description-list.item label="Permissions">
            @foreach($role->permissions as $permission)
            <li>
                {{ Str::headline($permission->name) }}
            </li>
            @endforeach
        </x-description-list.item>
    </x-description-list>
</x-layouts.app>
