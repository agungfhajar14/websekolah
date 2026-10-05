<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Menampilkan daftar slider.
     */
    public function index(Request $request)
    {
        $query = Slider::query();

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%')
                    ->orWhere('tombol_text', 'like', '%' . $search . '%');

            });
        }

        $sliders = $query
            ->orderBy('urutan', 'asc')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.slider.index', compact('sliders'));
    }


    /**
     * Form tambah slider.
     */
    public function create()
    {
        return view('admin.slider.create');
    }


    /**
     * Simpan slider baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'deskripsi' => [
                'nullable',
                'string',
            ],

            'gambar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'tombol_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'tombol_url' => [
                'nullable',
                'string',
                'max:255',
            ],

            'urutan' => [
                'required',
                'integer',
                'min:0',
            ],

            'status' => [
                'required',
                'integer',
                'in:0,1',
            ],

        ]);


        // Upload gambar
        if ($request->hasFile('gambar')) {

            $validated['gambar'] = $request
                ->file('gambar')
                ->store('sliders', 'public');

        }


        // Simpan
        Slider::create($validated);


        return redirect()
            ->route('admin.slider.index')
            ->with('success', 'Slider berhasil ditambahkan.');
    }


    /**
     * Form edit slider.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }


    /**
     * Update slider.
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([

            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'deskripsi' => [
                'nullable',
                'string',
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'tombol_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'tombol_url' => [
                'nullable',
                'string',
                'max:255',
            ],

            'urutan' => [
                'required',
                'integer',
                'min:0',
            ],

            'status' => [
                'required',
                'integer',
                'in:0,1',
            ],

        ]);


        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($slider->gambar) {

                Storage::disk('public')
                    ->delete($slider->gambar);

            }


            // Simpan gambar baru
            $validated['gambar'] = $request
                ->file('gambar')
                ->store('sliders', 'public');
        }


        // Update data
        $slider->update($validated);


        return redirect()
            ->route('admin.slider.index')
            ->with('success', 'Slider berhasil diperbarui.');
    }


    /**
     * Hapus slider.
     */
    public function destroy(Slider $slider)
    {
        // Hapus file gambar
        if ($slider->gambar) {

            Storage::disk('public')
                ->delete($slider->gambar);

        }


        // Hapus data
        $slider->delete();


        return redirect()
            ->route('admin.slider.index')
            ->with('success', 'Slider berhasil dihapus.');
    }
}
