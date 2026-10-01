<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'judul_kegiatan',
        'kategori',
        'tanggal',
        'waktu',
        'lokasi',
        'penanggung_jawab',
        'jumlah_peserta',
        'foto_utama',
        'ringkasan',
        'isi_kegiatan',
        'dokumentasi',
        'link_terkait',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'dokumentasi' => 'array',
    ];
}