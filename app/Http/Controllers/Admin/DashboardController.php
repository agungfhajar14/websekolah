<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Slider;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();

        $beritaPublished = Berita::where(
            'status',
            'published'
        )->count();

        $beritaDraft = Berita::where(
            'status',
            'draft'
        )->count();

        $totalKategori = KategoriBerita::count();

        $totalSlider = Slider::where(
            'status',
            true
        )->count();

        $beritaTerbaru = Berita::with('kategori')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBerita',
            'beritaPublished',
            'beritaDraft',
            'totalKategori',
            'totalSlider',
            'beritaTerbaru'
        ));
    }
}
