@extends('layouts.app')

@section('content')
    <style>
        /* Styling for the icon container */
        .icon-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            /* Adjust margin as needed */
        }

        /* Custom size for Font Awesome icons */
        .icon-container .fa-solid {
            color: #059669;
            /* Custom dark green */
            font-size: 5rem;
            /* Adjust icon size as needed */
        }
    </style>
    <!-- Hero Section -->
    <section class="hero-bg relative h-screen flex items-center justify-center bg-[url('/kantor.jpeg')] bg-cover bg-center">

        <!-- Overlay for better text readability -->
        {{-- Adjusted gradient for richer feel and better contrast --}}
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-900/50 via-emerald-800/30 to-emerald-900/70">
        </div>

        <!-- Main Content -->
        <div class="relative z-10 text-center text-white max-w-4xl px-6 fade-in">

            <!-- Main Title -->
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight"> {{-- Increased font-weight for impact --}}
                Selamat Datang di Website
                <span class="block text-emerald-100 mt-2">Kelurahan Dalung</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl mb-10 opacity-90 leading-relaxed max-w-3xl mx-auto">
                Melayani masyarakat dengan dedikasi, membangun daerah yang maju dan sejahtera bersama-sama
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="/pengaduan"
                    class="bg-white text-emerald-700 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-emerald-50 transition-colors duration-300 shadow-lg hover:shadow-xl w-full sm:w-auto text-center">
                    Layanan Pengaduan
                </a>
                <a href="/profil"
                    class="bg-transparent text-white border-2 border-white/80 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-emerald-700 transition-all duration-300 backdrop-blur-sm w-full sm:w-auto text-center">
                    Profil Kelurahan
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white/60">
            <div class="w-6 h-10 border-2 border-white/40 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-bounce"></div>
            </div>
        </div>

    </section>

    <section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-12 items-center lg:items-start">
            <!-- Left Section: Text Content -->
            <div class="w-full lg:w-1/2 text-center lg:text-left">
                <h2 class="text-[#059669] text-4xl sm:text-5xl font-extrabold leading-tight mb-4 tracking-tight">
                    JELAJAHI KELURAHAN
                </h2>
                <p class="text-custom-gray-text text-lg sm:text-xl leading-relaxed max-w-lg lg:max-w-none mx-auto lg:mx-0">
                    Melalui website ini Anda dapat menjelajahi segala hal yang terkait dengan
                    kelurahan. Aspek pemerintahan, penduduk, demografi, potensi kelurahan, dan juga
                    berita tentang kelurahan.
                </p>
            </div>

            <!-- Right Section: Cards Grid -->
            <div class="w-full lg:w-1/2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Card 1: PROFIL DESA -->
                <div
                    class="bg-white rounded-lg shadow-md p-6 text-center transition-transform hover:scale-105 duration-300">
                    <div class="icon-container">
                        <i class="fa-solid fa-university"></i> <!-- Ikon universitas/bangunan pemerintah -->
                    </div>
                    <p class="text-gray-700 text-lg font-semibold uppercase tracking-wide">PROFIL DESA</p>
                </div>

                <!-- Card 2: INFOGRAFIS -->
                <div
                    class="bg-white rounded-lg shadow-md p-6 text-center transition-transform hover:scale-105 duration-300">
                    <div class="icon-container">
                        <i class="fa-solid fa-chart-line"></i> <!-- Ikon grafik garis naik -->
                    </div>
                    <p class="text-gray-700 text-lg font-semibold uppercase tracking-wide">INFOGRAFIS</p>
                </div>

                <!-- Card 3: BERITA -->
                <div
                    class="bg-white rounded-lg shadow-md p-6 text-center transition-transform hover:scale-105 duration-300">
                    <div class="icon-container">
                        <i class="fa-solid fa-newspaper"></i> <!-- Ikon koran -->
                    </div>
                    <p class="text-gray-700 text-lg font-semibold uppercase tracking-wide">BERITA</p>
                </div>

                <!-- Card 4: PENGADUAN -->
                <div
                    class="bg-white rounded-lg shadow-md p-6 text-center transition-transform hover:scale-105 duration-300">
                    <div class="icon-container">
                        <i class="fa-solid fa-comment-dots"></i> <!-- Ikon komentar dengan titik -->
                    </div>
                    <p class="text-gray-700 text-lg font-semibold uppercase tracking-wide">PENGADUAN</p>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center lg:items-start gap-12">
            <!-- Left Section: Image of Head of Village -->
            <div
                class="flex-shrink-0 w-64 h-64 lg:w-80 lg:h-80 rounded-full overflow-hidden bg-green-500 flex items-center justify-center shadow-lg">
                <img src="{{ Storage::url($sambutan_lurah->foto_lurah) }}" alt="Hendrikus Amin - Lurah DALUNG"
                    class="w-full h-full object-cover scale-100">
            </div>

            <!-- Right Section: Welcome Message -->
            <div class="flex-grow text-center lg:text-left space-y-3">
                <h3 class="text-[#059669] text-4xl sm:text-5xl font-extrabold leading-tight mb-4">
                    SAMBUTAN LURAH DALUNG
                </h3>
                <p class="text-[#333333] text-xl sm:text-2xl font-bold mb-1">
                    {{ $sambutan_lurah->nama_lurah }}
                </p>
                <p class="text-gray-600 text-base uppercase font-bold">
                    Lurah
                </p>

                <div class="relative max-h-96 overflow-y-auto">
                    <p class="text-[#333333] text-base text-justify sm:text-lg uppercase font-semibold">
                        {{ $sambutan_lurah->isi_sambutan }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <!-- Title and Description -->
        <div class="mb-10 lg:mb-12">
            <h2 class="text-[#059669] text-5xl sm:text-6xl font-extrabold leading-tight mb-4 tracking-tight">
                ADMINISTRASI PENDUDUKAN
            </h2>
            <p class="text-[#333333] text-lg sm:text-xl leading-relaxed max-w-2xl">
                Sistem digital yang berfungsi mempermudah pengelolaan data dan informasi terkait dengan kependudukan dan
                pendayagunaannya untuk pelayanan publik yang efektif dan efisien
            </p>
        </div>

        <!-- Data Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 md:gap-y-6 md:gap-x-8">
            <!-- Card 1: Penduduk Total -->
            <div class="flex items-stretch bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-[#059669] text-white p-4 flex items-center justify-center w-2/5 sm:w-1/3">
                    <p class="text-3xl sm:text-4xl font-extrabold">{{ $profil->jumlah_penduduk }}</p>
                </div>
                <div class="flex-grow p-4 flex items-center justify-center">
                    <p class="text-[#333333] text-xl sm:text-2xl font-bold">Penduduk</p>
                </div>
            </div>

            <!-- Card 2: Laki-Laki -->
            <div class="flex items-stretch bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-[#059669] text-white p-4 flex items-center justify-center w-2/5 sm:w-1/3">
                    <p class="text-3xl sm:text-4xl font-extrabold">{{ $profil->jumlah_laki_laki }}</p>
                </div>
                <div class="flex-grow p-4 flex items-center justify-center">
                    <p class="text-[#333333] text-xl sm:text-2xl font-bold">Laki-Laki</p>
                </div>
            </div>

            <!-- Card 3: Kepala Keluarga -->
            <div class="flex items-stretch bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-[#059669] text-white p-4 flex items-center justify-center w-2/5 sm:w-1/3">
                    <p class="text-3xl sm:text-4xl font-extrabold">{{ $profil->jumlah_kepala_keluarga ?? 'N/A' }}</p>
                </div>
                <div class="flex-grow p-4 flex items-center justify-center">
                    <p class="text-[#333333] text-xl sm:text-2xl font-bold">Kepala Keluarga</p>
                </div>
            </div>

            <!-- Card 4: Perempuan -->
            <div class="flex items-stretch bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-[#059669] text-white p-4 flex items-center justify-center w-2/5 sm:w-1/3">
                    <p class="text-3xl sm:text-4xl font-extrabold">{{ $profil->jumlah_perempuan ?? 'N/A' }}</p>
                </div>
                <div class="flex-grow p-4 flex items-center justify-center">
                    <p class="text-[#333333] text-xl sm:text-2xl font-bold">Perempuan</p>
                </div>
            </div>

            <!-- Card 5: Penduduk Sementara -->
            <div class="flex items-stretch bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-[#059669] text-white p-4 flex items-center justify-center w-2/5 sm:w-1/3">
                    <p class="text-3xl sm:text-4xl font-extrabold">{{ $profil->jumlah_penduduk_sementara ?? 'N/A' }}</p>
                </div>
                <div class="flex-grow p-4 flex items-center justify-center">
                    <p class="text-[#333333] text-xl sm:text-2xl font-bold">Penduduk Sementara</p>
                </div>
            </div>

            <!-- Card 6: Mutasi Penduduk -->
            <div class="flex items-stretch bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-[#059669] text-white p-4 flex items-center justify-center w-2/5 sm:w-1/3">
                    <p class="text-3xl sm:text-4xl font-extrabold">{{ $profil->jumlah_mutasi_penduduk ?? 'N/A' }}</p>
                </div>
                <div class="flex-grow p-4 flex items-center justify-center">
                    <p class="text-[#333333] text-xl sm:text-2xl font-bold">Mutasi Penduduk</p>
                </div>
            </div>
        </div>
    </section>


    <section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <!-- Title and Subtitle -->
        <div class="mb-10 lg:mb-12">
            <h2 class="text-[#059669] text-5xl sm:text-6xl font-extrabold leading-tight mb-2 tracking-tight">
                SOTK
            </h2>
            <p class="text-[#333333] text-xl sm:text-2xl leading-relaxed">
                Struktur Organisasi dan Tata Kerja Kelurahan Dalung
            </p>
        </div>

        <!-- Personnel Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">

            @foreach ($sotk as $item)
                <div class="bg-[#059669] rounded-lg shadow-lg overflow-hidden flex flex-col">
                    <div class="h-60 overflow-hidden bg-[#059669] flex items-center justify-center">
                        <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="bg-custom-red text-white p-4 text-center flex-grow flex flex-col justify-center">
                        <p class="font-bold text-xl uppercase mb-1">{{ $item->nama }}</p>
                        <p class="text-sm">{{ $item->jabatan }}</p>
                    </div>
                </div>
            @endforeach

            @if ($sotk->isEmpty())
                <p class="text-gray-500">Data Struktur Organisasi belum tersedia.</p>
            @endif
        </div>

        @if ($sotk->hasPages())
            <!-- "Lihat Struktur Lebih Lengkap" Button -->
            <div class="flex justify-end mt-8">
                <a href="/struktur"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-[#333333] bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-red">
                    <i class="fa-solid fa-list-ul mr-2"></i>
                    LIHAT STRUKTUR LEBIH LENGKAP
                </a>
            </div>
        @endif
    </section>

    <section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <!-- Title and Description -->
        <div class="mb-10 lg:mb-12">
            <h2 class="text-[#059669] text-5xl sm:text-6xl font-extrabold leading-tight mb-4 tracking-tight">
                BERITA KELURAHAN
            </h2>
            <p class="text-[#333333]text-lg sm:text-xl leading-relaxed">
                Menyajikan informasi terbaru tentang peristiwa, berita terkini, dan artikel-artikel jurnalistik dari
                Kelurahan
                Dalung
            </p>
        </div>

        <!-- News Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach ($beritas as $berita)
                <a href="/beritas/{{ $berita->id }}" class="bg-white rounded-lg shadow-lg overflow-hidden relative">
                    <img src="{{ Storage::url($berita->gambar) }}" alt="Jumat Bersih di Desa Dalung"
                        class="w-full h-56 object-cover">
                    <div class="p-6 pb-20"> <!-- Tambah padding-bottom agar tidak menimpa tanggal -->
                        <h3 class="font-bold text-xl text-[#333333]mb-2">
                            {{ $berita->judul }}
                        </h3>
                    </div>
                    <!-- Card Footer with Admin, Views, and Date -->
                    <div
                        class="absolute bottom-0 left-0 right-0 p-4 bg-white border-t border-gray-100 flex items-center justify-between">
                        <div class="flex items-center text-custom-light-gray-text text-sm">
                            <i class="fa-solid fa-user mr-2"></i>
                            <span>Administrator</span>
                        </div>
                        <div class="bg-[#059669] text-white text-sm font-semibold py-2 px-3 rounded-md">
                            {{ $berita->created_at->format('d M Y') }}
                        </div>
                    </div>
                </a>
            @endforeach

            @if ($beritas->isEmpty())
                <p class="text-gray-500">Tidak ada berita terbaru saat ini.</p>
            @endif


        </div>

        @if ($beritas->hasPages())
            <!-- "Lihat BERITA Lebih BANYAk" Button -->
            <div class="flex justify-end mt-8">
                <a href="/berita"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-[#333333] bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-red">
                    <i class="fa-solid fa-list-ul mr-2"></i>
                    LIHAT BERITA LEBIH BANYAK
                </a>
            </div>
        @endif
    </section>

    <section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <!-- Title and Description -->
        <div class="mb-10 lg:mb-12">
            <h2 class="text-[#059669] text-5xl sm:text-6xl font-extrabold leading-tight mb-4 tracking-tight">
                GALERI KELURAHAN
            </h2>
            <p class="text-[#333333] text-lg sm:text-xl leading-relaxed">
                Menampilkan kegiatan-kegiatan yang berlangsung di kelurahan
            </p>
        </div>

        <!-- Gallery Image Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($galeriItems as $galeriItem)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ Storage::url($galeriItem->file_path) }}" alt="Kegiatan Desa 1"
                        class="w-full h-auto object-cover">
                </div>
            @endforeach

            @if ($galeriItems->isEmpty())
                <p class="text-gray-500">Tidak ada gambar galeri saat ini.</p>
            @endif

        </div>

        @if ($galeriItems->hasPages())
            <!-- "Lihat GALERI Lebih BANYAk" Button -->
            <div class="flex justify-end mt-8">
                <a href="/galeri"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-[#333333] bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom-red">
                    <i class="fa-solid fa-list-ul mr-2"></i>
                    LIHAT GALERI LEBIH BANYAK
                </a>
            </div>
        @endif
    </section>
@endsection
