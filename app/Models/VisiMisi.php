<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    protected $table = 'visi_misi'; // Nama tabel yang sesuai

    protected $fillable = [
        'visi',
        'misi',
    ];

    // Cast kolom 'misi' ke tipe array agar otomatis di-handle oleh Eloquent
    protected $casts = [
        'misi' => 'array',
    ];
}
