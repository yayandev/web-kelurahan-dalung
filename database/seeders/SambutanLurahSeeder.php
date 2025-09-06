<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SambutanLurah; // Import model SambutanLurah

class SambutanLurahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SambutanLurah::updateOrCreate(
            ['id' => 1], // Kriteria untuk mencari record
            [
                'judul_sambutan' => 'Sambutan Hangat dari Kepala Kelurahan Dalung',
                'isi_sambutan' => 'Dengan penuh rasa syukur dan hormat, saya menyambut Anda di website resmi Kelurahan Dalung. Media digital ini kami hadirkan sebagai wujud komitmen kami dalam meningkatkan transparansi dan kualitas pelayanan publik. Mari kita jalin komunikasi yang erat untuk membangun Kelurahan Dalung yang semakin maju, sejahtera, dan harmonis. Bersama kita bisa!',
                'nama_lurah' => 'Ibu Ketut Ayu, S.Sos., M.AP.',
                'jabatan_lurah' => 'Kepala Kelurahan Dalung',
                'foto_lurah' => null, // Awalnya tanpa foto, nanti bisa diupload via admin
            ]
        );
    }
}
