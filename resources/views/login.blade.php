<x-layouts.guest>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="{{ route('login') }}" method="POST">
      @csrf

        <div>
            <x-input.label for="email" :value="__('Email')" />
            <x-input.text id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="email" />
            <x-input.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input.label for="password" :value="__('Password')" />

            <x-input.text id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input.error :messages="$errors->get('password')" class="mt-2" />
        </div>

      <div class="flex items-center">
        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
        <label for="remember" class="ml-2 block text-sm text-gray-900">Remember me</label>
      </div>

      <div>
        <button type="submit"
          class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm/6 text-gray-500">
      Not a member?
      {{-- <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Register here</a> --}}
    </p>
  </div>
</div>
</x-layouts.guest>