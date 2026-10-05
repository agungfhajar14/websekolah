<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('kategori')
            ->where('status', 'terbit')
            ->whereNotNull('tanggal_terbit')
            ->where('tanggal_terbit', '<=', now());

        // Pencarian
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('ringkasan', 'like', "%{$search}%");

            });
        }

        // Filter kategori
        if ($request->filled('kategori')) {

            $query->whereHas('kategori', function ($q) use ($request) {

                $q->where('slug', $request->kategori);

            });
        }

        $beritas = $query
            ->latest('tanggal_terbit')
            ->paginate(9)
            ->withQueryString();

        $kategoris = KategoriBerita::where('status', 'aktif')
            ->orderBy('nama')
            ->get();

        return view(
            'berita.index',
            compact(
                'beritas',
                'kategoris'
            )
        );
    }


    public function show($slug)
    {
        $berita = Berita::with('kategori')
            ->where('slug', $slug)
            ->where('status', 'terbit')
            ->firstOrFail();

        // Tambah jumlah views
        $berita->increment('views');

        return view(
            'berita.show',
            compact('berita')
        );
    }
}
