@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')

<div class="mx-auto max-w-5xl space-y-6">

    {{-- HEADER --}}
    <div>

        <a href="{{ route('admin.berita.index') }}"
           class="text-sm font-medium text-green-600
                  hover:text-green-700">

            ← Kembali ke Berita

        </a>

        <h1 class="mt-3 text-2xl font-bold text-gray-900">
            Tambah Berita
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Tambahkan berita baru ke website.
        </p>

    </div>


    {{-- FORM --}}
    <form
        action="{{ route('admin.berita.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div class="rounded-2xl border border-gray-200
                    bg-white p-6 shadow-sm sm:p-8">

            <div class="space-y-6">

                @include('admin.berita._form')

            </div>

        </div>

    </form>

</div>

@endsection


@push('styles')

<link
    href="https://cdn.quilljs.com/1.3.7/quill.snow.css"
    rel="stylesheet">

@endpush


@push('scripts')

<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const quill = new Quill('#editor', {

        theme: 'snow',

        placeholder: 'Tulis isi berita di sini...',

        modules: {

            toolbar: [

                [{ 'header': [1, 2, 3, false] }],

                ['bold', 'italic', 'underline', 'strike'],

                [{ 'list': 'ordered' },
                 { 'list': 'bullet' }],

                [{ 'align': [] }],

                ['blockquote', 'link'],

                ['clean']

            ]

        }

    });


    const form =
        document.querySelector('form');

    const hiddenInput =
        document.getElementById('isi');


    form.addEventListener('submit', function () {

        hiddenInput.value =
            quill.root.innerHTML;

    });


    // Auto slug
    const judul =
        document.getElementById('judul');

    const slug =
        document.getElementById('slug');


    judul.addEventListener('input', function () {

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
