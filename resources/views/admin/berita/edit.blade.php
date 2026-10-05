@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('header', 'Edit Berita')

@section('content')

<div class="mx-auto max-w-5xl space-y-6">

    {{-- HEADER --}}

    <div>

        <a
            href="{{ route('admin.berita.index') }}"
            class="
                inline-flex
                items-center
                gap-2
                text-sm
                font-medium
                text-green-600
                transition
                hover:text-green-700
            "
        >
            ← Kembali ke Berita
        </a>


        <h1 class="mt-3 text-2xl font-bold text-gray-900">
            Edit Berita
        </h1>


        <p class="mt-1 text-sm text-gray-500">
            Perbarui informasi berita.
        </p>

    </div>


    {{-- ERROR VALIDATION --}}

    @if ($errors->any())

        <div
            class="
                rounded-xl
                border
                border-red-200
                bg-red-50
                p-4
                text-sm
                text-red-700
            "
        >

            <p class="font-semibold">
                Terdapat kesalahan:
            </p>

            <ul class="mt-2 list-inside list-disc">

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}

    <form
        action="{{ route(
            'admin.berita.update',
            ['berita' => $berita->id]
        ) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        @method('PUT')


        <div
            class="
                rounded-2xl
                border
                border-gray-200
                bg-white
                p-6
                shadow-sm
                sm:p-8
            "
        >

            @include('admin.berita._form')

        </div>

    </form>

</div>

@endsection


{{-- QUILL CSS --}}

@push('styles')

<link
    href="https://cdn.quilljs.com/1.3.7/quill.snow.css"
    rel="stylesheet"
>

<style>

    #editor {
        min-height: 400px;
        background: white;
    }

    #editor .ql-editor {
        min-height: 400px;
        font-size: 16px;
        line-height: 1.8;
    }

    .ql-toolbar.ql-snow {
        border-radius: 0.75rem 0.75rem 0 0;
        border-color: #e5e7eb;
    }

    .ql-container.ql-snow {
        border-radius: 0 0 0.75rem 0.75rem;
        border-color: #e5e7eb;
    }

</style>

@endpush


{{-- QUILL JAVASCRIPT --}}

@push('scripts')

<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const editorElement =
        document.getElementById('editor');

    const hiddenInput =
        document.getElementById('isi');

    const form =
        document.querySelector('form');


    if (!editorElement || !hiddenInput || !form) {
        return;
    }


    const quill = new Quill('#editor', {

        theme: 'snow',

        placeholder:
            'Tulis isi berita di sini...',

        modules: {

            toolbar: [

                [
                    {
                        header: [1, 2, 3, false]
                    }
                ],

                [
                    'bold',
                    'italic',
                    'underline',
                    'strike'
                ],

                [
                    {
                        list: 'ordered'
                    },

                    {
                        list: 'bullet'
                    }
                ],

                [
                    {
                        align: []
                    }
                ],

                [
                    'blockquote',
                    'link'
                ],

                [
                    'clean'
                ]

            ]

        }

    });


    /*
    |--------------------------------------------------------------------------
    | LOAD ISI BERITA LAMA
    |--------------------------------------------------------------------------
    */

    const isiLama =
        @json(old('isi', $berita->isi ?? ''));


    if (isiLama) {

        quill.root.innerHTML =
            isiLama;

    }


    /*
    |--------------------------------------------------------------------------
    | SUBMIT
    |--------------------------------------------------------------------------
    */

    form.addEventListener(
        'submit',
        function () {

            hiddenInput.value =
                quill.root.innerHTML;

        }
    );

});

</script>

@endpush
