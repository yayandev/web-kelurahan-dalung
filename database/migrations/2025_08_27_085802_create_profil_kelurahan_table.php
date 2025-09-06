<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profil_kelurahan', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->text('sejarah')->nullable(); // Deskripsi sejarah kelurahan, bisa panjang
            $table->string('luas_wilayah')->nullable(); // Luas wilayah, contoh: "120 Ha"
            $table->string('batas_utara')->nullable(); // Batas wilayah utara
            $table->string('batas_selatan')->nullable(); // Batas wilayah selatan
            $table->string('batas_timur')->nullable(); // Batas wilayah timur
            $table->string('batas_barat')->nullable(); // Batas wilayah barat
            $table->string('jumlah_penduduk')->nullable(); // Jumlah penduduk, contoh: "25000 Jiwa"
            $table->string('jumlah_laki_laki')->nullable(); // Jumlah penduduk laki-laki
            $table->string('jumlah_perempuan')->nullable(); // Jumlah penduduk perempuan
            $table->string('jumlah_kk')->nullable(); // Jumlah Kepala Keluarga, contoh: "5000 KK"
            $table->string('jumlah_rtrw')->nullable(); // Jumlah RT/RW, contoh: "40 RT / 10 RW"
            $table->text('alamat_kantor')->nullable(); // Alamat kantor kelurahan, bisa panjang
            $table->string('nomor_telepon')->nullable(); // Nomor telepon kantor
            $table->string('email_kelurahan')->nullable(); // Email kelurahan
            $table->string('jam_operasional')->nullable(); // Jam operasional
            $table->string('instagram')->nullable(); // Link Instagram
            $table->string('facebook')->nullable(); // Link Facebook
            $table->string('tiktok')->nullable(); // Link TikTok
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_kelurahan');
    }
};
