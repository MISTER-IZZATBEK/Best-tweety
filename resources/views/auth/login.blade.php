<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img class="w-20" src="https://www.pngkey.com/png/detail/2-27646_twitter-logo-png-transparent-background-logo-twitter-png.png" alt="Twitter Logo Png Transparent Background - Logo Twitter Png@pngkey.com">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3 ">
                    {{ __('Login') }}
                </x-button>
            </div>
        </form>
        <p style="text-align:center">OR</p>

               <div class="block text-center mt-4 "> <x-button class=" w-full bg-red-500 hover:bg-red-600">  <a href="{{route('login.google')}}" class="w-full">Login with Google </a> </x-button></div>
               <div class="block text-center mt-4 "><x-button class=" w-full bg-blue-500 hover:bg-blue-600">  <a href="{{route('login.facebook')}}" class="w-full">Login with Facebook </a> </x-button></div>
               <div class="block text-center mt-4 "> <x-button class=" w-full ">  <a href="{{route('login.github')}}" class=" w-full">Login with Github </a> </x-button></div>


    </x-auth-card>
</x-guest-layout>
