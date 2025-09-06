<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilKelurahan; // Import model ProfilKelurahan

class ProfilKelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan hanya ada satu record profil kelurahan
        // Jika sudah ada, update. Jika belum ada, buat.
        ProfilKelurahan::updateOrCreate(
            ['id' => 1], // Kriteria untuk mencari record
            [
                'sejarah' => 'Kelurahan Dalung memiliki sejarah yang kaya, bermula dari pemukiman kecil yang berkembang menjadi pusat komunitas yang dinamis. Dengan semangat gotong royong, masyarakat Dalung telah bersama-sama membangun kelurahan ini menjadi tempat yang nyaman untuk tinggal dan berinteraksi.',
                'luas_wilayah' => '450 Ha',
                'batas_utara' => 'Desa Mengwi',
                'batas_selatan' => 'Kelurahan Kerobokan',
                'batas_timur' => 'Desa Sempidi',
                'batas_barat' => 'Desa Tibubeneng',
                'jumlah_penduduk' => '32.500 Jiwa',
                'jumlah_laki_laki' => '16.000 Jiwa',
                'jumlah_perempuan' => '16.500 Jiwa',
                'jumlah_kk' => '8.000 KK',
                'jumlah_rtrw' => '50 RT / 15 RW',
                'alamat_kantor' => 'Jl. Raya Dalung No. 123, Kecamatan Kuta Utara, Kabupaten Badung, Bali, Kode Pos 80361',
                'nomor_telepon' => '(0361) 8947563',
                'email_kelurahan' => 'info@dalung.badungkab.go.id',
                'jam_operasional' => 'Senin - Jumat: 08.00 - 16.00 WITA',
                'instagram' => 'https://www.instagram.com/kelurahan_dalung',
                'facebook' => 'https://www.facebook.com/kelurahandalung',
                'tiktok' => 'https://www.tiktok.com/@kelurahan_dalung',
            ]
        );
    }
}
