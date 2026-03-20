<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="space-y-1">
            <label for="email"
                class="block font-medium text-sm text-gray-200 tracking-wide">{{ __('Email Address') }}</label>
            <input id="email"
                class="block w-full rounded-md border-0 py-2.5 px-3 bg-white/5 text-white shadow-sm ring-1 ring-inset ring-white/20 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 placeholder:text-gray-400 transition-all"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                placeholder="officer@indiancoastguard.gov.in" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-rose-400" />
        </div>

        <!-- Password -->
        <div class="mt-6 space-y-1" x-data="{ show: false }">
            <label for="password"
                class="block font-medium text-sm text-gray-200 tracking-wide">{{ __('Password') }}</label>
            <div class="relative w-full">
                <input id="password"
                    class="block w-full rounded-md border-0 py-2.5 px-3 bg-white/5 text-white shadow-sm ring-1 ring-inset ring-white/20 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 placeholder:text-gray-400 transition-all pr-12"
                    x-bind:type="show ? 'text' : 'password'" name="password" required autocomplete="current-password"
                    placeholder="••••••••" />
                {{-- <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center justify-center text-white/50 hover:text-white transition-colors focus:outline-none focus:text-white">
                    <svg x-show="!show" class="w-5 h-5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <svg x-show="show" style="display: none;" class="w-5 h-5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                </button> --}}
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-rose-400" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-5">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox"
                    class="rounded bg-white/10 border-white/20 text-orange-500 shadow-sm focus:ring-orange-500 bg-transparent"
                    name="remember">
                <span class="ms-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-8">
            @if (Route::has('password.request'))
                <a class="text-sm text-orange-400 hover:text-orange-300 transition-colors"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit"
                class="inline-flex justify-center items-center rounded-md bg-orange-600 px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 transition-all duration-200 uppercase tracking-widest">
                {{ __('Secure Login') }}
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </button>
        </div>
    </form>
</x-guest-layout>
