@extends('layouts.admin')

@section('title', 'Kategori Berita')

@section('header', 'Kategori Berita')

@section('content')

<div class="space-y-6">

    {{-- ===================================================== --}}
    {{-- HEADER --}}
    {{-- ===================================================== --}}

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <h1 class="text-2xl font-bold text-slate-900">
                Kategori Berita
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Kelola kategori untuk mengelompokkan berita website.
            </p>

        </div>


        <a
            href="{{ route('admin.kategori-berita.create') }}"
            class="
                inline-flex items-center justify-center gap-2
                rounded-xl
                bg-green-600
                px-5 py-3
                text-sm font-semibold
                text-white
                shadow-lg
                shadow-green-600/20
                transition
                hover:bg-green-700
                focus:outline-none
                focus:ring-4
                focus:ring-green-100
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
                    d="M12 4v16m8-8H4"
                />
            </svg>

            Tambah Kategori

        </a>

    </div>


    {{-- ===================================================== --}}
    {{-- STAT CARD --}}
    {{-- ===================================================== --}}

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

        {{-- TOTAL --}}
        <div
            class="
                rounded-2xl
                border border-slate-200
                bg-white
                p-5
                shadow-sm
            "
        >

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Kategori
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-900">
                        {{ $kategoris->total() }}
                    </p>

                </div>

                <div
                    class="
                        flex h-12 w-12
                        items-center justify-center
                        rounded-xl
                        bg-green-100
                        text-xl
                    "
                >
                    🏷
                </div>

            </div>

        </div>


        {{-- AKTIF --}}
        <div
            class="
                rounded-2xl
                border border-slate-200
                bg-white
                p-5
                shadow-sm
            "
        >

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Kategori Aktif
                    </p>

                    <p class="mt-2 text-3xl font-bold text-green-600">

                        {{ \App\Models\KategoriBerita::where('status', 'aktif')->count() }}

                    </p>

                </div>

                <div
                    class="
                        flex h-12 w-12
                        items-center justify-center
                        rounded-xl
                        bg-green-100
                        text-green-600
                    "
                >

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- NONAKTIF --}}
        <div
            class="
                rounded-2xl
                border border-slate-200
                bg-white
                p-5
                shadow-sm
            "
        >

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Kategori Nonaktif
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-500">

                        {{ \App\Models\KategoriBerita::where('status', 'nonaktif')->count() }}

                    </p>

                </div>

                <div
                    class="
                        flex h-12 w-12
                        items-center justify-center
                        rounded-xl
                        bg-slate-100
                        text-slate-500
                    "
                >

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M18.364 5.636l-12.728 12.728M6 6l12 12"
                        />
                    </svg>

                </div>

            </div>

        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- TABLE --}}
    {{-- ===================================================== --}}

    <div
        class="
            overflow-hidden
            rounded-2xl
            border border-slate-200
            bg-white
            shadow-sm
        "
    >

        {{-- TABLE HEADER --}}
        <div
            class="
                flex flex-col gap-4
                border-b border-slate-100
                p-5
                sm:flex-row
                sm:items-center
                sm:justify-between
            "
        >

            <div>

                <h2 class="font-semibold text-slate-900">
                    Daftar Kategori
                </h2>

                <p class="mt-1 text-xs text-slate-400">
                    Semua kategori berita yang tersedia
                </p>

            </div>


            {{-- SEARCH --}}
            <form
                action="{{ route('admin.kategori-berita.index') }}"
                method="GET"
                class="w-full sm:w-72"
            >

                <div class="relative">

                    <svg
                        class="
                            absolute left-3 top-1/2
                            h-5 w-5
                            -translate-y-1/2
                            text-slate-400
                        "
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"
                        />

                    </svg>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari kategori..."
                        class="
                            w-full
                            rounded-xl
                            border border-slate-200
                            bg-slate-50
                            py-2.5 pl-10 pr-4
                            text-sm
                            outline-none
                            transition
                            focus:border-green-500
                            focus:bg-white
                            focus:ring-4
                            focus:ring-green-100
                        "
                    >

                </div>

            </form>

        </div>


        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="bg-slate-50">

                    <tr
                        class="
                            border-b border-slate-200
                            text-xs uppercase
                            tracking-wider
                            text-slate-500
                        "
                    >

                        <th class="px-6 py-4 font-semibold">
                            #
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Kategori
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Slug
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Deskripsi
                        </th>

                        <th class="px-6 py-4 font-semibold text-center">
                            Berita
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right font-semibold">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($kategoris as $kategoriBerita)

                        <tr
                            class="
                                transition
                                hover:bg-green-50/40
                            "
                        >

                            {{-- NO --}}
                            <td class="whitespace-nowrap px-6 py-5">

                                <span class="text-sm text-slate-400">

                                    {{ $kategoris->firstItem() + $loop->index }}

                                </span>

                            </td>


                            {{-- NAMA --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="
                                            flex h-10 w-10
                                            shrink-0
                                            items-center justify-center
                                            rounded-xl
                                            bg-green-100
                                            font-bold
                                            text-green-700
                                        "
                                    >

                                        {{ strtoupper(
                                            substr($kategoriBerita->nama, 0, 1)
                                        ) }}

                                    </div>

                                    <div>

                                        <p class="font-semibold text-slate-800">

                                            {{ $kategoriBerita->nama }}

                                        </p>

                                        <p class="text-xs text-slate-400">

                                            Dibuat
                                            {{ $kategoriBerita->created_at?->format('d M Y') }}

                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- SLUG --}}
                            <td class="px-6 py-5">

                                <code
                                    class="
                                        rounded-lg
                                        bg-slate-100
                                        px-2.5 py-1
                                        text-xs
                                        text-slate-600
                                    "
                                >

                                    {{ $kategoriBerita->slug }}

                                </code>

                            </td>


                            {{-- DESKRIPSI --}}
                            <td class="max-w-xs px-6 py-5">

                                @if($kategoriBerita->deskripsi)

                                    <p
                                        class="
                                            line-clamp-2
                                            text-sm
                                            text-slate-500
                                        "
                                    >

                                        {{ $kategoriBerita->deskripsi }}

                                    </p>

                                @else

                                    <span class="text-sm text-slate-300">
                                        Tidak ada deskripsi
                                    </span>

                                @endif

                            </td>


                            {{-- JUMLAH BERITA --}}
                            <td class="px-6 py-5 text-center">

                                <span
                                    class="
                                        inline-flex
                                        min-w-10
                                        justify-center
                                        rounded-full
                                        bg-green-50
                                        px-3 py-1
                                        text-xs font-bold
                                        text-green-700
                                    "
                                >

                                    {{ $kategoriBerita->beritas_count ?? $kategoriBerita->beritas()->count() }}

                                </span>

                            </td>


                            {{-- STATUS --}}
                            <td class="px-6 py-5">

                                @if($kategoriBerita->status === 'aktif')

                                    <span
                                        class="
                                            inline-flex
                                            items-center gap-1.5
                                            rounded-full
                                            bg-green-100
                                            px-3 py-1.5
                                            text-xs font-semibold
                                            text-green-700
                                        "
                                    >

                                        <span
                                            class="
                                                h-1.5 w-1.5
                                                rounded-full
                                                bg-green-500
                                            "
                                        ></span>

                                        Aktif

                                    </span>

                                @else

                                    <span
                                        class="
                                            inline-flex
                                            items-center gap-1.5
                                            rounded-full
                                            bg-slate-100
                                            px-3 py-1.5
                                            text-xs font-semibold
                                            text-slate-500
                                        "
                                    >

                                        <span
                                            class="
                                                h-1.5 w-1.5
                                                rounded-full
                                                bg-slate-400
                                            "
                                        ></span>

                                        Nonaktif

                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td class="px-6 py-5">

                                <div class="flex justify-end gap-2">

                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route(
                                            'admin.kategori-berita.edit',
                                            $kategoriBerita->id
                                        ) }}"
                                        class="
                                            inline-flex
                                            items-center
                                            justify-center
                                            rounded-lg
                                            border
                                            border-slate-200
                                            bg-white
                                            px-3 py-2
                                            text-xs font-semibold
                                            text-slate-600
                                            transition
                                            hover:border-green-200
                                            hover:bg-green-50
                                            hover:text-green-700
                                        "
                                    >
                                        Edit
                                    </a>


                                    {{-- DELETE --}}
                                    <form
                                        action="{{ route(
                                            'admin.kategori-berita.destroy',
                                            $kategoriBerita->id
                                        ) }}"
                                        method="POST"
                                        onsubmit="return confirm(
                                            'Yakin ingin menghapus kategori {{ addslashes($kategoriBerita->nama) }}?'
                                        )"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="
                                                inline-flex
                                                items-center
                                                justify-center
                                                rounded-lg
                                                border
                                                border-red-100
                                                bg-white
                                                px-3 py-2
                                                text-xs font-semibold
                                                text-red-600
                                                transition
                                                hover:bg-red-50
                                            "
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="px-6 py-16 text-center"
                            >

                                <div
                                    class="
                                        mx-auto
                                        flex h-16 w-16
                                        items-center justify-center
                                        rounded-2xl
                                        bg-green-50
                                        text-2xl
                                    "
                                >
                                    🏷
                                </div>

                                <h3
                                    class="
                                        mt-4
                                        font-semibold
                                        text-slate-800
                                    "
                                >
                                    Belum ada kategori
                                </h3>

                                <p
                                    class="
                                        mt-1
                                        text-sm
                                        text-slate-400
                                    "
                                >
                                    Silakan tambahkan kategori berita baru.
                                </p>

                                <a
                                    href="{{ route('admin.kategori-berita.create') }}"
                                    class="
                                        mt-5
                                        inline-flex
                                        rounded-xl
                                        bg-green-600
                                        px-4 py-2.5
                                        text-sm font-semibold
                                        text-white
                                        hover:bg-green-700
                                    "
                                >
                                    Tambah Kategori
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($kategoris->hasPages())

            <div
                class="
                    border-t border-slate-100
                    px-6 py-4
                "
            >

                {{ $kategoris->withQueryString()->links() }}

            </div>

        @endif

    </div>

</div>

@endsection
