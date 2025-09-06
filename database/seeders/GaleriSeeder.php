<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan direktori galeri ada
        if (!Storage::disk('public')->exists('galeri')) {
            Storage::disk('public')->makeDirectory('galeri');
        }

        // Hapus data lama dan file lama untuk reset
        Galeri::truncate();
        // Anda bisa tambahkan logika untuk menghapus file dari storage jika diperlukan
        // Contoh: Storage::disk('public')->deleteDirectory('galeri');

        $dummyImages = [
            'https://source.unsplash.com/random/800x600?nature,landscape',
            'https://source.unsplash.com/random/800x600?city,architecture',
            'https://source.unsplash.com/random/800x600?people,community',
            'https://source.unsplash.com/random/800x600?village,culture',
            'https://source.unsplash.com/random/800x600?balinese,temple',
            'https://source.unsplash.com/random/800x600?ricefield,farmer',
        ];

        foreach ($dummyImages as $index => $imageUrl) {
            $filename = 'galeri/' . Str::uuid() . '.jpg';
            $contents = file_get_contents($imageUrl);
            Storage::disk('public')->put($filename, $contents);

            Galeri::create([
                'title' => 'Gambar Galeri ' . ($index + 1),
                'description' => 'Ini adalah deskripsi singkat untuk gambar galeri ' . ($index + 1) . ' di Kelurahan Dalung.',
                'file_path' => $filename,
            ]);
        }
    }
}
