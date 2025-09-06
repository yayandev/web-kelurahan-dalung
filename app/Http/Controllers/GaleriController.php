<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri; // Import model Galeri
use Illuminate\Support\Facades\Storage; // Import Storage facade
use Illuminate\Support\Facades\Validator; // Import Validator

class GaleriController extends Controller
{
    /**
     * Menampilkan daftar semua item galeri (untuk admin).
     */
    public function index()
    {
        $galeriItems = Galeri::latest()->paginate(10); // Ambil item galeri terbaru, 10 per halaman
        return view('galeri.index', compact('galeriItems'));
    }

    /**
     * Menampilkan formulir untuk membuat item galeri baru.
     */
    public function create()
    {
        return view('galeri.form');
    }

    /**
     * Menyimpan item galeri yang baru dibuat ke database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Wajib ada, harus gambar, max 5MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $filePath = $request->file('file')->store('galeri', 'public'); // Simpan ke storage/app/public/galeri

        Galeri::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Item galeri berhasil ditambahkan!');
    }

    /**
     * Menampilkan formulir untuk mengedit item galeri tertentu.
     */
    public function edit(Galeri $galeri)
    {
        return view('galeri.form', compact('galeri'));
    }

    /**
     * Memperbarui item galeri tertentu di database.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // Tidak wajib diupdate, max 5MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dataToUpdate = $request->only(['title', 'description']);

        // Handle update file jika ada
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($galeri->file_path && Storage::disk('public')->exists($galeri->file_path)) {
                Storage::disk('public')->delete($galeri->file_path);
            }
            $filePath = $request->file('file')->store('galeri', 'public');
            $dataToUpdate['file_path'] = $filePath;
        }

        $galeri->update($dataToUpdate);

        return redirect()->route('galeri.index')->with('success', 'Item galeri berhasil diperbarui!');
    }

    /**
     * Menghapus item galeri tertentu dari database.
     */
    public function destroy(Galeri $galeri)
    {
        // Hapus file dari storage terlebih dahulu
        if ($galeri->file_path && Storage::disk('public')->exists($galeri->file_path)) {
            Storage::disk('public')->delete($galeri->file_path);
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Item galeri berhasil dihapus!');
    }

    /**
     * Menampilkan halaman galeri publik.
     */
    public function showPublicGallery()
    {
        $galeriItems = Galeri::latest()->get(); // Ambil semua item galeri terbaru
        return view('frontend.galeri', compact('galeriItems'));
    }
}
