<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="h-full">
    <div x-data="{ sidebar: false }">
        <div class="relative z-50 lg:hidden" role="dialog" aria-modal="true" x-show="sidebar">
            <div class="fixed inset-0 bg-gray-900/80" aria-hidden="true" x-show="sidebar"
                x-transition:enter="transition-opacity ease-linear duration-300" 
                x-transition:enter-start="opacity-0" 
                x-transition:enter-end="opacity-100" 
                x-transition:leave="transition ease-linear duration-300" 
                x-transition:leave-start="opacity-100" 
                x-transition:leave-end="opacity-0"
                ></div>

            <div class="fixed inset-0 flex">

                <div class="relative mr-16 flex w-full max-w-xs flex-1" x-show="sidebar"
                    x-transition:enter="transition ease-in-out duration-300 transform" 
                    x-transition:enter-start="-translate-x-full" 
                    x-transition:enter-end="translate-x-0" 
                    x-transition:leave="transition ease-in-out duration-300 transform" 
                    x-transition:leave-start="translate-x-0" 
                    x-transition:leave-end="-translate-x-full"
                >
                    <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                        <button type="button" class="-m-2.5 p-2.5" @click="sidebar = false">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <x-navigation.sidebar />


                </div>
            </div>
        </div>

        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <x-navigation.sidebar />
        </div>

        <div class="sticky top-0 z-40 flex items-center gap-x-6 bg-white px-4 py-4 shadow-sm sm:px-6 lg:hidden">
            <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="sidebar = true">
                <span class="sr-only">Open sidebar</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>

        <main class="py-10 lg:pl-72">
            <div class="px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>
</html>
