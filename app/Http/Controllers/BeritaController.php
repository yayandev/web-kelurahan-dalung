<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    //

    public function index()
    {
        $beritas = \App\Models\Berita::paginate(10);
        return view('berita.index', compact('beritas'));
    }

    public function show($id)
    {
        return view('berita.show', compact('id'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        // Handle file upload if exists
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita_images', 'public');
            $validated['gambar'] = $path;
        }

        // Create new Berita record
        \App\Models\Berita::create($validated);

        return redirect()->route('berita.index')->with('success', 'Berita created successfully.');
    }

    public function edit($id)
    {
        $berita = \App\Models\Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = \App\Models\Berita::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        // Handle file upload if exists
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita_images', 'public');
            $validated['gambar'] = $path;
        }

        $berita->update($validated);

        return redirect()->route('berita.index')->with('success', 'Berita updated successfully.');
    }


    public function destroy($id)
    {
        $berita = \App\Models\Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita deleted successfully.');
    }
}
