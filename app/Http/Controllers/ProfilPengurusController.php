<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;

class ProfilPengurusController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::where('status', 'Aktif')
            ->orderBy('id')
            ->get();

        return view('profilpengurusdtr', compact('pengurus'));
    }
}