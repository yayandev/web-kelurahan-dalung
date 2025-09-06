<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SambutanLurah extends Model
{
    use HasFactory;

    protected $table = 'sambutan_lurah'; // Nama tabel yang sesuai

    protected $fillable = [
        'judul_sambutan',
        'isi_sambutan',
        'nama_lurah',
        'jabatan_lurah',
        'foto_lurah',
    ];
}
