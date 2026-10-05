<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    protected $table = 'profil_sekolah';

    protected $fillable = [
        'nama_sekolah',
        'nama_singkat',
        'deskripsi_singkat',
        'deskripsi',
        'alamat',
        'telepon',
        'email',
        'website',
        'logo',
        'foto',
        'visi',
        'misi',
        'facebook',
        'instagram',
        'youtube',
        'tiktok',
    ];
}
