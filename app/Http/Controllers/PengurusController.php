<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    public function index()
    {
        $penguruses = Pengurus::latest()->get();

        return view('pengurus.index', compact('penguruses'));
    }

    public function create()
    {
        return view('pengurus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image|max:2048',
            'jabatan' => 'required',
            'kontak' => 'required',
            'email' => 'nullable|email',
            'periode' => 'required',
            'jenjang_training' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('foto-pengurus', 'public');
        }

        Pengurus::create($validated);

        return redirect()->route('pengurus.index');
    }

    public function edit(string $id)
    {
        $pengurus = Pengurus::findOrFail($id);

        return view('pengurus.edit', compact('pengurus'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image|max:2048',
            'jabatan' => 'required',
            'kontak' => 'required',
            'email' => 'nullable|email',
            'periode' => 'required',
            'jenjang_training' => 'required',
            'status' => 'required',
        ]);

        $pengurus = Pengurus::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($pengurus->foto) {
                Storage::disk('public')->delete($pengurus->foto);
            }

            $validated['foto'] = $request->file('foto')
                ->store('foto-pengurus', 'public');
        }

        $pengurus->update($validated);

        return redirect()->route('pengurus.index');
    }

    public function destroy(string $id)
    {
        $pengurus = Pengurus::findOrFail($id);

        if ($pengurus->foto) {
            Storage::disk('public')->delete($pengurus->foto);
        }

        $pengurus->delete();

        return redirect()->route('pengurus.index');
    }
}