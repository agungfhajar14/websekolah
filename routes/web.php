<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KategoriBeritaController;
use App\Http\Controllers\Admin\SliderController;

Auth::routes([
    'register' => false,
    'password.email' => false,
    'password.request' => false,
]);

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [
            DashboardController::class,
            'index'
        ])->name('dashboard');

        // Kategori Berita
        Route::resource(
            'kategori-berita',
            KategoriBeritaController::class
        )->except(['show']);

        // Berita
        Route::resource(
            'berita',
            BeritaController::class
        )->except(['show'])
        ->parameters([
            'berita' => 'berita',
        ]);
        Route::resource('slider', SliderController::class)
    ->except(['show']);
    });


// Home
Route::get('/', [
    App\Http\Controllers\HomeController::class,
    'index'
])->name('home');

// Detail berita
Route::get('/berita/{slug}', [
    BeritaController::class,
    'show'
])->name('berita.show');
