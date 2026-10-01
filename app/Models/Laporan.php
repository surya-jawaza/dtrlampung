<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'judul_laporan',
        'tanggal_laporan',
        'kategori',
        'keterangan',
        'file_pdf',
    ];

    protected $casts = [
        'tanggal_laporan' => 'date',
    ];
}