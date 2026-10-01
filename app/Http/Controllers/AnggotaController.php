<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotas = Anggota::latest()->get();

    return view('anggota.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'kontak_person' => 'required',
            'email' => 'nullable|email',
            'alamat' => 'required',
            'jenjang_training' => 'required',
            'status' => 'required',
            'foto' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('foto')) {
    $validated['foto'] = $request->file('foto')->store('foto-anggota', 'public');
}
    Anggota::create($validated);

    return redirect()->route('anggota.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $anggota = Anggota::findOrFail($id);

    return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $validated = $request->validate([
        'nama_lengkap' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required',
        'kontak_person' => 'required',
        'email' => 'nullable|email',
        'alamat' => 'required',
        'jenjang_training' => 'required',
        'status' => 'required',
        'foto' => 'nullable|image|max:2048',
    ]);

    $anggota = Anggota::findOrFail($id);

    if ($request->hasFile('foto')) {

    // Hapus foto lama jika ada
    if ($anggota->foto) {
        Storage::disk('public')->delete($anggota->foto);
    }

    // Simpan foto baru
    $validated['foto'] = $request->file('foto')->store('foto-anggota', 'public');
}

        $anggota->update($validated);

    return redirect()->route('anggota.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $anggota = Anggota::findOrFail($id);
if ($anggota->foto) {
    Storage::disk('public')->delete($anggota->foto);
}
    $anggota->delete();
    
    return redirect()->route('anggota.index')->with('success', 'Data berhasil dihapus.');
    }
}
