<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    //
    public function index()
    {
        $strukturs = StrukturOrganisasi::paginate(10);
        return view('struktur-organisasi.index', compact('strukturs'));
    }

    public function create()
    {
        return view('struktur-organisasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048', // Maksimal 2MB
        ]);

        $data = $request->only(['jabatan', 'nama']);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('struktur_organisasi', 'public');
            $data['foto'] = $path;
        }

        \App\Models\StrukturOrganisasi::create($data);

        return redirect()->route('struktur-organisasi.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $struktur = \App\Models\StrukturOrganisasi::findOrFail($id);
        return view('struktur-organisasi.edit', compact('struktur'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048', // Maksimal 2MB
        ]);

        $struktur = \App\Models\StrukturOrganisasi::findOrFail($id);
        $data = $request->only(['jabatan', 'nama']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($struktur->foto) {
                Storage::disk('public')->delete($struktur->foto);
            }
            $path = $request->file('foto')->store('struktur_organisasi', 'public');
            $data['foto'] = $path;
        }

        $struktur->update($data);

        return redirect()->route('struktur-organisasi.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $struktur = \App\Models\StrukturOrganisasi::findOrFail($id);
        if ($struktur->foto) {
            Storage::disk('public')->delete($struktur->foto);
        }
        $struktur->delete();

        return redirect()->route('struktur-organisasi.index')->with('success', 'Data berhasil dihapus.');
    }
}
