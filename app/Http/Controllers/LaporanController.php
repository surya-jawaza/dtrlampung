<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::latest()->get();

        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_laporan' => 'required',
            'tanggal_laporan' => 'required|date',
            'kategori' => 'required',
            'keterangan' => 'nullable',
            'file_pdf' => 'required|mimes:pdf|max:10240',
        ]);

        $validated['file_pdf'] = $request
            ->file('file_pdf')
            ->store('laporan', 'public');

        Laporan::create($validated);

        return redirect()->route('laporan.index');
    }

    public function show(string $id)
    {
        $laporan = Laporan::findOrFail($id);

        return view('laporan.show', compact('laporan'));
    }

    public function edit(string $id)
    {
        $laporan = Laporan::findOrFail($id);

        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, string $id)
    {
        $laporan = Laporan::findOrFail($id);

        $validated = $request->validate([
            'judul_laporan' => 'required',
            'tanggal_laporan' => 'required|date',
            'kategori' => 'required',
            'keterangan' => 'nullable',
            'file_pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file_pdf')) {
            if ($laporan->file_pdf) {
                Storage::disk('public')->delete($laporan->file_pdf);
            }

            $validated['file_pdf'] = $request
                ->file('file_pdf')
                ->store('laporan', 'public');
        }

        $laporan->update($validated);

        return redirect()->route('laporan.index');
    }

    public function destroy(string $id)
    {
        $laporan = Laporan::findOrFail($id);

        if ($laporan->file_pdf) {
            Storage::disk('public')->delete($laporan->file_pdf);
        }

        $laporan->delete();

        return redirect()->route('laporan.index');
    }
}