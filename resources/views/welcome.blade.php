
@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

{{-- ========================================================= --}}
{{-- HERO SLIDER --}}
{{-- ========================================================= --}}

<section class="relative overflow-hidden bg-green-950">

    <div id="hero-slider"
         class="relative h-[520px] sm:h-[580px] lg:h-[620px]">

        @forelse ($sliders as $index => $slider)

            <div class="hero-slide absolute inset-0
                        {{ $index === 0
                            ? 'opacity-100 translate-x-0'
                            : 'opacity-0 translate-x-full' }}
                        transition-all duration-700 ease-in-out">

                {{-- GAMBAR --}}
                <div class="absolute inset-0">

                    @if ($slider->gambar)

                        <img
                            src="{{ asset('storage/' . $slider->gambar) }}"
                            class="h-full w-full object-cover"
                            alt="{{ $slider->judul }}"
                        >

                    @else

                        <div class="h-full w-full bg-green-900"></div>

                    @endif

                    <div class="absolute inset-0
                                bg-gradient-to-r
                                from-green-950
                                via-green-950/85
                                to-green-900/30">
                    </div>

                </div>


                {{-- KONTEN SLIDER --}}
                <div class="relative mx-auto flex h-full max-w-7xl
                            items-center px-4 sm:px-6 lg:px-8">

                    <div class="max-w-3xl">

                        <span class="inline-flex rounded-full
                                     border border-green-300/30
                                     bg-green-500/10
                                     px-4 py-2
                                     text-sm font-medium
                                     text-green-200
                                     backdrop-blur">

                            {{ $slider->judul }}

                        </span>


                        <h1 class="mt-6 text-4xl font-bold
                                   tracking-tight text-white
                                   sm:text-5xl lg:text-6xl">

                            {{ $slider->judul }}

                        </h1>


                        @if ($slider->deskripsi)

                            <p class="mt-6 max-w-2xl
                                      text-lg leading-8
                                      text-green-100">

                                {{ $slider->deskripsi }}

                            </p>

                        @endif


                        @if ($slider->tombol_text && $slider->tombol_url)

                            <div class="mt-8">

                                <a
                                    href="{{ $slider->tombol_url }}"
                                    class="inline-flex rounded-xl
                                           bg-green-600
                                           px-6 py-3
                                           text-sm font-semibold
                                           text-white
                                           shadow-lg
                                           transition
                                           hover:bg-green-500">

                                    {{ $slider->tombol_text }}

                                </a>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        @empty

            {{-- JIKA BELUM ADA SLIDER --}}
            <div class="absolute inset-0 flex items-center
                        bg-green-950">

                <div class="mx-auto max-w-7xl
                            px-4 sm:px-6 lg:px-8">

                    <div class="max-w-3xl">

                        <span class="inline-flex rounded-full
                                     border border-green-300/30
                                     bg-green-500/10
                                     px-4 py-2
                                     text-sm font-medium
                                     text-green-200">

                            Selamat Datang

                        </span>


                        <h1 class="mt-6 text-4xl font-bold
                                   tracking-tight text-white
                                   sm:text-5xl lg:text-6xl">

                            {{ $profilSekolah->nama_sekolah ?? config('app.name', 'Website Sekolah') }}

                        </h1>


                        <p class="mt-6 max-w-2xl
                                  text-lg leading-8
                                  text-green-100">

                            {{ $profilSekolah->deskripsi_singkat
                                ?? 'Selamat datang di website resmi sekolah kami.' }}

                        </p>

                    </div>

                </div>

            </div>

        @endforelse


        {{-- PREVIOUS / NEXT --}}
        @if ($sliders->count() > 1)

            <button
                id="prev-slide"
                type="button"
                class="absolute left-4 top-1/2
                       flex h-11 w-11
                       -translate-y-1/2
                       items-center justify-center
                       rounded-full
                       border border-white/20
                       bg-black/20
                       text-white
                       backdrop-blur-md
                       transition
                       hover:bg-green-600
                       sm:left-6">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 19l-7-7 7-7"/>

                </svg>

            </button>


            <button
                id="next-slide"
                type="button"
                class="absolute right-4 top-1/2
                       flex h-11 w-11
                       -translate-y-1/2
                       items-center justify-center
                       rounded-full
                       border border-white/20
                       bg-black/20
                       text-white
                       backdrop-blur-md
                       transition
                       hover:bg-green-600
                       sm:right-6">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 5l7 7-7 7"/>

                </svg>

            </button>


            {{-- DOT --}}
            <div class="absolute bottom-8 left-1/2
                        flex -translate-x-1/2
                        items-center gap-2">

                @foreach ($sliders as $index => $slider)

                    <button
                        type="button"
                        class="slider-dot
                               {{ $index === 0
                                   ? 'w-8 bg-white'
                                   : 'w-2.5 bg-white/40' }}
                               h-2.5 rounded-full
                               transition-all duration-300"
                        data-slide="{{ $index }}">
                    </button>

                @endforeach

            </div>

        @endif

    </div>

