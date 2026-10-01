<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $fillable = [
        'nama_donatur',
        'jenis_donatur',
        'kontak',
        'email',
        'alamat',
        'jenis_donasi',
        'status',
        'keterangan',
    ];
}