<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduam extends Model
{
    //

    protected $table = 'pengaduams';

    protected $fillable = [
        'nama',
        'no_whatsapp',
        'subjek',
        'pesan',
        'gambar',
    ];
}