</section>


{{-- ========================================================= --}}
{{-- PROFIL SEKOLAH --}}
{{-- ========================================================= --}}

<section class="bg-white">

    <div class="mx-auto max-w-7xl px-4 py-20
                sm:px-6 lg:px-8">

        <div class="grid items-center gap-12 lg:grid-cols-2">

            {{-- FOTO --}}
            <div>

                @if ($profilSekolah?->foto)

                    <div class="overflow-hidden rounded-3xl shadow-lg">

                        <img
                            src="{{ asset('storage/' . $profilSekolah->foto) }}"
                            alt="{{ $profilSekolah->nama_sekolah ?? 'Foto Sekolah' }}"
                            class="h-[400px] w-full object-cover"
                        >

                    </div>

                @elseif ($profilSekolah?->logo)

                    <div class="flex h-[400px]
                                items-center justify-center
                                rounded-3xl
                                bg-green-50">

                        <img
                            src="{{ asset('storage/' . $profilSekolah->logo) }}"
                            alt="{{ $profilSekolah->nama_sekolah ?? 'Logo Sekolah' }}"
                            class="max-h-64 max-w-xs object-contain"
                        >

                    </div>

                @else

                    <div class="flex h-[400px]
                                items-center justify-center
                                rounded-3xl
                                bg-green-50">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-24 w-24 text-green-300"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/>

                        </svg>

                    </div>

                @endif

            </div>


            {{-- INFORMASI --}}
            <div>

                <span class="text-sm font-semibold uppercase
                             tracking-wider text-green-600">

                    Tentang Kami

                </span>


                <h2 class="mt-3 text-3xl font-bold
                           leading-tight text-gray-900
                           sm:text-4xl">

                    {{ $profilSekolah->nama_sekolah
                        ?? 'Profil Sekolah' }}

                </h2>


                @if ($profilSekolah?->nama_singkat)

                    <p class="mt-2 font-medium text-green-600">

                        {{ $profilSekolah->nama_singkat }}

                    </p>

                @endif


                <div class="mt-6 space-y-4
                            text-base leading-8 text-gray-600">

                    @if ($profilSekolah?->deskripsi_singkat)

                        <p class="font-medium text-gray-700">

                            {{ $profilSekolah->deskripsi_singkat }}

                        </p>

                    @endif


                    @if ($profilSekolah?->deskripsi)

                        <p>

                            {{ $profilSekolah->deskripsi }}

                        </p>

                    @endif

                </div>


                <a
                    href="{{ url('/profile') }}"
                    class="mt-7 inline-flex items-center
                           rounded-xl bg-green-600
                           px-6 py-3 text-sm font-semibold
                           text-white shadow-lg
                           transition hover:bg-green-700">

                    Selengkapnya

                    <span class="ml-2">→</span>

                </a>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- QUICK INFO --}}
{{-- ========================================================= --}}

<section class="bg-gray-50">

    <div class="mx-auto max-w-7xl px-4 py-12
                sm:px-6 lg:px-8">

        <div class="grid gap-6 md:grid-cols-3">

            @foreach([
                [
                    '✓',
                    'Pendidikan Berkualitas',
                    'Mengutamakan pendidikan yang berkualitas dan berorientasi pada perkembangan peserta didik.'
                ],
                [
                    '★',
                    'Berprestasi',
                    'Mendorong siswa untuk terus berkembang dan meraih prestasi terbaik.'
                ],
                [
                    '◆',
                    'Berkarakter',
                    'Membentuk pribadi yang memiliki karakter, integritas, dan kepedulian.'
                ]
            ] as $item)

                <div class="rounded-2xl border border-green-100
                            bg-white p-6 shadow-sm
                            transition hover:-translate-y-1
                            hover:shadow-lg">

                    <div class="flex h-12 w-12
                                items-center justify-center
                                rounded-xl
                                bg-green-100
                                text-green-600">

                        {{ $item[0] }}

                    </div>


                    <h3 class="mt-5 font-bold text-gray-900">

                        {{ $item[1] }}

                    </h3>


                    <p class="mt-2 text-sm
                              leading-6 text-gray-500">

                        {{ $item[2] }}

                    </p>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- BERITA --}}
{{-- ========================================================= --}}

