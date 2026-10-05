@extends('layouts.admin')

@section('title', 'Edit Slider')

@section('header', 'Edit Slider')

@section('content')

<div class="space-y-6">

```
{{-- Header --}}
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

    <div>
        <h2 class="text-2xl font-bold text-gray-800">
            Edit Slider
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Perbarui informasi slider.
        </p>
    </div>

    <a href="{{ route('admin.slider.index') }}"
       class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200
              text-gray-700 rounded-lg text-sm font-semibold
              text-center transition">

        ← Kembali

    </a>

</div>


{{-- Error --}}
@if($errors->any())

    <div class="rounded-xl border border-red-200 bg-red-50 p-4">

        <strong class="text-red-800">
            Periksa kembali data:
        </strong>

        <ul class="mt-2 text-sm text-red-700 list-disc list-inside">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

    <div class="px-6 py-4 bg-green-600">

        <h3 class="text-lg font-semibold text-white">
            Edit Slider
        </h3>

        <p class="text-sm text-green-100 mt-1">
            Perbarui data slider.
        </p>

    </div>


    <div class="p-6">

        <form
            action="{{ route('admin.slider.update', $slider) }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6"
        >

            @csrf
            @method('PUT')


            {{-- Judul --}}
            <div>

                <label for="judul"
                       class="block text-sm font-semibold text-gray-700 mb-2">

                    Judul
                    <span class="text-red-500">*</span>

                </label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul', $slider->judul) }}"
                    required
                    class="w-full px-4 py-3 border border-gray-300
                           rounded-lg focus:ring-2 focus:ring-green-500
                           focus:border-green-500 outline-none"
                >

                @error('judul')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Deskripsi --}}
            <div>

                <label for="deskripsi"
                       class="block text-sm font-semibold text-gray-700 mb-2">

                    Deskripsi

                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    rows="5"
                    class="w-full px-4 py-3 border border-gray-300
                           rounded-lg focus:ring-2 focus:ring-green-500
                           focus:border-green-500 outline-none resize-y"
                >{{ old('deskripsi', $slider->deskripsi) }}</textarea>

            </div>


            {{-- Gambar Saat Ini --}}
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Gambar Saat Ini
                </label>

                @if($slider->gambar)

                    <div class="border border-gray-200 rounded-xl
                                bg-gray-50 p-4">

                        <img
                            src="{{ asset('storage/' . $slider->gambar) }}"
                            alt="{{ $slider->judul }}"
                            class="w-full max-w-2xl h-64
                                   object-cover rounded-lg"
                        >

                    </div>

                @else

                    <div class="p-6 bg-gray-50 rounded-xl text-gray-500">
                        Belum ada gambar.
                    </div>

                @endif

            </div>


            {{-- Ganti Gambar --}}
            <div>

                <label for="gambar"
                       class="block text-sm font-semibold text-gray-700 mb-2">

                    Ganti Gambar

                </label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    accept="image/jpeg,image/png,image/webp"
                    class="block w-full text-sm text-gray-600
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0
                           file:bg-green-50 file:text-green-700
                           file:font-semibold
                           hover:file:bg-green-100"
                >

                <p class="mt-2 text-xs text-gray-500">
                    Kosongkan jika tidak ingin mengganti gambar.
                    Maksimal 2 MB.
                </p>

                @error('gambar')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Tombol --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>

                    <label for="tombol_text"
                           class="block text-sm font-semibold text-gray-700 mb-2">

                        Text Tombol

                    </label>

                    <input
                        type="text"
                        id="tombol_text"
                        name="tombol_text"
                        value="{{ old('tombol_text', $slider->tombol_text) }}"
                        class="w-full px-4 py-3 border border-gray-300
                               rounded-lg focus:ring-2 focus:ring-green-500
                               focus:border-green-500 outline-none"
                    >

                </div>


                <div>

                    <label for="tombol_url"
                           class="block text-sm font-semibold text-gray-700 mb-2">

                        URL Tombol

                    </label>

                    <input
                        type="text"
                        id="tombol_url"
                        name="tombol_url"
                        value="{{ old('tombol_url', $slider->tombol_url) }}"
                        class="w-full px-4 py-3 border border-gray-300
                               rounded-lg focus:ring-2 focus:ring-green-500
                               focus:border-green-500 outline-none"
                    >

                </div>

            </div>


            {{-- Urutan & Status --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>

                    <label for="urutan"
                           class="block text-sm font-semibold text-gray-700 mb-2">

                        Urutan
                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="number"
                        id="urutan"
                        name="urutan"
                        value="{{ old('urutan', $slider->urutan) }}"
                        min="0"
                        required
                        class="w-full px-4 py-3 border border-gray-300
                               rounded-lg focus:ring-2 focus:ring-green-500
                               focus:border-green-500 outline-none"
                    >

                </div>


                <div>

                    <label for="status"
                           class="block text-sm font-semibold text-gray-700 mb-2">

                        Status
                        <span class="text-red-500">*</span>

                    </label>

                    <select
                        id="status"
                        name="status"
                        required
                        class="w-full px-4 py-3 border border-gray-300
                               rounded-lg focus:ring-2 focus:ring-green-500
                               focus:border-green-500 outline-none bg-white"
                    >

                        <option value="1"
                            {{ old('status', (string) $slider->status) === '1' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="0"
                            {{ old('status', (string) $slider->status) === '0' ? 'selected' : '' }}>
                            Nonaktif
                        </option>

                    </select>

                    @error('status')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>


            {{-- Tombol --}}
            <div class="flex flex-col sm:flex-row gap-3
                        pt-5 border-t border-gray-100">

                <button
                    type="submit"
                    class="px-5 py-3 bg-green-600 hover:bg-green-700
                           text-white rounded-lg text-sm font-semibold
                           transition"
                >
                    Update Slider
                </button>

                <a
                    href="{{ route('admin.slider.index') }}"
                    class="px-5 py-3 bg-gray-100 hover:bg-gray-200
                           text-gray-700 rounded-lg text-sm font-semibold
                           text-center transition"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>
```

</div>

@endsection
