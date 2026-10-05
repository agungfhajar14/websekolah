<div class="space-y-6">

    {{-- NAMA --}}
    <div>
        <label
            for="nama"
            class="mb-2 block text-sm font-semibold text-slate-700"
        >
            Nama Kategori
        </label>

        <input
            type="text"
            name="nama"
            id="nama"
            value="{{ old('nama', $kategoriBerita->nama ?? '') }}"
            placeholder="Contoh: Berita Sekolah"
            class="
                w-full rounded-xl
                border border-slate-200
                bg-white
                px-4 py-3
                text-sm text-slate-800
                outline-none
                transition
                placeholder:text-slate-400
                focus:border-green-500
                focus:ring-4
                focus:ring-green-100
            "
        >

        @error('nama')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>


    {{-- SLUG --}}
    <div>
        <label
            for="slug"
            class="mb-2 block text-sm font-semibold text-slate-700"
        >
            Slug
        </label>

        <input
            type="text"
            name="slug"
            id="slug"
            value="{{ old('slug', $kategoriBerita->slug ?? '') }}"
            placeholder="berita-sekolah"
            class="
                w-full rounded-xl
                border border-slate-200
                bg-white
                px-4 py-3
                text-sm text-slate-800
                outline-none
                transition
                placeholder:text-slate-400
                focus:border-green-500
                focus:ring-4
                focus:ring-green-100
            "
        >

        <p class="mt-2 text-xs text-slate-400">
            Gunakan huruf kecil dan tanda strip (-).
        </p>

        @error('slug')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>


    {{-- DESKRIPSI --}}
    <div>
        <label
            for="deskripsi"
            class="mb-2 block text-sm font-semibold text-slate-700"
        >
            Deskripsi
        </label>

        <textarea
            name="deskripsi"
            id="deskripsi"
            rows="5"
            placeholder="Masukkan deskripsi kategori..."
            class="
                w-full rounded-xl
                border border-slate-200
                bg-white
                px-4 py-3
                text-sm text-slate-800
                outline-none
                transition
                placeholder:text-slate-400
                focus:border-green-500
                focus:ring-4
                focus:ring-green-100
            "
        >{{ old('deskripsi', $kategoriBerita->deskripsi ?? '') }}</textarea>

        @error('deskripsi')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>


    {{-- STATUS --}}
    <div>
        <label
            for="status"
            class="mb-2 block text-sm font-semibold text-slate-700"
        >
            Status
        </label>

        <select
            name="status"
            id="status"
            class="
                w-full rounded-xl
                border border-slate-200
                bg-white
                px-4 py-3
                text-sm text-slate-800
                outline-none
                transition
                focus:border-green-500
                focus:ring-4
                focus:ring-green-100
            "
        >

            <option
                value="aktif"
                {{ old('status', $kategoriBerita->status ?? 'aktif') === 'aktif'
                    ? 'selected'
                    : '' }}
            >
                Aktif
            </option>

            <option
                value="nonaktif"
                {{ old('status', $kategoriBerita->status ?? '') === 'nonaktif'
                    ? 'selected'
                    : '' }}
            >
                Nonaktif
            </option>

        </select>

        @error('status')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>


    {{-- BUTTON --}}
    <div
        class="
            flex flex-col-reverse gap-3
            border-t border-slate-100
            pt-6
            sm:flex-row
            sm:justify-end
        "
    >

        <a
            href="{{ route('admin.kategori-berita.index') }}"
            class="
                inline-flex
                items-center
                justify-center
                rounded-xl
                border border-slate-200
                bg-white
                px-5 py-3
                text-sm font-semibold
                text-slate-600
                transition
                hover:bg-slate-50
            "
        >
            Batal
        </a>

        <button
            type="submit"
            class="
                inline-flex
                items-center
                justify-center
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

            @isset($kategoriBerita)
                Simpan Perubahan
            @else
                Tambah Kategori
            @endisset

        </button>

    </div>

</div>