<section class="bg-white">

    <div class="mx-auto max-w-7xl px-4 py-20
                sm:px-6 lg:px-8">

        <div class="flex items-end justify-between">

            <div>

                <span class="text-sm font-semibold uppercase
                             tracking-wider text-green-600">

                    Informasi

                </span>


                <h2 class="mt-2 text-3xl font-bold text-gray-900">

                    Berita Terbaru

                </h2>

            </div>


            <a
                href="{{ url('/berita') }}"
                class="hidden text-sm font-semibold
                       text-green-600
                       hover:text-green-700
                       sm:block">

                Lihat Semua →

            </a>

        </div>


        <div class="mt-10 grid gap-8 md:grid-cols-3">

            @forelse ($berita as $item)

                <article
                    class="group overflow-hidden rounded-2xl
                           border border-gray-200
                           bg-white shadow-sm
                           transition
                           hover:-translate-y-1
                           hover:shadow-lg">

                    {{-- GAMBAR --}}
                    <div class="h-48 overflow-hidden
                                bg-green-100">

                        @if ($item->gambar)

                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->judul }}"
                                class="h-full w-full object-cover
                                       transition duration-500
                                       group-hover:scale-105"
                            >

                        @else

                            <div class="flex h-full
                                        items-center justify-center
                                        bg-gradient-to-br
                                        from-green-100
                                        to-green-200
                                        text-green-600">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-16 w-16"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M4 16l4-4a3 3 0 014 0l4 4m-2-2l1-1a3 3 0 014 0l1 1M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>

                                </svg>

                            </div>

                        @endif

                    </div>


                    {{-- ISI --}}
                    <div class="p-6">

                        <p class="text-xs font-semibold uppercase
                                  tracking-wider text-green-600">

                            Berita

                        </p>


                        <h3 class="mt-3 text-xl font-bold
                                   leading-snug text-gray-900
                                   transition
                                   group-hover:text-green-600">

                            {{ $item->judul }}

                        </h3>


                        @if ($item->tanggal_terbit)

                            <p class="mt-2 text-xs text-gray-400">

                                {{ \Carbon\Carbon::parse($item->tanggal_terbit)
                                    ->translatedFormat('d F Y') }}

                            </p>

                        @endif


                        @if ($item->ringkasan)

                            <p class="mt-3 text-sm
                                      leading-6 text-gray-500">

                                {{ \Illuminate\Support\Str::limit(
                                    $item->ringkasan,
                                    120
                                ) }}

                            </p>

                        @endif


                        <a
                            href="{{ route('berita.show', $item->slug) }}"
                            class="mt-5 inline-block
                                   text-sm font-semibold
                                   text-green-600
                                   transition
                                   hover:text-green-700">

                            Baca Selengkapnya →

                        </a>

                    </div>

                </article>

            @empty

                <div class="col-span-3 rounded-2xl
                            border border-gray-200
                            bg-gray-50 p-10
                            text-center">

                    <div class="flex justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-12 w-12 text-gray-300"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13h-1a2 2 0 01-2-2v-1m0-10V5a2 2 0 012-2h1a2 2 0 012 2v10a2 2 0 01-2 2z"/>

                        </svg>

                    </div>


                    <p class="mt-4 text-gray-500">

                        Belum ada berita.

                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- VISI MISI DARI DATABASE --}}
{{-- ========================================================= --}}

<section class="bg-gray-50">

    <div class="mx-auto max-w-7xl px-4 py-20
                sm:px-6 lg:px-8">

        <div class="grid gap-12 lg:grid-cols-2">

            {{-- VISI --}}
            <div>

                <span class="text-sm font-semibold uppercase
                             tracking-wider text-green-600">

                    Visi

                </span>


                <h2 class="mt-3 text-3xl font-bold
                           leading-tight text-gray-900">

                    {{ $profilSekolah->visi
                        ?? 'Visi belum tersedia.' }}

                </h2>


                @if ($profilSekolah?->deskripsi_singkat)

                    <p class="mt-5 text-base
                              leading-8 text-gray-600">

                        {{ $profilSekolah->deskripsi_singkat }}

                    </p>

                @endif

            </div>


            {{-- MISI --}}
            <div>

                <span class="text-sm font-semibold uppercase
                             tracking-wider text-green-600">

                    Misi

                </span>


                <h2 class="mt-3 text-3xl font-bold
                           leading-tight text-gray-900">

                    {{ $profilSekolah->nama_sekolah
                        ?? 'Misi Sekolah' }}

                </h2>


                @if ($profilSekolah?->misi)

                    <div class="mt-6 rounded-2xl
                                border border-green-100
                                bg-white p-6 shadow-sm">

                        <div class="space-y-3
                                    text-base leading-7
                                    text-gray-600">

                            {!! nl2br(e($profilSekolah->misi)) !!}

                        </div>

                    </div>

                @else

                    <p class="mt-5 text-gray-500">

                        Misi belum tersedia.

                    </p>

                @endif

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- KONTAK / INFORMASI SEKOLAH --}}
{{-- ========================================================= --}}

