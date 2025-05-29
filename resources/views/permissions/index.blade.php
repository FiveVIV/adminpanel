<x-layouts.app>
    @include("components.table.table", [
    "title" => "Permissions",
    "description" => "A list of all permissions",
    "columns" => [
    "name" => "Name",
    ],
    "rows" => $permissions,
    "resource" => "permissions",
    "editable" => false,
    "deletable" => false,
    "creatable" => false,
    "permissionSuffix" => "permission"
    ])

    <div class="mt-4">
        {{ $permissions->links() }}
    </div>
</x-layouts.app>
