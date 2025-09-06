<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilKelurahan; // Import model ProfilKelurahan
use Illuminate\Support\Facades\Validator; // Import Validator

class ProfilKelurahanController extends Controller
{
    /**
     * Menampilkan formulir untuk mengedit profil kelurahan.
     * Akan mengambil data yang sudah ada atau membuat instance baru jika belum ada.
     */

    public function index()
    {
        $profil = ProfilKelurahan::first(); // Ambil data profil kelurahan pertama
        return view('profil.index', compact('profil'));
    }



    /**
     * Memperbarui profil kelurahan di database.
     */
    public function update(Request $request)
    {
        // Validasi data yang masuk
        $validator = Validator::make($request->all(), [
            'sejarah' => 'nullable|string',
            'luas_wilayah' => 'nullable|string|max:255',
            'batas_utara' => 'nullable|string|max:255',
            'batas_selatan' => 'nullable|string|max:255',
            'batas_timur' => 'nullable|string|max:255',
            'batas_barat' => 'nullable|string|max:255',
            'jumlah_penduduk' => 'nullable|string|max:255',
            'jumlah_laki_laki' => 'nullable|string|max:255',
            'jumlah_perempuan' => 'nullable|string|max:255',
            'jumlah_kk' => 'nullable|string|max:255',
            'jumlah_rtrw' => 'nullable|string|max:255',
            'alamat_kantor' => 'nullable|string',
            'nomor_telepon' => 'nullable|string|max:255',
            'email_kelurahan' => 'nullable|email|max:255',
            'jam_operasional' => 'nullable|string|max:255',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cari profil kelurahan (asumsi selalu ada satu, kita bisa update yang ID-nya 1)
        $profil = ProfilKelurahan::find(1); // Atau ProfilKelurahan::first()

        if (!$profil) {
            // Jika tidak ditemukan, mungkin Anda ingin membuat yang baru,
            // atau lempar error tergantung kebutuhan aplikasi Anda.
            // Untuk kasus ini, kita buat baru jika tidak ada (menggunakan updateOrCreate)
            $profil = ProfilKelurahan::updateOrCreate(['id' => 1], $validator->validated());
        } else {
            // Update data profil dengan data yang divalidasi
            $profil->update($validator->validated());
        }

        return redirect()->route('profil.index')->with('success', 'Profil Kelurahan berhasil diperbarui!');
    }
}
