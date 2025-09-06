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
        Schema::create('sambutan_lurah', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('judul_sambutan')->nullable(); // Judul sambutan
            $table->text('isi_sambutan')->nullable(); // Isi teks sambutan (teks panjang)
            $table->string('nama_lurah')->nullable(); // Nama Lurah
            $table->string('jabatan_lurah')->nullable(); // Jabatan Lurah (misal: Kepala Kelurahan Dalung)
            $table->string('foto_lurah')->nullable(); // Path atau nama file foto Lurah
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sambutan_lurah');
    }
};
