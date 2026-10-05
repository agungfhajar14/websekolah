<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('kategori');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('ringkasan', 'like', "%{$search}%");

            });
        }

        $beritas = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.berita.index',
            compact('beritas')
        );
    }


    public function create()
    {
        $kategoris = KategoriBerita::where('status', 'aktif')
            ->orderBy('nama')
            ->get();

        return view(
            'admin.berita.create',
            compact('kategoris')
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([

            'kategori_id' => [
                'required',
                'exists:kategori_berita,id'
            ],

            'judul' => [
                'required',
                'string',
                'max:255'
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:berita,slug'
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'ringkasan' => [
                'nullable',
                'string'
            ],

            'isi' => [
                'required',
                'string'
            ],

            'tanggal_terbit' => [
                'nullable',
                'date'
            ],

            'status' => [
                'required',
                'in:draft,terbit'
            ],

        ]);


        $validated['user_id'] = auth()->id();

        $validated['views'] = 0;


        if (empty($validated['tanggal_terbit'])) {
            $validated['tanggal_terbit'] = now();
        }


        if ($request->hasFile('gambar')) {

            $validated['gambar'] =
                $request->file('gambar')
                    ->store('berita', 'public');
        }


        Berita::create($validated);


        return redirect()
            ->route('admin.berita.index')
            ->with(
                'success',
                'Berita berhasil ditambahkan.'
            );
    }


    public function edit(Berita $berita)
    {
        $kategoris = KategoriBerita::where('status', 'aktif')
            ->orderBy('nama')
            ->get();

        return view(
            'admin.berita.edit',
            compact(
                'berita',
                'kategoris'
            )
        );
    }


    public function update(
        Request $request,
        Berita $berita
    ) {

        $validated = $request->validate([

            'kategori_id' => [
                'required',
                'exists:kategori_berita,id'
            ],

            'judul' => [
                'required',
                'string',
                'max:255'
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:berita,slug,' . $berita->id
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'ringkasan' => [
                'nullable',
                'string'
            ],

            'isi' => [
                'required',
                'string'
            ],

            'tanggal_terbit' => [
                'nullable',
                'date'
            ],

            'status' => [
                'required',
                'in:draft,terbit'
            ],

        ]);


        if ($request->hasFile('gambar')) {

            $validated['gambar'] =
                $request->file('gambar')
                    ->store('berita', 'public');
        }


        $berita->update($validated);


        return redirect()
            ->route('admin.berita.index')
            ->with(
                'success',
                'Berita berhasil diperbarui.'
            );
    }


    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with(
                'success',
                'Berita berhasil dihapus.'
            );
    }
    public function show($slug) {
        $berita = Berita::where('slug', $slug)->where('status', 'published') ->firstOrFail();
        $berita->increment('views');
        return view('berita.show', compact('berita')); }
}
