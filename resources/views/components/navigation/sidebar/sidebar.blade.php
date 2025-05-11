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

                    <x-navigation.sidebar.dropdown>
                        <x-slot:trigger>
                            Access
                        </x-slot:trigger>

                        <x-navigation.sidebar.dropdown.item>
                            Roles
                        </x-navigation.sidebar.dropdown.item>
                        <x-navigation.sidebar.dropdown.item>
                            Permissions
                        </x-navigation.sidebar.dropdown.item>
                    </x-navigation.sidebar.dropdown>
                    
                </ul>
            </li>
            <li class="-mx-6 mt-auto">
                <a href="#" class="flex items-center gap-x-4 px-6 py-3 text-sm/6 font-semibold text-gray-900 hover:bg-gray-50">
                    <img class="size-8 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <span class="sr-only">Your profile</span>
                    <span aria-hidden="true">Tom Cook</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
