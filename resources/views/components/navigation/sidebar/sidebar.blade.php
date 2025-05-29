<div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6">
    <div class="flex h-16 shrink-0 items-center">
        <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    </div>
    <nav class="flex flex-1 flex-col">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li>
                <ul role="list" class="-mx-2 space-y-1">
                    <x-navigation.sidebar.item :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-navigation.sidebar.item>
                    <x-navigation.sidebar.item :href="route('users.index')" :active="request()->routeIs('users.*')">
                        Users
                    </x-navigation.sidebar.item>

                    <x-navigation.sidebar.dropdown :routes="['roles.*', 'permissions.*']">
                        <x-slot:trigger>
                            Access
                        </x-slot:trigger>

                        <x-navigation.sidebar.dropdown.item :href="route('roles.index')" :active="request()->routeIs('roles.*')">
                            Roles
                        </x-navigation.sidebar.dropdown.item>
                        <x-navigation.sidebar.dropdown.item :href="route('permissions.index')" :active="request()->routeIs('permissions.*')">
                            Permissions
                        </x-navigation.sidebar.dropdown.item>
                    </x-navigation.sidebar.dropdown>

                </ul>
            </li>
            <li class="-mx-6 mt-auto">
                <x-dropdown width="full">
                    <x-slot:trigger>
                        <button class="flex items-center gap-x-4 px-6 py-3 text-sm/6 font-semibold text-gray-900 hover:bg-gray-50 w-full">
                            <img class="size-8 rounded-full bg-gray-50" src="https://api.dicebear.com/9.x/shapes/svg?seed={{ auth()->user()->name }}" alt="">
                            <span class="sr-only">Your profile</span>
                            <span aria-hidden="true">{{ auth()->user()->name }}</span>
                        </button>
                    </x-slot:trigger>
                    <x-dropdown.link href="{{ route('profile') }}">
                        Profile
                    </x-dropdown.link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown.button class="text-red-500">
                            Logout
                        </x-dropdown.button>
                    </form>

                </x-dropdown>
            </li>
        </ul>
    </nav>
</div>
