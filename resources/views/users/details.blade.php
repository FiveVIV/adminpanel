<x-layouts.app>
    <x-description-list :title="$user->name" resource="users" :model="$user" delete_permission="delete_user" edit_permission="update_user">
        <x-description-list.item label="Name">
            {{ $user->name }}
        </x-description-list.item>
        <x-description-list.item label="Email">
            {{ $user->email }}
        </x-description-list.item>
        <x-description-list.item label="Roles">
            @foreach($user->roles as $role)
            <li>
                {{ Str::headline($role->name) }}
            </li>
            @endforeach
        </x-description-list.item>
        <x-description-list.item label="Permissions">
            @foreach($user->permissions as $permission)
            <li>
                {{ Str::headline($permission->name) }}
            </li>
            @endforeach
        </x-description-list.item>
    </x-description-list>
</x-layouts.app>
