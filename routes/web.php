<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilKelurahanController;
use App\Http\Controllers\SambutanLurahController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('landing_page');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/profil-kelurahan', [ProfilKelurahanController::class, 'index'])->name('profil.index');
    Route::put('/profil/update', [ProfilKelurahanController::class, 'update'])->name('profil.update');
    Route::get('/visi-misi', [VisiMisiController::class, 'index'])->name('vision_mission');
    Route::put('/visi-misi/update', [VisiMisiController::class, 'update'])->name('vision_mission.update');
    Route::get('/sambutan-lurah', [SambutanLurahController::class, 'index'])->name('sambutan_form');
    Route::put('/sambutan-lurah/update', [SambutanLurahController::class, 'update'])->name('sambutan_form.update');
    Route::resource('galeri', App\Http\Controllers\GaleriController::class);
    Route::resource('berita', App\Http\Controllers\BeritaController::class);
    Route::resource('struktur-organisasi', App\Http\Controllers\StrukturOrganisasiController::class);
    Route::get('/pengaduans', [App\Http\Controllers\PengaduamController::class, 'index'])->name('pengaduan.index');
    Route::delete('/pengaduan/{id}', [App\Http\Controllers\PengaduamController::class, 'destroy'])->name('pengaduan.destroy');
});

Route::group(['middleware' => ['auth', 'role:admin,user']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/profil', function () {
    $visi_misi = \App\Models\VisiMisi::first();
    $profil = \App\Models\ProfilKelurahan::first();
    return view('profil_kelurahan', compact('visi_misi', 'profil'));
});

Route::get('/galeries', function () {
    $profil = \App\Models\ProfilKelurahan::first();
    $galeriItems = \App\Models\Galeri::orderBy('created_at', 'desc')->paginate(6);
    return view('galeries', compact('galeriItems', 'profil'));
});

Route::get('/beritas', function () {
    $profil = \App\Models\ProfilKelurahan::first();
    $beritas = \App\Models\Berita::orderBy('created_at', 'desc')->paginate(6);
    return view('beritas', compact('beritas', 'profil'));
});

Route::get('/pengaduan', function () {
    $profil = \App\Models\ProfilKelurahan::first();
    return view('pengaduan', compact('profil'));
})->name('pengaduan');

Route::post('/pengaduan', [App\Http\Controllers\PengaduamController::class, 'store'])->name('pengaduan.store');

Route::get('/struktur', function () {
    $profil = \App\Models\ProfilKelurahan::first();
    $sotk = \App\Models\StrukturOrganisasi::all();
    return view('struktur_organisasi', compact('sotk', 'profil'));
})->name('struktur_organisasi');

Route::get('/beritas/{id}', function ($id) {
    $profil = \App\Models\ProfilKelurahan::first();
    $berita = \App\Models\Berita::findOrFail($id);
    return view('berita.show', compact('berita', 'profil'));
})->name('detail_berita');
