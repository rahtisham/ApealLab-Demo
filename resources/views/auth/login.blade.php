
<x-guest-layout>
    <x-jet-authentication-card>
        <!-- <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot> -->

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <x-jet-label for="email" class="mb-1 text-white text-lg" value="{{ __('Email') }}" />
                <x-jet-input id="email" placeholder="user@gmail.com" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4 form-group">
                <x-jet-label for="password" class="mb-1 text-white text-lg" value="{{ __('Password') }}" />
                <x-jet-input id="password" placeholder="........" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4" style="justify-content: space-between !important;">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" class="text-sm"/>
                    <span class="custom-control-label ml-2 text-sm text-white">{{ __('Remember me') }}</span>&nbsp;&nbsp;&nbsp;
                    @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-gray-900 text-white" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </label>
            </div>

            <div class=" items-center justify-end mt-4">
            

                <x-jet-button class="btn bg-white text-primary btn-block">
                    {{ __('Log ins') }}
                </x-jet-button>
                
                <div class="new-account mt-3">
                    <p class="text-white">Don't have an account? <a class="text-white" href="{{ url('register') }}">Sign up</a></p>
                </div>
            </div>
        </form>

            

    </x-jet-authentication-card>
</x-guest-layout>
