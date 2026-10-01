<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        $donaturs = Donatur::latest()->get();

        return view('donatur.index', compact('donaturs'));
    }

    public function create()
    {
        return view('donatur.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_donatur' => 'required',
            'jenis_donatur' => 'required',
            'kontak' => 'required',
            'email' => 'nullable|email',
            'alamat' => 'required',
            'jenis_donasi' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        Donatur::create($validated);

        return redirect()->route('donatur.index');
    }

    public function edit(string $id)
    {
        $donatur = Donatur::findOrFail($id);

        return view('donatur.edit', compact('donatur'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_donatur' => 'required',
            'jenis_donatur' => 'required',
            'kontak' => 'required',
            'email' => 'nullable|email',
            'alamat' => 'required',
            'jenis_donasi' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $donatur = Donatur::findOrFail($id);

        $donatur->update($validated);

        return redirect()->route('donatur.index');
    }

    public function destroy(string $id)
    {
        $donatur = Donatur::findOrFail($id);

        $donatur->delete();

        return redirect()->route('donatur.index');
    }
}