<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::latest()->get();

        return view('kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_kegiatan' => 'required',
            'kategori' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required',
            'penanggung_jawab' => 'required',
            'jumlah_peserta' => 'required|integer|min:0',
            'foto_utama' => 'nullable|image|max:2048',
            'ringkasan' => 'required',
            'isi_kegiatan' => 'required',
            'dokumentasi.*' => 'nullable|image|max:2048',
            'link_terkait' => 'nullable|url',
            'keterangan' => 'nullable',
        ]);

        if ($request->hasFile('foto_utama')) {
            $validated['foto_utama'] = $request
                ->file('foto_utama')
                ->store('foto-kegiatan', 'public');
        }

        if ($request->hasFile('dokumentasi')) {
            $fotoDokumentasi = [];

            foreach ($request->file('dokumentasi') as $foto) {
                $fotoDokumentasi[] = $foto->store(
                    'dokumentasi-kegiatan',
                    'public'
                );
            }

            $validated['dokumentasi'] = $fotoDokumentasi;
        }

        Kegiatan::create($validated);

        return redirect('/kegiatan')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        return view('kegiatan.show', compact('kegiatan'));
    }

    public function edit(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        return view('kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'judul_kegiatan' => 'required',
            'kategori' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required',
            'penanggung_jawab' => 'required',
            'jumlah_peserta' => 'required|integer|min:0',
            'foto_utama' => 'nullable|image|max:5120',
            'ringkasan' => 'required',
            'isi_kegiatan' => 'required',
            'dokumentasi.*' => 'nullable|image|max:5120',
            'link_terkait' => 'nullable|url',
            'keterangan' => 'nullable',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);

        if ($request->hasFile('foto_utama')) {
            if ($kegiatan->foto_utama) {
                Storage::disk('public')->delete($kegiatan->foto_utama);
            }

            $validated['foto_utama'] = $request
                ->file('foto_utama')
                ->store('foto-kegiatan', 'public');
        }

        if ($request->hasFile('dokumentasi')) {
            if ($kegiatan->dokumentasi) {
                foreach ($kegiatan->dokumentasi as $foto) {
                    Storage::disk('public')->delete($foto);
                }
            }

            $fotoDokumentasi = [];

            foreach ($request->file('dokumentasi') as $foto) {
                $fotoDokumentasi[] = $foto->store(
                    'dokumentasi-kegiatan',
                    'public'
                );
            }

            $validated['dokumentasi'] = $fotoDokumentasi;
        }

        $kegiatan->update($validated);

        return redirect('/kegiatan')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        if ($kegiatan->foto_utama) {
            Storage::disk('public')->delete($kegiatan->foto_utama);
        }

        if ($kegiatan->dokumentasi) {
            foreach ($kegiatan->dokumentasi as $foto) {
                Storage::disk('public')->delete($foto);
            }
        }

        $kegiatan->delete();

        return redirect('/kegiatan')->with('success', 'Data berhasil dihapus.');
    }
}