<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>
        @yield('title', 'Dashboard Admin')
        - {{ config('app.name', 'Website Sekolah') }}
    </title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

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
                    }
                }
            }
        }
    </script>

    @stack('styles')

</head>


<body class="bg-slate-50 text-slate-800 antialiased">


<div class="min-h-screen">


    {{-- ===================================================== --}}
    {{-- MOBILE OVERLAY --}}
    {{-- ===================================================== --}}

    <div
        id="sidebar-overlay"
        class="fixed inset-0 z-40 hidden bg-black/40 backdrop-blur-sm lg:hidden">
    </div>


    {{-- ===================================================== --}}
    {{-- SIDEBAR --}}
    {{-- ===================================================== --}}

    <aside
        id="sidebar"
        class="
            fixed inset-y-0 left-0 z-50
            flex w-72 flex-col
            border-r border-slate-200
            bg-white
            shadow-xl
            transition-transform duration-300
            -translate-x-full
            lg:translate-x-0
        "
    >

        {{-- BRAND --}}
        <div
            class="
                flex h-20 shrink-0
                items-center
                border-b border-slate-100
                px-6
            "
        >

            <div
                class="
                    flex h-11 w-11
                    items-center justify-center
                    rounded-xl
                    bg-green-600
                    text-lg font-bold text-white
                    shadow-lg shadow-green-600/20
                "
            >
                {{ strtoupper(substr(config('app.name', 'A'), 0, 1)) }}
            </div>


            <div class="ml-3 min-w-0">

                <h1 class="truncate font-bold text-slate-900">

                    {{ config('app.name', 'Admin Panel') }}

                </h1>

                <p class="text-xs text-slate-400">

                    Administrator

                </p>

            </div>


            {{-- MOBILE CLOSE --}}
            <button
                id="close-sidebar"
                type="button"
                class="
                    ml-auto rounded-lg p-2
                    text-slate-400
                    hover:bg-slate-100
                    lg:hidden
                "
            >

                <svg
                    class="h-5 w-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />

                </svg>

            </button>

        </div>


        {{-- NAVIGATION --}}
        <nav class="flex-1 space-y-1 overflow-y-auto p-4">


            {{-- DASHBOARD --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="
                    flex items-center gap-3
                    rounded-xl px-4 py-3
                    text-sm font-medium
                    transition
                    {{ request()->routeIs('admin.dashboard')
                        ? 'bg-green-50 text-green-700 shadow-sm'
                        : 'text-slate-600 hover:bg-green-50 hover:text-green-700'
                    }}
                "
            >

                <span class="text-lg">▦</span>

                Dashboard

            </a>


            {{-- PROFIL --}}
            <a
                href="#"
                class="
                    flex items-center gap-3
                    rounded-xl px-4 py-3
                    text-sm font-medium
                    text-slate-600
                    transition
                    hover:bg-green-50
                    hover:text-green-700
                "
            >

                <span class="text-lg">🏫</span>

                Profil Sekolah

            </a>


            {{-- SLIDER --}}
            <a
                href="/admin/slider"
                class="
                    flex items-center gap-3
                    rounded-xl px-4 py-3
                    text-sm font-medium
                    text-slate-600
                    transition
                    hover:bg-green-50
                    hover:text-green-700
                "
            >

                <span class="text-lg">🖼</span>

                Slider

            </a>


            {{-- BERITA --}}
            <a
                href="{{ route('admin.berita.index') }}"
                class="
                    flex items-center gap-3
                    rounded-xl px-4 py-3
                    text-sm font-medium
                    transition
                    {{ request()->routeIs('admin.berita.*')
                        ? 'bg-green-50 text-green-700 shadow-sm'
                        : 'text-slate-600 hover:bg-green-50 hover:text-green-700'
                    }}
                "
            >

                <span class="text-lg">📰</span>

                Berita

            </a>


            {{-- KATEGORI --}}
            <a
                href="/admin/kategori-berita"
                class="
                    flex items-center gap-3
                    rounded-xl px-4 py-3
                    text-sm font-medium
                    text-slate-600
                    transition
                    hover:bg-green-50
                    hover:text-green-700
                "
            >

                <span class="text-lg">🏷</span>

                Kategori Berita

            </a>

        </nav>


        {{-- SIDEBAR FOOTER --}}
        <div
            class="
                shrink-0
                border-t border-slate-100
                p-4
            "
        >

            <div
                class="
                    rounded-xl
                    bg-green-50
                    p-4
                "
            >

                <p class="text-xs font-semibold text-green-700">

                    Website Sekolah

                </p>

                <p class="mt-1 text-xs text-green-600">

                    Panel Administrasi

                </p>

            </div>

        </div>

    </aside>


    {{-- ===================================================== --}}
    {{-- MAIN --}}
    {{-- ===================================================== --}}

    <main class="lg:pl-72">


        {{-- ================================================= --}}
        {{-- HEADER --}}
        {{-- ================================================= --}}

        <header
            class="
                sticky top-0 z-30
                flex h-20
                items-center justify-between
                border-b border-slate-200
                bg-white/90
                px-4
                backdrop-blur-xl
                sm:px-6
                lg:px-8
            "
        >

            <div class="flex items-center gap-3">


                {{-- MOBILE MENU --}}
                <button
                    id="open-sidebar"
                    type="button"
                    class="
                        rounded-xl
                        border border-slate-200
                        bg-white p-2.5
                        text-slate-600
                        shadow-sm
                        hover:bg-slate-50
                        lg:hidden
                    "
                >

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                    </svg>

                </button>


                <div>

                    <h2 class="text-lg font-bold text-slate-900 sm:text-xl">

                        @yield('header', 'Dashboard')

                    </h2>

                    <p class="hidden text-sm text-slate-400 sm:block">

                        Kelola website sekolah

                    </p>

                </div>

            </div>


            {{-- USER --}}
            <div class="flex items-center gap-3">

                <div class="hidden text-right sm:block">

                    <p class="text-sm font-semibold text-slate-800">

                        {{ Auth::user()->name ?? 'Administrator' }}

                    </p>

                    <p class="text-xs text-slate-400">

                        Administrator

                    </p>

                </div>


                <div
                    class="
                        flex h-10 w-10
                        items-center justify-center
                        rounded-full
                        bg-green-100
                        font-bold text-green-700
                        ring-4 ring-green-50
                    "
                >

                    {{ strtoupper(
                        substr(Auth::user()->name ?? 'A', 0, 1)
                    ) }}

                </div>

            </div>

        </header>


        {{-- ================================================= --}}
        {{-- CONTENT --}}
        {{-- ================================================= --}}

        <div class="min-h-[calc(100vh-80px)] p-4 sm:p-6 lg:p-8">


            {{-- SUCCESS --}}
            @if(session('success'))

                <div
                    class="
                        mb-6 flex items-center gap-3
                        rounded-xl
                        border border-green-200
                        bg-green-50
                        px-5 py-4
                        text-sm text-green-700
                        shadow-sm
                    "
                >

                    <span class="text-lg">✓</span>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            {{-- ERROR --}}
            @if(session('error'))

                <div
                    class="
                        mb-6 flex items-center gap-3
                        rounded-xl
                        border border-red-200
                        bg-red-50
                        px-5 py-4
                        text-sm text-red-700
                        shadow-sm
                    "
                >

                    <span class="text-lg">!</span>

                    <span>
                        {{ session('error') }}
                    </span>

                </div>

            @endif


            {{-- VALIDATION ERROR --}}
            @if($errors->any())

                <div
                    class="
                        mb-6 rounded-xl
                        border border-red-200
                        bg-red-50
                        p-5
                        text-sm text-red-700
                    "
                >

                    <p class="font-semibold">
                        Terdapat kesalahan:
                    </p>

                    <ul class="mt-2 list-disc pl-5">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            @yield('content')

        </div>

    </main>

</div>


{{-- ========================================================= --}}
{{-- MOBILE SIDEBAR SCRIPT --}}
{{-- ========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const sidebar =
        document.getElementById('sidebar');

    const overlay =
        document.getElementById('sidebar-overlay');

    const openButton =
        document.getElementById('open-sidebar');

    const closeButton =
        document.getElementById('close-sidebar');


    function openSidebar() {

        sidebar.classList.remove('-translate-x-full');

        overlay.classList.remove('hidden');

        document.body.classList.add('overflow-hidden');

    }


    function closeSidebar() {

        sidebar.classList.add('-translate-x-full');

        overlay.classList.add('hidden');

        document.body.classList.remove('overflow-hidden');

    }


    openButton?.addEventListener(
        'click',
        openSidebar
    );


    closeButton?.addEventListener(
        'click',
        closeSidebar
    );


    overlay?.addEventListener(
        'click',
        closeSidebar
    );

});

</script>


{{-- ========================================================= --}}
{{-- PAGE SCRIPTS --}}
{{-- ========================================================= --}}

@stack('scripts')

</body>

</html>
