<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $fillable = [
        'nama',
        'foto',
        'jabatan',
        'kontak',
        'email',
        'periode',
        'jenjang_training',
        'status',
    ];
}