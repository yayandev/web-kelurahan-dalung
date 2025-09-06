<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKelurahan extends Model
{
    use HasFactory;

    protected $table = 'profil_kelurahan'; // Nama tabel yang sesuai

    protected $fillable = [
        'sejarah',
        'luas_wilayah',
        'batas_utara',
        'batas_selatan',
        'batas_timur',
        'batas_barat',
        'jumlah_penduduk',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'jumlah_kk',
        'jumlah_rtrw',
        'alamat_kantor',
        'nomor_telepon',
        'email_kelurahan',
        'jam_operasional',
        'instagram',
        'facebook',
        'tiktok'
    ];
}
