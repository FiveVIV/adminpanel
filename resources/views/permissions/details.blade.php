<x-layouts.app>
    <x-description-list :title="$permission->name" resource="roles" :model="$permission" permissionSuffix="permission">
        <x-description-list.item label="Name">
            {{ $permission->name }}
        </x-description-list.item>
        <x-description-list.item label="Roles">
            @foreach($permission->roles as $role)
            <li>
                {{ Str::headline($role->name) }}
            </li>
            @endforeach
        </x-description-list.item>
    </x-description-list>
</x-layouts.app>
