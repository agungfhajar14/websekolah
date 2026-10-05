@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('header', 'Dashboard')

@section('content')

    {{-- WELCOME --}}
    <div class="
        overflow-hidden
        rounded-3xl
        border border-green-100
        bg-gradient-to-r
        from-green-600
        to-emerald-700
        p-7
        text-white
        shadow-xl shadow-green-900/10
    ">

        <div class="max-w-2xl">

            <p class="text-sm font-medium text-green-100">
                Selamat datang 👋
            </p>

            <h1 class="
                mt-2
                text-3xl
                font-bold
            ">
                Dashboard Administrator
            </h1>

            <p class="
                mt-3
                text-sm
                leading-6
                text-green-50/80
            ">
                Kelola informasi website sekolah,
                berita, slider, profil, dan konten lainnya
                melalui dashboard ini.
            </p>

        </div>

    </div>


    {{-- STATISTICS --}}
    <div class="
        mt-8
        grid
        gap-5
        sm:grid-cols-2
        xl:grid-cols-4
    ">

        {{-- BERITA --}}
        <div class="
            rounded-2xl
            border border-slate-200
            bg-white
            p-6
            shadow-sm
            transition
            hover:-translate-y-1
            hover:shadow-xl
        ">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Berita
                    </p>

                    <p class="
                        mt-2
                        text-3xl
                        font-bold
                    ">
                        {{ $totalBerita }}
                    </p>

                </div>

                <div class="
                    flex h-12 w-12
                    items-center justify-center
                    rounded-xl
                    bg-green-50
                    text-xl
                ">
                    📰
                </div>

            </div>

        </div>


        {{-- PUBLISHED --}}
        <div class="
            rounded-2xl
            border border-slate-200
            bg-white
            p-6
            shadow-sm
            transition
            hover:-translate-y-1
            hover:shadow-xl
        ">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Berita Published
                    </p>

                    <p class="
                        mt-2
                        text-3xl
                        font-bold
                        text-green-600
                    ">
                        {{ $beritaPublished }}
                    </p>

                </div>

                <div class="
                    flex h-12 w-12
                    items-center justify-center
                    rounded-xl
                    bg-green-50
                ">
                    ✓
                </div>

            </div>

        </div>


        {{-- DRAFT --}}
        <div class="
            rounded-2xl
            border border-slate-200
            bg-white
            p-6
            shadow-sm
            transition
            hover:-translate-y-1
            hover:shadow-xl
        ">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Draft
                    </p>

                    <p class="
                        mt-2
                        text-3xl
                        font-bold
                        text-orange-500
                    ">
                        {{ $beritaDraft }}
                    </p>

                </div>

                <div class="
                    flex h-12 w-12
                    items-center justify-center
                    rounded-xl
                    bg-orange-50
                ">
                    📝
                </div>

            </div>

        </div>


        {{-- SLIDER --}}
        <div class="
            rounded-2xl
            border border-slate-200
            bg-white
            p-6
            shadow-sm
            transition
            hover:-translate-y-1
            hover:shadow-xl
        ">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Slider Aktif
                    </p>

                    <p class="
                        mt-2
                        text-3xl
                        font-bold
                    ">
                        {{ $totalSlider }}
                    </p>

                </div>

                <div class="
                    flex h-12 w-12
                    items-center justify-center
                    rounded-xl
                    bg-blue-50
                ">
                    🖼
                </div>

            </div>

        </div>

    </div>


    {{-- CONTENT GRID --}}
    <div class="
        mt-8
        grid
        gap-6
        xl:grid-cols-3
    ">

        {{-- BERITA TERBARU --}}
        <div class="
            overflow-hidden
            rounded-2xl
            border border-slate-200
            bg-white
            shadow-sm
            xl:col-span-2
        ">

            <div class="
                flex items-center
                justify-between
                border-b border-slate-100
                px-6 py-5
            ">

                <div>

                    <h3 class="font-bold">
                        Berita Terbaru
                    </h3>

                    <p class="text-sm text-slate-400">
                        Daftar berita terbaru
                    </p>

                </div>

                <a
                    href="#"
                    class="
                        rounded-lg
                        bg-green-50
                        px-3 py-2
                        text-sm font-semibold
                        text-green-700
                    "
                >
                    Kelola
                </a>

            </div>


            <div class="divide-y divide-slate-100">

                @forelse($beritaTerbaru as $berita)

                    <div class="
                        flex
                        items-center
                        justify-between
                        gap-4
                        px-6 py-4
                    ">

                        <div class="flex min-w-0 items-center gap-4">

                            @if($berita->gambar)

                                <img
                                    src="{{ asset('storage/' . $berita->gambar) }}"
                                    class="
                                        h-14 w-14
                                        rounded-xl
                                        object-cover
                                    "
                                    alt=""
                                >

                            @else

                                <div class="
                                    flex h-14 w-14
                                    shrink-0
                                    items-center
                                    justify-center
                                    rounded-xl
                                    bg-green-50
                                    text-green-600
                                ">
                                    📰
                                </div>

                            @endif


                            <div class="min-w-0">

                                <h4 class="
                                    truncate
                                    font-semibold
                                ">
                                    {{ $berita->judul }}
                                </h4>

                                <p class="
                                    mt-1
                                    text-xs
                                    text-slate-400
                                ">
                                    {{ $berita->kategori?->nama ?? 'Tanpa kategori' }}
                                </p>

                            </div>

                        </div>


                        @if($berita->status === 'published')

                            <span class="
                                shrink-0
                                rounded-full
                                bg-green-50
                                px-3 py-1
                                text-xs
                                font-semibold
                                text-green-700
                            ">
                                Published
                            </span>

                        @else

                            <span class="
                                shrink-0
                                rounded-full
                                bg-orange-50
                                px-3 py-1
                                text-xs
                                font-semibold
                                text-orange-600
                            ">
                                Draft
                            </span>

                        @endif

                    </div>

                @empty

                    <div class="
                        px-6 py-12
                        text-center
                    ">

                        <div class="text-4xl">
                            📰
                        </div>

                        <p class="
                            mt-3
                            font-semibold
                        ">
                            Belum ada berita
                        </p>

                        <p class="
                            mt-1
                            text-sm
                            text-slate-400
                        ">
                            Tambahkan berita pertama Anda.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>


        {{-- QUICK ACTION --}}
        <div class="
            rounded-2xl
            border border-slate-200
            bg-white
            p-6
            shadow-sm
        ">

            <h3 class="font-bold">
                Aksi Cepat
            </h3>

            <p class="
                mt-1
                text-sm
                text-slate-400
            ">
                Kelola konten website
            </p>


            <div class="mt-6 space-y-3">

                <a
                    href="#"
                    class="
                        flex items-center gap-3
                        rounded-xl
                        border border-slate-200
                        p-4
                        transition
                        hover:border-green-200
                        hover:bg-green-50
                    "
                >

                    <span class="
                        flex h-10 w-10
                        items-center justify-center
                        rounded-lg
                        bg-green-100
                    ">
                        📰
                    </span>

                    <div>

                        <p class="font-semibold">
                            Tambah Berita
                        </p>

                        <p class="text-xs text-slate-400">
                            Buat berita baru
                        </p>

                    </div>

                </a>


                <a
                    href="#"
                    class="
                        flex items-center gap-3
                        rounded-xl
                        border border-slate-200
                        p-4
                        transition
                        hover:border-green-200
                        hover:bg-green-50
                    "
                >

                    <span class="
                        flex h-10 w-10
                        items-center justify-center
                        rounded-lg
                        bg-green-100
                    ">
                        🖼
                    </span>

                    <div>

                        <p class="font-semibold">
                            Tambah Slider
                        </p>

                        <p class="text-xs text-slate-400">
                            Kelola hero slider
                        </p>

                    </div>

                </a>


                <a
                    href="#"
                    class="
                        flex items-center gap-3
                        rounded-xl
                        border border-slate-200
                        p-4
                        transition
                        hover:border-green-200
                        hover:bg-green-50
                    "
                >

                    <span class="
                        flex h-10 w-10
                        items-center justify-center
                        rounded-lg
                        bg-green-100
                    ">
                        🏫
                    </span>

                    <div>

                        <p class="font-semibold">
                            Edit Profil
                        </p>

                        <p class="text-xs text-slate-400">
                            Informasi sekolah
                        </p>

                    </div>

                </a>

            </div>

        </div>

    </div>

@endsection
