<x-layouts.app>

    @include("components.table.table", [
    "title" => "Users",
    "description" => "A list of users including name, title, email and role.",
    "columns" => [
    "name" => "Name",
    "email" => "Email",
    ],
    "rows" => $users,
    "resource" => "users",
    "editable" => true,
    "deletable" => true,
    "creatable" => false,
    "permissionSuffix" => "user"
    ])

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</x-layouts.app>
