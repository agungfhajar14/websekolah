<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KategoriBeritaController extends Controller
{
    /**
     * Menampilkan daftar kategori berita.
     */
    public function index()
    {
        $kategoris = KategoriBerita::latest()->paginate(10);

        return view('admin.kategori-berita.index', compact('kategoris'));
    }

    /**
     * Menampilkan form tambah kategori.
     */
    public function create()
    {
        return view('admin.kategori-berita.create');
    }

    /**
     * Menyimpan kategori baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:kategori_berita,slug',
            ],
            'deskripsi' => ['nullable', 'string'],
            'status' => ['required', 'in:aktif,nonaktif'],
        ]);

        KategoriBerita::create($validated);

        return redirect()
            ->route('admin.kategori-berita.index')
            ->with('success', 'Kategori berita berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit kategori.
     */
    public function edit(KategoriBerita $kategoriBerita)
    {
        return view(
            'admin.kategori-berita.edit',
            compact('kategoriBerita')
        );
    }

    /**
     * Memperbarui kategori.
     */
    public function update(
        Request $request,
        KategoriBerita $kategoriBerita
    ) {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('kategori_berita', 'slug')
                    ->ignore($kategoriBerita->id),
            ],

            'deskripsi' => ['nullable', 'string'],

            'status' => [
                'required',
                'in:aktif,nonaktif',
            ],
        ]);

        $kategoriBerita->update($validated);

        return redirect()
            ->route('admin.kategori-berita.index')
            ->with('success', 'Kategori berita berhasil diperbarui.');
    }

public function destroy($id)
{
    $kategoriBerita = KategoriBerita::findOrFail($id);

    $kategoriBerita->delete();

    return redirect()
        ->route('admin.kategori-berita.index')
        ->with('success', 'Kategori berita berhasil dihapus.');
}
}
