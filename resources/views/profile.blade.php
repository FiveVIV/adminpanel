<x-layouts.app>
    <x-slot:header>
        Profile
    </x-slot:header>


    <div class="max-w-2xl mx-auto px-4 py-8">


        <form action="{{ route('profile') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <x-input.label for="name" :value="__('Name')" />
                <x-input.text id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', auth()->user()->name)" required autofocus autocomplete="name" />
                <x-input.error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div>
                <x-input.label for="email" :value="__('Email')" />
                <x-input.text id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', auth()->user()->email)" required autocomplete="email" />
                <x-input.error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- New Password -->
            <div>
                <x-input.label for="password" :value="__('New Password')" />
                <x-input.text id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                <x-input.error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input.label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input.text id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />
                <x-input.error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit -->
            <div class="flex items-center">
                <x-button.primary>
                    {{ __('Save Changes') }}
                </x-button.primary>
                @if(session("status"))
                <div class="ml-2">
                    {{ session("status") }}
                </div>
                @endif
            </div>
        </form>
    </div>

</x-layouts.app>
