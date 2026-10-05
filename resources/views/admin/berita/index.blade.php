@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center
                sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Kelola Berita
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Kelola berita dan informasi website.
            </p>
        </div>

        <a href="{{ route('admin.berita.create') }}"
           class="inline-flex items-center justify-center gap-2
                  rounded-xl bg-green-600 px-5 py-3
                  text-sm font-semibold text-white
                  shadow-sm transition
                  hover:bg-green-700 hover:shadow-md">

            <svg class="h-5 w-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 4v16m8-8H4"/>

            </svg>

            Tambah Berita

        </a>

    </div>


    {{-- FLASH SUCCESS --}}
    @if(session('success'))

        <div class="rounded-xl border border-green-200
                    bg-green-50 px-5 py-4
                    text-sm text-green-700">

            {{ session('success') }}

        </div>

    @endif


    {{-- TABLE --}}
    <div class="overflow-hidden rounded-2xl border
                border-gray-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs
                                   font-semibold uppercase
                                   tracking-wider text-gray-500">
                            #
                        </th>

                        <th class="px-6 py-4 text-left text-xs
                                   font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Berita
                        </th>

                        <th class="px-6 py-4 text-left text-xs
                                   font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Kategori
                        </th>

                        <th class="px-6 py-4 text-left text-xs
                                   font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Penulis
                        </th>

                        <th class="px-6 py-4 text-left text-xs
                                   font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Tanggal
                        </th>

                        <th class="px-6 py-4 text-left text-xs
                                   font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-left text-xs
                                   font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Views
                        </th>

                        <th class="px-6 py-4 text-right text-xs
                                   font-semibold uppercase
                                   tracking-wider text-gray-500">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100 bg-white">

                    @forelse($beritas as $index => $berita)

                        <tr class="transition hover:bg-green-50/40">

                            {{-- NO --}}
                            <td class="whitespace-nowrap px-6 py-4
                                       text-sm text-gray-500">

                                {{ $beritas->firstItem() + $index }}

                            </td>


                            {{-- BERITA --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-4">

                                    {{-- IMAGE --}}
                                    <div class="h-14 w-20 shrink-0
                                                overflow-hidden
                                                rounded-lg bg-gray-100">

                                        @if($berita->gambar)

                                            <img
                                                src="{{ asset('storage/'.$berita->gambar) }}"
                                                alt="{{ $berita->judul }}"
                                                class="h-full w-full
                                                       object-cover">

                                        @else

                                            <div class="flex h-full
                                                        items-center
                                                        justify-center
                                                        text-gray-400">

                                                <svg class="h-6 w-6"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-10h.01M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"/>

                                                </svg>

                                            </div>

                                        @endif

                                    </div>


                                    <div class="min-w-0">

                                        <p class="max-w-xs truncate
                                                  font-semibold
                                                  text-gray-900">

                                            {{ $berita->judul }}

                                        </p>

                                        <p class="mt-1 max-w-xs truncate
                                                  text-xs text-gray-500">

                                            {{ $berita->slug }}

                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- KATEGORI --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="rounded-lg bg-green-50
                                             px-3 py-1.5 text-xs
                                             font-medium text-green-700">

                                    {{ $berita->kategori->nama ?? '-' }}

                                </span>

                            </td>


                            {{-- USER --}}
                            <td class="whitespace-nowrap px-6 py-4
                                       text-sm text-gray-600">

                                {{ $berita->user->name ?? '-' }}

                            </td>


                            {{-- TANGGAL --}}
                            <td class="whitespace-nowrap px-6 py-4
                                       text-sm text-gray-500">

                                {{ $berita->tanggal_terbit
                                    ? \Carbon\Carbon::parse($berita->tanggal_terbit)->format('d M Y')
                                    : '-' }}

                            </td>


                            {{-- STATUS --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                @if($berita->status === 'published')

                                    <span class="rounded-full bg-green-100
                                                 px-3 py-1 text-xs
                                                 font-semibold text-green-700">

                                        Published

                                    </span>

                                @elseif($berita->status === 'draft')

                                    <span class="rounded-full bg-yellow-100
                                                 px-3 py-1 text-xs
                                                 font-semibold text-yellow-700">

                                        Draft

                                    </span>

                                @else

                                    <span class="rounded-full bg-gray-100
                                                 px-3 py-1 text-xs
                                                 font-semibold text-gray-600">

                                        {{ ucfirst($berita->status) }}

                                    </span>

                                @endif

                            </td>


                            {{-- VIEWS --}}
                            <td class="whitespace-nowrap px-6 py-4
                                       text-sm text-gray-500">

                                {{ number_format($berita->views) }}

                            </td>


                            {{-- ACTION --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <div class="flex justify-end gap-2">

                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                       class="rounded-lg border
                                              border-blue-200
                                              bg-blue-50 px-3 py-2
                                              text-xs font-semibold
                                              text-blue-600
                                              transition hover:bg-blue-100">

                                        Edit

                                    </a>


                                    {{-- DELETE --}}
                                    <form
                                        action="{{ route('admin.berita.destroy', $berita->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="rounded-lg border
                                                       border-red-200
                                                       bg-red-50 px-3 py-2
                                                       text-xs font-semibold
                                                       text-red-600
                                                       transition
                                                       hover:bg-red-100">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8"
                                class="px-6 py-16 text-center">

                                <div class="text-gray-400">

                                    <svg class="mx-auto h-12 w-12"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.5"
                                              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 002-2V8a2 2 0 00-2-2h-5a2 2 0 00-2 2v10a2 2 0 002 2h5z"/>

                                    </svg>

                                    <p class="mt-3 text-sm">
                                        Belum ada berita.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($beritas->hasPages())

            <div class="border-t border-gray-100
                        px-6 py-4">

                {{ $beritas->links() }}

            </div>

        @endif

    </div>

</div>

@endsection
