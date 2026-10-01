<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $fillable = [
        'nama_barang',
        'kategori',
        'jumlah',
        'satuan',
        'kondisi',
        'lokasi_penyimpanan',
        'tanggal_pembelian',
        'harga_perolehan',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_pembelian' => 'date',
        'harga_perolehan' => 'decimal:2',
    ];
}