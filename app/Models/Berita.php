<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'kategori_id',
        'user_id',
        'judul',
        'slug',
        'gambar',
        'ringkasan',
        'isi',
        'tanggal_terbit',
        'status',
        'views',
    ];

    protected $casts = [
        'tanggal_terbit' => 'date',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(
            KategoriBerita::class,
            'kategori_id'
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
