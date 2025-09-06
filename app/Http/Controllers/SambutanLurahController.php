<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SambutanLurah; // Import model SambutanLurah
use Illuminate\Support\Facades\Validator; // Import Validator
use Illuminate\Support\Facades\Storage; // Import Storage untuk file

class SambutanLurahController extends Controller
{
    public function index()
    {
        $sambutan = SambutanLurah::first(); // Ambil data sambutan lurah pertama
        return view('sambutan_form', compact('sambutan'));
    }

    /**
     * Memperbarui sambutan lurah di database.
     */
    public function update(Request $request)
    {
        // Validasi data yang masuk
        $validator = Validator::make($request->all(), [
            'judul_sambutan' => 'nullable|string|max:255',
            'isi_sambutan' => 'nullable|string',
            'nama_lurah' => 'nullable|string|max:255',
            'jabatan_lurah' => 'nullable|string|max:255',
            'foto_lurah' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk gambar
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cari record sambutan lurah (asumsi selalu ada satu dengan id=1)
        $sambutan = SambutanLurah::find(1);

        if (!$sambutan) {
            // Jika tidak ditemukan, buat baru (dengan updateOrCreate)
            $sambutan = SambutanLurah::updateOrCreate(['id' => 1], $validator->validated());
        }

        $data = $validator->validated(); // Ambil data yang sudah divalidasi

        // Handle upload foto
        if ($request->hasFile('foto_lurah')) {
            // Hapus foto lama jika ada
            if ($sambutan->foto_lurah && Storage::disk('public')->exists($sambutan->foto_lurah)) {
                Storage::disk('public')->delete($sambutan->foto_lurah);
            }

            // Simpan foto baru
            $path = $request->file('foto_lurah')->store('lurah_photos', 'public');
            $data['foto_lurah'] = $path; // Simpan path relatif dari storage/app/public
        } else {
            // Jika tidak ada file baru diunggah, dan tidak ada foto lama, set ke null
            // Atau jika ada foto lama tapi tidak diunggah ulang, biarkan yang lama
            if (!isset($data['foto_lurah']) && !$request->has('keep_current_photo')) { // Asumsi ada hidden input 'keep_current_photo'
                // Jika ingin menghapus foto jika input file kosong
                // unset($data['foto_lurah']); // Jangan hapus jika tidak ada input file, biarkan yang lama
            }
        }

        // Update data sambutan lurah
        $sambutan->update($data);


        return redirect()->route('sambutan_form')->with('success', 'Sambutan Lurah berhasil diperbarui!');
    }
}
