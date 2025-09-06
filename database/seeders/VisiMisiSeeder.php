<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisiMisi; // Import model VisiMisi

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::updateOrCreate(
            ['id' => 1], // Kriteria untuk mencari record
            [
                'visi' => 'Mewujudkan Kelurahan Dalung yang Unggul, Inovatif, dan Berbudaya melalui Pelayanan yang Profesional dan Partisipatif.',
                'misi' => [
                    'Meningkatkan kualitas sumber daya manusia dan kesejahteraan sosial masyarakat secara merata.',
                    'Mengembangkan potensi ekonomi lokal untuk kemandirian dan daya saing.',
                    'Memperkuat nilai-nilai budaya dan kearifan lokal sebagai identitas kelurahan.',
                    'Menciptakan tata kelola pemerintahan yang bersih, transparan, dan akuntabel.',
                    'Mendorong partisipasi aktif masyarakat dalam pembangunan kelurahan.',
                ],
            ]
        );
    }
}
