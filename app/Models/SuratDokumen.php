<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratDokumen extends Model
{
    protected $fillable = [
        'nama_dokumen',
        'jenis_dokumen',
        'tanggal_dokumen',
        'nomor_dokumen',
        'keterangan',
        'file_dokumen',
    ];

    protected $casts = [
        'tanggal_dokumen' => 'date',
    ];
}