<section class="bg-white">

    <div class="mx-auto max-w-7xl px-4 py-20
                sm:px-6 lg:px-8">

        <div class="text-center">

            <span class="text-sm font-semibold uppercase
                         tracking-wider text-green-600">

                Informasi Sekolah

            </span>


            <h2 class="mt-2 text-3xl font-bold text-gray-900">

                Hubungi Kami

            </h2>

        </div>


        <div class="mt-10 grid gap-6
                    md:grid-cols-3">

            {{-- ALAMAT --}}
            @if ($profilSekolah?->alamat)

                <div class="rounded-2xl
                            border border-green-100
                            bg-green-50/50 p-6">

                    <div class="flex h-12 w-12
                                items-center justify-center
                                rounded-xl bg-green-100
                                text-green-600">

                        📍

                    </div>


                    <h3 class="mt-5 font-bold text-gray-900">

                        Alamat

                    </h3>


                    <p class="mt-2 text-sm
                              leading-6 text-gray-600">

                        {{ $profilSekolah->alamat }}

                    </p>

                </div>

            @endif


            {{-- TELEPON --}}
            @if ($profilSekolah?->telepon)

                <div class="rounded-2xl
                            border border-green-100
                            bg-green-50/50 p-6">

                    <div class="flex h-12 w-12
                                items-center justify-center
                                rounded-xl bg-green-100
                                text-green-600">

                        ☎

                    </div>


                    <h3 class="mt-5 font-bold text-gray-900">

                        Telepon

                    </h3>


                    <a
                        href="tel:{{ $profilSekolah->telepon }}"
                        class="mt-2 block text-sm
                               leading-6 text-gray-600
                               hover:text-green-600">

                        {{ $profilSekolah->telepon }}

                    </a>

                </div>

            @endif


            {{-- EMAIL --}}
            @if ($profilSekolah?->email)

                <div class="rounded-2xl
                            border border-green-100
                            bg-green-50/50 p-6">

                    <div class="flex h-12 w-12
                                items-center justify-center
                                rounded-xl bg-green-100
                                text-green-600">

                        ✉

                    </div>


                    <h3 class="mt-5 font-bold text-gray-900">

                        Email

                    </h3>


                    <a
                        href="mailto:{{ $profilSekolah->email }}"
                        class="mt-2 block break-all
                               text-sm leading-6
                               text-gray-600
                               hover:text-green-600">

                        {{ $profilSekolah->email }}

                    </a>

                </div>

            @endif

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- SOCIAL MEDIA --}}
{{-- ========================================================= --}}

@if (
    $profilSekolah?->facebook ||
    $profilSekolah?->instagram ||
    $profilSekolah?->youtube ||
    $profilSekolah?->tiktok
)

<section class="bg-green-50">

    <div class="mx-auto max-w-7xl px-4 py-12
                text-center sm:px-6 lg:px-8">

        <h2 class="text-xl font-bold text-gray-900">

            Ikuti Kami

        </h2>


        <p class="mt-2 text-sm text-gray-500">

            Temukan informasi terbaru melalui media sosial kami.

        </p>


        <div class="mt-6 flex justify-center
                    gap-3">

            @if ($profilSekolah?->facebook)

                <a
                    href="{{ $profilSekolah->facebook }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="rounded-xl bg-white
                           px-5 py-3 text-sm
                           font-semibold text-green-700
                           shadow-sm transition
                           hover:bg-green-600
                           hover:text-white">

                    Facebook

                </a>

            @endif


            @if ($profilSekolah?->instagram)

                <a
                    href="{{ $profilSekolah->instagram }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="rounded-xl bg-white
                           px-5 py-3 text-sm
                           font-semibold text-green-700
                           shadow-sm transition
                           hover:bg-green-600
                           hover:text-white">

                    Instagram

                </a>

            @endif


            @if ($profilSekolah?->youtube)

                <a
                    href="{{ $profilSekolah->youtube }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="rounded-xl bg-white
                           px-5 py-3 text-sm
                           font-semibold text-green-700
                           shadow-sm transition
                           hover:bg-green-600
                           hover:text-white">

                    YouTube

                </a>

            @endif


            @if ($profilSekolah?->tiktok)

                <a
                    href="{{ $profilSekolah->tiktok }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="rounded-xl bg-white
                           px-5 py-3 text-sm
                           font-semibold text-green-700
                           shadow-sm transition
                           hover:bg-green-600
                           hover:text-white">

                    TikTok

                </a>

            @endif

        </div>

    </div>

