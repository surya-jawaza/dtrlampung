<?php

namespace App\Http\Controllers;

use App\Models\SuratDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratDokumenController extends Controller
{
    public function index()
    {
        $suratDokumens = SuratDokumen::latest()->get();

        return view('surat-dokumen.index', compact('suratDokumens'));
    }

    public function create()
    {
        return view('surat-dokumen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dokumen' => 'required',
            'jenis_dokumen' => 'required',
            'tanggal_dokumen' => 'required|date',
            'nomor_dokumen' => 'nullable',
            'keterangan' => 'nullable',
            'file_dokumen' => 'required|mimes:pdf|max:10240',
        ]);

        $validated['file_dokumen'] = $request
            ->file('file_dokumen')
            ->store('surat-dokumen', 'public');

        SuratDokumen::create($validated);

        return redirect()->route('surat-dokumen.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $suratDokumen = SuratDokumen::findOrFail($id);

        return view('surat-dokumen.show', compact('suratDokumen'));
    }

    public function edit(string $id)
    {
        $suratDokumen = SuratDokumen::findOrFail($id);

        return view('surat-dokumen.edit', compact('suratDokumen'));
    }

    public function update(Request $request, string $id)
    {
        $suratDokumen = SuratDokumen::findOrFail($id);

        $validated = $request->validate([
            'nama_dokumen' => 'required',
            'jenis_dokumen' => 'required',
            'tanggal_dokumen' => 'required|date',
            'nomor_dokumen' => 'nullable',
            'keterangan' => 'nullable',
            'file_dokumen' => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file_dokumen')) {
            if ($suratDokumen->file_dokumen) {
                Storage::disk('public')->delete($suratDokumen->file_dokumen);
            }

            $validated['file_dokumen'] = $request
                ->file('file_dokumen')
                ->store('surat-dokumen', 'public');
        }

        $suratDokumen->update($validated);

        return redirect()->route('surat-dokumen.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $suratDokumen = SuratDokumen::findOrFail($id);

        if ($suratDokumen->file_dokumen) {
            Storage::disk('public')->delete($suratDokumen->file_dokumen);
        }

        $suratDokumen->delete();

        return redirect()->route('surat-dokumen.index')->with('success', 'Data berhasil dihapus.');
    }
}