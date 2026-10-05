@extends('layouts.admin')

@section('title', 'Tambah Slider')

@section('header', 'Tambah Slider')

@section('content')

<div class="space-y-6">

```
{{-- Header --}}
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

    <div>
        <h2 class="text-2xl font-bold text-gray-800">
            Tambah Slider
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Tambahkan slider baru untuk halaman utama website.
        </p>
    </div>

    <a href="{{ route('admin.slider.index') }}"
       class="inline-flex items-center justify-center gap-2
              px-4 py-2.5
              bg-gray-100 hover:bg-gray-200
              text-gray-700 rounded-lg
              text-sm font-semibold transition">

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


{{-- Form --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

    <div class="px-6 py-4 bg-green-600">

        <h3 class="text-lg font-semibold text-white">
            Form Slider
        </h3>

        <p class="text-sm text-green-100 mt-1">
            Lengkapi informasi slider.
        </p>

    </div>


    <div class="p-6">

        <form
            action="{{ route('admin.slider.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6"
        >

            @csrf


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
                    value="{{ old('judul') }}"
                    placeholder="Masukkan judul slider"
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
                    placeholder="Masukkan deskripsi slider"
                    class="w-full px-4 py-3 border border-gray-300
                           rounded-lg focus:ring-2 focus:ring-green-500
                           focus:border-green-500 outline-none resize-y"
                >{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Gambar --}}
            <div>

                <label for="gambar"
                       class="block text-sm font-semibold text-gray-700 mb-2">

                    Gambar Slider
                    <span class="text-red-500">*</span>

                </label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    accept="image/jpeg,image/png,image/webp"
                    required
                    class="block w-full text-sm text-gray-600
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0
                           file:bg-green-50 file:text-green-700
                           file:font-semibold
                           hover:file:bg-green-100"
                >

                <p class="mt-2 text-xs text-gray-500">
                    Format JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.
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
                        value="{{ old('tombol_text') }}"
                        placeholder="Contoh: Selengkapnya"
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
                        value="{{ old('tombol_url') }}"
                        placeholder="Contoh: /berita"
                        class="w-full px-4 py-3 border border-gray-300
                               rounded-lg focus:ring-2 focus:ring-green-500
                               focus:border-green-500 outline-none"
                    >

                </div>

            </div>


            {{-- Urutan & Status --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- Urutan --}}
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
                        value="{{ old('urutan', 0) }}"
                        min="0"
                        required
                        class="w-full px-4 py-3 border border-gray-300
                               rounded-lg focus:ring-2 focus:ring-green-500
                               focus:border-green-500 outline-none"
                    >

                    <p class="mt-1 text-xs text-gray-500">
                        Angka lebih kecil tampil lebih dahulu.
                    </p>

                </div>


                {{-- Status --}}
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
                            {{ old('status', '1') === '1' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="0"
                            {{ old('status') === '0' ? 'selected' : '' }}>
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
                    Simpan Slider
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
