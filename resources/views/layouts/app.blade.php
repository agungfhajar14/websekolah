<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', config('app.name', 'Website Profile'))
    </title>

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Tailwind Configuration --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    },
                    boxShadow: {
                        'soft': '0 10px 40px rgba(22, 163, 74, 0.08)',
                        'green': '0 10px 30px rgba(22, 163, 74, 0.15)',
                    }
                }
            }
        }
    </script>

    @stack('styles')
</head>


<body class="min-h-screen bg-gray-50 text-gray-800 antialiased">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <header class="sticky top-0 z-50 border-b border-green-100 bg-white/95 backdrop-blur-lg">

        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl
                            bg-green-600 text-lg font-bold text-white
                            shadow-green">

                    {{ strtoupper(substr(config('app.name', 'W'), 0, 1)) }}

                </div>

                <div>

                    <h1 class="text-lg font-bold tracking-tight text-gray-900">
                        {{ config('app.name', 'Website Profile') }}
                    </h1>

                    <p class="hidden text-xs text-gray-500 sm:block">
                        Website Resmi
                    </p>

                </div>

            </a>


            {{-- Desktop Navigation --}}
            <nav class="hidden items-center gap-8 md:flex">

                <a href="{{ url('/') }}"
                   class="text-sm font-medium transition
                   {{ request()->is('/')
                        ? 'text-green-600'
                        : 'text-gray-600 hover:text-green-600' }}">

                    Home

                </a>


                <a href="{{ url('/profile') }}"
                   class="text-sm font-medium transition
                   {{ request()->is('profile')
                        ? 'text-green-600'
                        : 'text-gray-600 hover:text-green-600' }}">

                    Profile

                </a>


                <a href="{{ url('/about') }}"
                   class="text-sm font-medium transition
                   {{ request()->is('about')
                        ? 'text-green-600'
                        : 'text-gray-600 hover:text-green-600' }}">

                    Tentang Kami

                </a>


                <a href="{{ url('/contact') }}"
                   class="text-sm font-medium transition
                   {{ request()->is('contact')
                        ? 'text-green-600'
                        : 'text-gray-600 hover:text-green-600' }}">

                    Kontak

                </a>


                {{-- Login --}}
                @guest

                    <a href="{{ route('login') }}"
                       class="rounded-lg bg-green-600 px-5 py-2.5
                              text-sm font-semibold text-white
                              shadow-sm transition
                              hover:bg-green-700 hover:shadow-green">

                        Login

                    </a>

                @else

                    <a href="{{ url('/home') }}"
                       class="rounded-lg bg-green-600 px-5 py-2.5
                              text-sm font-semibold text-white
                              shadow-sm transition
                              hover:bg-green-700">

                        Dashboard

                    </a>

                @endguest

            </nav>


            {{-- Mobile Button --}}
            <button
                type="button"
                id="mobile-menu-button"
                class="rounded-lg p-2 text-gray-600
                       transition hover:bg-green-50
                       hover:text-green-600 md:hidden"
                aria-label="Buka menu">

                <svg class="h-6 w-6"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />

                </svg>

            </button>

        </div>


        {{-- Mobile Navigation --}}
        <div id="mobile-menu"
             class="hidden border-t border-green-100 bg-white md:hidden">

            <nav class="mx-auto max-w-7xl space-y-1 px-4 py-4 sm:px-6">

                <a href="{{ url('/') }}"
                   class="block rounded-lg px-4 py-3 text-sm font-medium
                   hover:bg-green-50 hover:text-green-600">

                    Home

                </a>

                <a href="{{ url('/profile') }}"
                   class="block rounded-lg px-4 py-3 text-sm font-medium
                   hover:bg-green-50 hover:text-green-600">

                    Profile

                </a>

                <a href="{{ url('/about') }}"
                   class="block rounded-lg px-4 py-3 text-sm font-medium
                   hover:bg-green-50 hover:text-green-600">

                    Tentang Kami

                </a>

                <a href="{{ url('/contact') }}"
                   class="block rounded-lg px-4 py-3 text-sm font-medium
                   hover:bg-green-50 hover:text-green-600">

                    Kontak

                </a>


                @guest

                    <a href="{{ route('login') }}"
                       class="mt-2 block rounded-lg bg-green-600 px-4 py-3
                              text-center text-sm font-semibold text-white">

                        Login

                    </a>

                @else

                    <a href="{{ url('/home') }}"
                       class="mt-2 block rounded-lg bg-green-600 px-4 py-3
                              text-center text-sm font-semibold text-white">

                        Dashboard

                    </a>

                @endguest

            </nav>

        </div>

    </header>


    {{-- ========================================================= --}}
    {{-- MAIN --}}
    {{-- ========================================================= --}}

    <main class="min-h-[calc(100vh-160px)]">

        {{-- Success --}}
        @if(session('success'))

            <div class="mx-auto max-w-7xl px-4 pt-6 sm:px-6 lg:px-8">

                <div class="rounded-xl border border-green-200
                            bg-green-50 px-5 py-4 text-sm text-green-700
                            shadow-sm">

                    {{ session('success') }}

                </div>

            </div>

        @endif


        {{-- Error --}}
        @if(session('error'))

            <div class="mx-auto max-w-7xl px-4 pt-6 sm:px-6 lg:px-8">

                <div class="rounded-xl border border-red-200
                            bg-red-50 px-5 py-4 text-sm text-red-700
                            shadow-sm">

                    {{ session('error') }}

                </div>

            </div>

        @endif


        {{-- Dynamic Content --}}
        @yield('content')

    </main>


    {{-- ========================================================= --}}
    {{-- FOOTER --}}
    {{-- ========================================================= --}}

    <footer class="border-t border-green-100 bg-white">

        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">

            <div class="grid gap-10 md:grid-cols-3">


                {{-- Brand --}}
                <div>

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center
                                    rounded-xl bg-green-600
                                    font-bold text-white">

                            {{ strtoupper(substr(config('app.name', 'W'), 0, 1)) }}

                        </div>

                        <h2 class="font-bold text-gray-900">

                            {{ config('app.name', 'Website Profile') }}

                        </h2>

                    </div>


                    <p class="mt-4 max-w-sm text-sm leading-7 text-gray-500">

                        Website resmi yang menyediakan informasi,
                        berita, profil, visi dan misi serta berbagai
                        informasi lainnya.

                    </p>

                </div>


                {{-- Navigation --}}
                <div>

                    <h3 class="text-sm font-bold uppercase
                               tracking-wider text-gray-900">

                        Navigasi

                    </h3>

                    <div class="mt-5 space-y-3">

                        <a href="{{ url('/') }}"
                           class="block text-sm text-gray-500
                                  transition hover:text-green-600">

                            Home

                        </a>

                        <a href="{{ url('/profile') }}"
                           class="block text-sm text-gray-500
                                  transition hover:text-green-600">

                            Profile

                        </a>

                        <a href="{{ url('/about') }}"
                           class="block text-sm text-gray-500
                                  transition hover:text-green-600">

                            Tentang Kami

                        </a>

                        <a href="{{ url('/contact') }}"
                           class="block text-sm text-gray-500
                                  transition hover:text-green-600">

                            Kontak

                        </a>

                    </div>

                </div>


                {{-- Contact --}}
                <div>

                    <h3 class="text-sm font-bold uppercase
                               tracking-wider text-gray-900">

                        Kontak

                    </h3>

                    <div class="mt-5 space-y-3 text-sm text-gray-500">

                        <p>
                            Email:
                            {{ config('app.contact_email', 'email@example.com') }}
                        </p>

                        <p>
                            Telepon:
                            {{ config('app.contact_phone', '+62 812-xxxx-xxxx') }}
                        </p>

                        <p>
                            {{ config('app.address', 'Indonesia') }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Bottom --}}
            <div class="mt-10 border-t border-gray-100 pt-6">

                <p class="text-center text-sm text-gray-500">

                    &copy; {{ date('Y') }}

                    <span class="font-medium text-green-600">

                        {{ config('app.name', 'Website Profile') }}

                    </span>

                    . All rights reserved.

                </p>

            </div>

        </div>

    </footer>


    {{-- ========================================================= --}}
    {{-- JAVASCRIPT --}}
    {{-- ========================================================= --}}

    <script>

        const mobileMenuButton =
            document.getElementById('mobile-menu-button');

        const mobileMenu =
            document.getElementById('mobile-menu');


        mobileMenuButton?.addEventListener('click', function () {

            mobileMenu.classList.toggle('hidden');

        });

    </script>


    @stack('scripts')

</body>

</html>
