<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisiMisi; // Import model VisiMisi
use Illuminate\Support\Facades\Validator; // Import Validator

class VisiMisiController extends Controller
{
    /**
     * Menampilkan formulir untuk mengedit visi dan misi kelurahan.
     */

    public function index()
    {
        $visiMisi = VisiMisi::first(); // Ambil data visi misi pertama
        return view('vision_mission_form', compact('visiMisi'));
    }

    public function edit()
    {
        // Cari visi misi yang pertama, atau buat instance baru jika belum ada
        // Asumsi hanya ada satu set visi misi untuk kelurahan
        $visiMisi = VisiMisi::firstOrCreate(
            ['id' => 1], // Mencari berdasarkan ID 1
            [
                // Default values jika record baru dibuat
                'visi' => 'Mewujudkan Kelurahan Dalung yang Mandiri, Sejahtera, dan Berbudaya dengan Pelayanan Publik yang Prima.',
                'misi' => [
                    'Meningkatkan kualitas sumber daya manusia dan kesejahteraan masyarakat.',
                    'Mengembangkan perekonomian lokal berbasis potensi daerah.',
                    'Melestarikan nilai-nilai budaya dan kearifan lokal.',
                    'Meningkatkan tata kelola pemerintahan yang baik dan bersih.',
                ],
            ]
        );

        // Jika misi disimpan sebagai array JSON, pastikan itu dalam format array untuk form
        // (sudah dihandle oleh $casts di model, tapi ini untuk jaga-jaga)
        if (!is_array($visiMisi->misi)) {
            $visiMisi->misi = json_decode($visiMisi->misi, true) ?: [];
        }

        return view('vision_mission_form', compact('visiMisi'));
    }

    /**
     * Memperbarui visi dan misi kelurahan di database.
     */
    public function update(Request $request)
    {
        // Validasi data yang masuk
        $validator = Validator::make($request->all(), [
            'visi' => 'nullable|string',
            'misi' => 'nullable|array', // Misi diharapkan berupa array
            'misi.*' => 'nullable|string|max:500', // Setiap item dalam array misi adalah string
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cari record visi misi (asumsi selalu ada satu dengan id=1)
        $visiMisi = VisiMisi::find(1);

        if (!$visiMisi) {
            // Jika tidak ditemukan (seharusnya tidak terjadi dengan firstOrCreate di edit()),
            // buat baru atau sesuaikan penanganan error
            $visiMisi = VisiMisi::updateOrCreate(['id' => 1], $validator->validated());
        } else {
            // Update data visi misi dengan data yang divalidasi
            $visiMisi->update($validator->validated());
        }

        return redirect()->route('vision_mission')->with('success', 'Visi & Misi Kelurahan berhasil diperbarui!');
    }
}
