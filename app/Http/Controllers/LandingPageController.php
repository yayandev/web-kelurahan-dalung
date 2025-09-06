<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    //

    public function index()
    {
        $sambutan_lurah = \App\Models\SambutanLurah::first();
        $profil = \App\Models\ProfilKelurahan::first();
        $galeriItems = \App\Models\Galeri::paginate(8);
        $beritas = \App\Models\Berita::paginate(6);
        $sotk = \App\Models\StrukturOrganisasi::paginate(4);

        // return response()->json([
        //     'sambutan_lurah' => $sambutan_lurah,
        //     'visi_misi' => $visi_misi,
        //     'profil' => $profil,
        // ]);
        return view('welcome', compact('sambutan_lurah', 'profil', 'galeriItems', 'beritas', 'sotk'));
    }
}
