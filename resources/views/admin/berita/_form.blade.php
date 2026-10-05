{{-- ========================================================= --}}
{{-- KATEGORI --}}
{{-- ========================================================= --}}

<div>
    <label class="mb-2 block text-sm font-semibold text-gray-700">
        Kategori
    </label>

    <select
        name="kategori_id"
        required
        class="w-full rounded-xl border border-gray-200
               bg-white px-4 py-3 text-sm
               outline-none transition
               focus:border-green-500
               focus:ring-4 focus:ring-green-100">

        <option value="">-- Pilih Kategori --</option>

        @foreach($kategoris as $kategori)

            <option
                value="{{ $kategori->id }}"
                @selected(old('kategori_id', $berita->kategori_id ?? '') == $kategori->id)>

                {{ $kategori->nama }}

            </option>

        @endforeach

    </select>

    @error('kategori_id')
        <p class="mt-2 text-xs text-red-600">
            {{ $message }}
        </p>
    @enderror
</div>


{{-- ========================================================= --}}
{{-- JUDUL --}}
{{-- ========================================================= --}}

<div>

    <label class="mb-2 block text-sm font-semibold text-gray-700">
        Judul Berita
    </label>

    <input
        type="text"
        name="judul"
        id="judul"
        value="{{ old('judul', $berita->judul ?? '') }}"
        required
        class="w-full rounded-xl border border-gray-200
               px-4 py-3 text-sm
               outline-none transition
               focus:border-green-500
               focus:ring-4 focus:ring-green-100"
        placeholder="Masukkan judul berita">

    @error('judul')
        <p class="mt-2 text-xs text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>


{{-- ========================================================= --}}
{{-- SLUG --}}
{{-- ========================================================= --}}

<div>

    <label class="mb-2 block text-sm font-semibold text-gray-700">
        Slug
    </label>

    <input
        type="text"
        name="slug"
        id="slug"
        value="{{ old('slug', $berita->slug ?? '') }}"
        required
        class="w-full rounded-xl border border-gray-200
               bg-gray-50 px-4 py-3 text-sm
               outline-none transition
               focus:border-green-500
               focus:ring-4 focus:ring-green-100">

    <p class="mt-2 text-xs text-gray-400">
        Contoh: kegiatan-sekolah-terbaru
    </p>

    @error('slug')
        <p class="mt-2 text-xs text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>


{{-- ========================================================= --}}
{{-- GAMBAR --}}
{{-- ========================================================= --}}

<div>

    <label class="mb-2 block text-sm font-semibold text-gray-700">
        Gambar
    </label>

    <input
        type="file"
        name="gambar"
        accept="image/*"
        class="block w-full rounded-xl border
               border-gray-200 bg-white
               px-4 py-3 text-sm
               file:mr-4 file:rounded-lg
               file:border-0 file:bg-green-50
               file:px-4 file:py-2
               file:text-sm file:font-semibold
               file:text-green-700">

    @if(isset($berita) && $berita->gambar)

        <div class="mt-4">

            <img
                src="{{ asset('storage/'.$berita->gambar) }}"
                class="h-32 w-48 rounded-xl
                       border border-gray-200
                       object-cover">

        </div>

    @endif

    @error('gambar')
        <p class="mt-2 text-xs text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>


{{-- ========================================================= --}}
{{-- RINGKASAN --}}
{{-- ========================================================= --}}

<div>

    <label class="mb-2 block text-sm font-semibold text-gray-700">
        Ringkasan
    </label>

    <textarea
        name="ringkasan"
        rows="4"
        class="w-full rounded-xl border border-gray-200
               px-4 py-3 text-sm
               outline-none transition
               focus:border-green-500
               focus:ring-4 focus:ring-green-100"
        placeholder="Masukkan ringkasan berita">{{ old('ringkasan', $berita->ringkasan ?? '') }}</textarea>

    @error('ringkasan')
        <p class="mt-2 text-xs text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>


{{-- ========================================================= --}}
{{-- ISI BERITA WYSIWYG --}}
{{-- ========================================================= --}}

<div>

    <label class="mb-2 block text-sm font-semibold text-gray-700">
        Isi Berita
    </label>

    {{-- Quill --}}
    <div id="editor"
         class="min-h-[350px] rounded-xl
                border border-gray-200 bg-white">

        {!! old('isi', $berita->isi ?? '') !!}

    </div>

    {{-- Hidden input --}}
    <input type="hidden"
           name="isi"
           id="isi">

    @error('isi')
        <p class="mt-2 text-xs text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>


{{-- ========================================================= --}}
{{-- TANGGAL --}}
{{-- ========================================================= --}}

<div>

    <label class="mb-2 block text-sm font-semibold text-gray-700">
        Tanggal Terbit
    </label>

    <input
        type="datetime-local"
        name="tanggal_terbit"
        value="{{ old(
            'tanggal_terbit',
            isset($berita->tanggal_terbit)
                ? \Carbon\Carbon::parse($berita->tanggal_terbit)->format('Y-m-d\TH:i')
                : ''
        ) }}"
        class="w-full rounded-xl border border-gray-200
               px-4 py-3 text-sm
               outline-none transition
               focus:border-green-500
               focus:ring-4 focus:ring-green-100">

    @error('tanggal_terbit')
        <p class="mt-2 text-xs text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>


{{-- ========================================================= --}}
{{-- STATUS --}}
{{-- ========================================================= --}}

<div>

    <label class="mb-2 block text-sm font-semibold text-gray-700">
        Status
    </label>

    <select
        name="status"
        required
        class="w-full rounded-xl border border-gray-200
               bg-white px-4 py-3 text-sm
               outline-none transition
               focus:border-green-500
               focus:ring-4 focus:ring-green-100">

        <option value="draft"
            @selected(old('status', $berita->status ?? 'draft') === 'draft')>

            Draft

        </option>

        <option value="published"
            @selected(old('status', $berita->status ?? '') === 'published')>

            Published

        </option>

    </select>

</div>


{{-- ========================================================= --}}
{{-- SUBMIT --}}
{{-- ========================================================= --}}

<div class="flex items-center justify-end gap-3
            border-t border-gray-100 pt-6">

    <a href="{{ route('admin.berita.index') }}"
       class="rounded-xl border border-gray-200
              bg-white px-5 py-3 text-sm
              font-semibold text-gray-600
              transition hover:bg-gray-50">

        Batal

    </a>

    <button
        type="submit"
        class="rounded-xl bg-green-600
               px-6 py-3 text-sm font-semibold
               text-white shadow-sm
               transition hover:bg-green-700
               hover:shadow-green">

        {{ isset($berita) ? 'Update Berita' : 'Simpan Berita' }}

    </button>

</div>
