<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::latest()->get();

        return view('inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required|integer|min:0',
            'satuan' => 'required',
            'kondisi' => 'required',
            'lokasi_penyimpanan' => 'required',
            'tanggal_pembelian' => 'nullable|date',
            'harga_perolehan' => 'nullable|numeric|min:0',
            'keterangan' => 'nullable',
        ]);

        Inventaris::create($validated);

        return redirect()->route('inventaris.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $inventaris = Inventaris::findOrFail($id);

        return view('inventaris.show', compact('inventaris'));
    }

    public function edit(string $id)
    {
        $inventaris = Inventaris::findOrFail($id);

        return view('inventaris.edit', compact('inventaris'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required|integer|min:0',
            'satuan' => 'required',
            'kondisi' => 'required',
            'lokasi_penyimpanan' => 'required',
            'tanggal_pembelian' => 'nullable|date',
            'harga_perolehan' => 'nullable|numeric|min:0',
            'keterangan' => 'nullable',
        ]);

        $inventaris = Inventaris::findOrFail($id);

        $inventaris->update($validated);

        return redirect()->route('inventaris.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $inventaris = Inventaris::findOrFail($id);

        $inventaris->delete();

        return redirect()->route('inventaris.index')->with('success', 'Data berhasil dihapus.');
    }
}