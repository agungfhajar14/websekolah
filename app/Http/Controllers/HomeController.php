<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\Slider;
use App\Models\ProfilSekolah;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil slider aktif dari database
        $sliders = Slider::where('status', 1)
            ->orderBy('urutan', 'asc')
            ->get();

        // Ambil berita aktif
        $berita = Berita::where('status', 1)
            ->latest('tanggal_terbit')
            ->take(6)
            ->get();

        // Ambil profil sekolah
        $profilSekolah = ProfilSekolah::first();

        return view('welcome', compact(
            'sliders',
            'berita',
            'profilSekolah'
        ));
    }
}


