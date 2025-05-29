<x-layouts.app>
    @include("components.table.table", [
    "title" => "Roles",
    "description" => "A list of all roles",
    "columns" => [
    "name" => "Name",
    ],
    "rows" => $roles,
    "resource" => "roles",
    "editable" => true,
    "deletable" => true,
    "creatable" => true,
    "details" => true,
    "permissionSuffix" => "role",
    ])

    <div class="mt-4">
        {{ $roles->links() }}
    </div>
</x-layouts.app>
