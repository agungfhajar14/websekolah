@extends('layouts.admin')

@section('title', 'Edit Kategori Berita')

@section('header', 'Edit Kategori Berita')

@section('content')

<div class="mx-auto max-w-4xl">

    {{-- HEADER --}}
    <div class="mb-6">

        <a
            href="{{ route('admin.kategori-berita.index') }}"
            class="
                inline-flex items-center gap-2
                text-sm font-medium
                text-green-600
                hover:text-green-700
            "
        >
            ← Kembali ke Kategori
        </a>

        <h1 class="mt-4 text-2xl font-bold text-slate-900">
            Edit Kategori Berita
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Perbarui informasi kategori berita.
        </p>

    </div>


    {{-- FORM --}}
    <form
        action="{{ route('admin.kategori-berita.update', $kategoriBerita->id) }}"
        method="POST"
    >

        @csrf

        @method('PUT')

        <div
            class="
                rounded-2xl
                border border-slate-200
                bg-white
                p-6
                shadow-sm
                sm:p-8
            "
        >

            @include('admin.kategori-berita_form')

        </div>

    </form>

</div>

@endsection
@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const nama = document.getElementById('nama');
    const slug = document.getElementById('slug');

    if (!nama || !slug) return;

    nama.addEventListener('input', function () {

        slug.value = this.value
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');

    });

});
</script>

@endpush