</section>

@endif


{{-- ========================================================= --}}
{{-- CTA --}}
{{-- ========================================================= --}}

<section class="bg-green-900">

    <div class="mx-auto max-w-7xl px-4 py-16
                text-center sm:px-6 lg:px-8">

        <h2 class="text-3xl font-bold text-white">

            {{ $profilSekolah->nama_singkat
                ?? $profilSekolah->nama_sekolah
                ?? 'Sekolah Kami' }}

        </h2>


        <p class="mx-auto mt-4 max-w-2xl
                  text-green-100">

            {{ $profilSekolah->deskripsi_singkat
                ?? 'Temukan informasi lengkap mengenai profil, program, kegiatan, dan berbagai informasi sekolah.' }}

        </p>


        @if ($profilSekolah?->website)

            <a
                href="{{ $profilSekolah->website }}"
                target="_blank"
                rel="noopener noreferrer"
                class="mt-8 inline-flex
                       rounded-xl bg-white
                       px-6 py-3
                       text-sm font-semibold
                       text-green-700
                       shadow-lg
                       transition
                       hover:bg-green-50">

                Kunjungi Website

            </a>

        @else

            <a
                href="{{ url('/profile') }}"
                class="mt-8 inline-flex
                       rounded-xl bg-white
                       px-6 py-3
                       text-sm font-semibold
                       text-green-700
                       shadow-lg
                       transition
                       hover:bg-green-50">

                Lihat Profil Sekolah

            </a>

        @endif

    </div>

</section>


{{-- ========================================================= --}}
{{-- SLIDER JAVASCRIPT --}}
{{-- ========================================================= --}}

@if ($sliders->count() > 1)

<script>

document.addEventListener('DOMContentLoaded', function () {

    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slider-dot');

    const nextButton = document.getElementById('next-slide');
    const prevButton = document.getElementById('prev-slide');

    let currentSlide = 0;
    let autoSlide;


    function showSlide(index) {

        if (index >= slides.length) {

            currentSlide = 0;

        } else if (index < 0) {

            currentSlide = slides.length - 1;

        } else {

            currentSlide = index;

        }


        slides.forEach((slide, i) => {

            if (i === currentSlide) {

                slide.classList.remove(
                    'opacity-0',
                    'translate-x-full'
                );

                slide.classList.add(
                    'opacity-100',
                    'translate-x-0'
                );

            } else {

                slide.classList.remove(
                    'opacity-100',
                    'translate-x-0'
                );

                slide.classList.add(
                    'opacity-0',
                    'translate-x-full'
                );

            }

        });


        dots.forEach((dot, i) => {

            dot.classList.remove(
                'w-8',
                'bg-white'
            );

            dot.classList.add(
                'w-2.5',
                'bg-white/40'
            );


            if (i === currentSlide) {

                dot.classList.remove(
                    'w-2.5',
                    'bg-white/40'
                );

                dot.classList.add(
                    'w-8',
                    'bg-white'
                );

            }

        });

    }


    function nextSlide() {

        showSlide(currentSlide + 1);

    }


    function prevSlide() {

        showSlide(currentSlide - 1);

    }


    function startAutoSlide() {

        autoSlide = setInterval(
            nextSlide,
            5000
        );

    }


    function resetAutoSlide() {

        clearInterval(autoSlide);

        startAutoSlide();

    }


    if (nextButton) {

        nextButton.addEventListener(
            'click',
            function () {

                nextSlide();

                resetAutoSlide();

            }
        );

    }


    if (prevButton) {

        prevButton.addEventListener(
            'click',
            function () {

                prevSlide();

                resetAutoSlide();

            }
        );

    }


    dots.forEach((dot) => {

        dot.addEventListener(
            'click',
            function () {

                showSlide(
                    parseInt(
                        this.dataset.slide
                    )
                );

                resetAutoSlide();

            }
        );

    });


    showSlide(0);

    startAutoSlide();

});

</script>

@endif

@endsection
