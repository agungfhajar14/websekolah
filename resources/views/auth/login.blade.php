
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="min-h-[calc(100vh-160px)] bg-gray-50 flex items-center justify-center px-4 py-12">

    <div class="w-full max-w-md">

        {{-- Login Card --}}
        <div class="overflow-hidden rounded-2xl bg-white shadow-xl ring-1 ring-gray-200">

            {{-- Header --}}
            <div class="bg-indigo-600 px-6 py-8 text-center">

                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-white text-indigo-600 shadow">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-7 w-7"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />

                    </svg>

                </div>

                <h2 class="text-2xl font-bold text-white">
                    {{ __('Login') }}
                </h2>

                <p class="mt-2 text-sm text-indigo-100">
                    Silakan masuk untuk melanjutkan
                </p>

            </div>


            {{-- Body --}}
            <div class="px-6 py-8 sm:px-8">

                <form method="POST" action="{{ route('login') }}" class="space-y-6">

                    @csrf


                    {{-- Email --}}
                    <div>

                        <label for="email"
                               class="mb-2 block text-sm font-medium text-gray-700">

                            {{ __('Email Address') }}

                        </label>

                        <div class="relative">

                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5 text-gray-400"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1a3 3 0 006 0v-1a9 9 0 10-18 0v1a9 9 0 0018 0v-1" />

                                </svg>

                            </div>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                autofocus
                                placeholder="nama@email.com"
                                class="block w-full rounded-lg border
                                @error('email')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror
                                bg-gray-50 py-3 pl-10 pr-4 text-sm text-gray-900
                                outline-none transition
                                focus:border-indigo-500
                                focus:ring-2 focus:ring-indigo-200">

                        </div>

                        @error('email')

                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Password --}}
                    <div>

                        <div class="mb-2 flex items-center justify-between">

                            <label for="password"
                                   class="block text-sm font-medium text-gray-700">

                                {{ __('Password') }}

                            </label>

                            @if (Route::has('password.request'))

                                <a href="{{ route('password.request') }}"
                                   class="text-sm font-medium text-indigo-600 hover:text-indigo-500">

                                    {{ __('Forgot Password?') }}

                                </a>

                            @endif

                        </div>


                        <div class="relative">

                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5 text-gray-400"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v2h8z" />

                                </svg>

                            </div>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Masukkan password"
                                class="block w-full rounded-lg border
                                @error('password')
                                    border-red-500
                                @else
                                    border-gray-300
                                @enderror
                                bg-gray-50 py-3 pl-10 pr-4 text-sm text-gray-900
                                outline-none transition
                                focus:border-indigo-500
                                focus:ring-2 focus:ring-indigo-200">

                        </div>

                        @error('password')

                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Remember Me --}}
                    <div class="flex items-center">

                        <input
                            id="remember"
                            type="checkbox"
                            name="remember"
                            {{ old('remember') ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600
                            focus:ring-2 focus:ring-indigo-500">

                        <label for="remember"
                               class="ml-2 text-sm text-gray-600">

                            {{ __('Remember Me') }}

                        </label>

                    </div>


                    {{-- Login Button --}}
                    <button
                        type="submit"
                        class="flex w-full items-center justify-center rounded-lg
                        bg-indigo-600 px-5 py-3 text-sm font-semibold text-white
                        shadow-sm transition
                        hover:bg-indigo-700
                        focus:outline-none
                        focus:ring-2
                        focus:ring-indigo-500
                        focus:ring-offset-2
                        active:bg-indigo-800">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="mr-2 h-5 w-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M11 16l-4-4m0 0l4-4m-4 4h12m-1 8H7a2 2 0 01-2-2V6a2 2 0 012-2h11a2 2 0 012 2v12a2 2 0 01-2 2z" />

                        </svg>

                        {{ __('Login') }}

                    </button>

                </form>

            </div>

        </div>


        {{-- Footer Login --}}
        <p class="mt-6 text-center text-sm text-gray-500">

            &copy; {{ date('Y') }}
            {{ config('app.name', 'Website Profile') }}

        </p>

    </div>

</div>

@endsection
