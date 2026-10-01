<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
       protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kontak_person',
        'email',
        'alamat',
        'jenjang_training',
        'status',
        'foto',
    ];
}
