<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="#">
                <img src="{{ asset('img/logo.png') }}" width="60px" >
            </a>
            <h1 style="text-align: center; color: black; margin-top: 10px">Take Care</h1>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email/Phone')" />

                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus />
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <span class="text-danger">{{ $errors->first('password') }}</span>
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

                <x-button class="ml-3 btn btn-primary">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
