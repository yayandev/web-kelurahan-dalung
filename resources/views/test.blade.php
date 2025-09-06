@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero-bg relative h-screen flex items-center justify-center">

        <!-- Overlay for better text readability -->
        {{-- Adjusted gradient for richer feel and better contrast --}}
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-900/50 via-emerald-800/30 to-emerald-900/70">
        </div>

        <!-- Main Content -->
        <div class="relative z-10 text-center text-white max-w-4xl px-6 fade-in">

            <!-- Badge -->
            <div
                class="inline-flex items-center bg-white/10 backdrop-blur-sm px-6 py-2 rounded-full text-sm font-medium mb-8 border border-white/20">
                <span class="w-2 h-2 bg-emerald-300 rounded-full mr-3"></span>
                Pemerintahan Kelurahan Dalung
            </div>

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
                <a href="#pengaduan"
                    class="bg-white text-emerald-700 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-emerald-50 transition-colors duration-300 shadow-lg hover:shadow-xl w-full sm:w-auto text-center">
                    Layanan Pengaduan
                </a>
                <a href="#profil"
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

    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

    {{-- Main content area for semantic structure --}}
    <main>
        <!-- Profil Kelurahan Section -->
        {{-- Changed to emerald shades for consistency --}}
        <section id="profil" class="py-16 bg-gradient-to-br from-emerald-50 to-white">
            <div class="container mx-auto px-4">
                <!-- Hero Header untuk Profil Kelurahan -->
                <div class="text-center mb-16 p-8 bg-white rounded-xl shadow-2xl animate-fade-in-up">
                    {{-- Changed to emerald-900 for stronger heading --}}
                    <h2 class="text-4xl md:text-5xl font-extrabold text-emerald-900 mb-4 tracking-tight">Profil Kelurahan
                        Dalung
                    </h2>
                    <p class="text-lg text-gray-700 max-w-2xl mx-auto">Informasi lengkap mengenai Kelurahan Dalung, mulai
                        dari
                        sejarah, visi misi, data demografi, hingga kontak resmi.</p>
                    {{-- Changed to emerald-600 --}}
                    <div class="w-28 h-1.5 bg-emerald-600 mx-auto mt-6 rounded-full"></div>
                </div>

                <!-- Sambutan Lurah -->
                <div
                    class="mb-20 bg-white rounded-xl shadow-2xl overflow-hidden transform hover:scale-102 transition duration-300">
                    {{-- Changed to emerald-700 --}}
                    <div class="relative bg-emerald-700 text-white p-8 text-center">
                        <h3 class="text-3xl md:text-4xl font-bold mb-2">Sambutan Lurah</h3>
                        <p class="text-lg opacity-90">Kata pengantar dari pimpinan Kelurahan Dalung</p>
                        <div class="absolute inset-0 bg-pattern-light opacity-10"></div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8 items-center p-8">
                        <div class="md:col-span-1 text-center">
                            <div
                                class="relative inline-block p-2 bg-emerald-100 rounded-full shadow-lg border border-emerald-300">
                                <img src="{{ $sambutan_lurah->foto_lurah ? Storage::url($sambutan_lurah->foto_lurah) : '/logo.png' }}"
                                    alt="Foto Lurah"
                                    class="rounded-full shadow-xl w-56 h-56 object-cover mx-auto border-4 border-white">
                                {{-- Changed to emerald-600 --}}
                                <div
                                    class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 bg-emerald-600 text-white px-5 py-2 rounded-full shadow-xl text-sm font-semibold tracking-wide">
                                    {{ $sambutan_lurah->jabatan_lurah }}
                                </div>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <div class="bg-gray-50 p-7 rounded-lg border-l-4 border-emerald-500 shadow-inner text-gray-800">
                                <p class="text-lg leading-relaxed mb-6 italic">"{{ $sambutan_lurah->isi_sambutan }}"</p>
                                <div class="text-right mt-4">
                                    <p class="text-gray-700 font-semibold text-lg">Hormat kami,</p>
                                    {{-- Changed to emerald-700 --}}
                                    <p class="text-emerald-700 font-bold text-2xl mt-2">{{ $sambutan_lurah->nama_lurah }}
                                    </p>
                                    <p class="text-gray-600">{{ $sambutan_lurah->jabatan_lurah }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visi Misi -->
                <div class="grid lg:grid-cols-2 gap-16 items-start mb-20">
                    <div class="relative group order-2 lg:order-1 bg-white rounded-xl shadow-2xl p-6">
                        <img src="/kantor.jpeg" alt="Kantor Kelurahan"
                            class="rounded-lg shadow-xl w-full transform group-hover:scale-105 transition duration-500">
                        {{-- Changed to emerald-600 --}}
                        <div
                            class="absolute inset-0 bg-emerald-600/30 rounded-lg opacity-0 group-hover:opacity-100 transition duration-500 flex items-center justify-center">
                            <span
                                class="text-white text-xl font-bold opacity-0 group-hover:opacity-100 transition duration-500">Kantor
                                Kelurahan Dalung</span>
                        </div>
                    </div>
                    <div class="order-1 lg:order-2 p-6 bg-white rounded-xl shadow-2xl">
                        <div class="mb-10">
                            {{-- Changed to emerald-900 for heading, emerald-600 for icon bg --}}
                            <h3 class="text-3xl font-extrabold text-emerald-900 mb-4 flex items-center">
                                <span
                                    class="w-10 h-10 bg-emerald-600 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4 shadow-md">V</span>
                                Visi
                            </h3>
                            {{-- Changed to emerald-400 for border --}}
                            <p class="text-gray-700 text-lg leading-relaxed border-l-4 border-emerald-400 pl-4 italic">
                                "{{ $visi_misi->visi }}"
                            </p>
                        </div>

                        <div>
                            {{-- Changed to emerald-900 for heading, emerald-600 for icon bg --}}
                            <h3 class="text-3xl font-extrabold text-emerald-900 mb-4 flex items-center">
                                <span
                                    class="w-10 h-10 bg-emerald-600 rounded-full flex items-center justify-center text-white text-xl font-bold mr-4 shadow-md">M</span>
                                Misi
                            </h3>
                            <ul class="text-gray-700 space-y-4">
                                @forelse ($visi_misi->misi as $misi)
                                    <li class="flex items-start text-lg">
                                        {{-- Changed to emerald-500 for icon --}}
                                        <i
                                            class="mdi mdi-check-circle-outline mdi-24px text-emerald-500 mr-3 mt-1 flex-shrink-0"></i>
                                        <span>{{ $misi }}</span>
                                    </li>
                                @empty
                                    <li class="text-lg italic text-gray-500">Misi belum tersedia.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Informasi Umum Kelurahan -->
                <div class="mb-20 rounded-xl shadow-2xl p-10 ">
                    <div class="text-center mb-10">
                        {{-- Changed to emerald-600 --}}
                        <h3 class="text-3xl md:text-4xl font-bold mb-4 text-emerald-600">Informasi Detil Kelurahan</h3>
                        <p class="text-lg opacity-90 text-gray-600">Data penting dan kontak resmi Kelurahan Dalung</p>
                        {{-- Changed to emerald-400 --}}
                        <div class="w-20 h-1 bg-emerald-400 mx-auto mt-4 rounded-full"></div>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-10 mb-10">
                        <!-- Sejarah Kelurahan -->
                        {{-- Changed to emerald-700 background, emerald-500 border, emerald-100 text --}}
                        <div class="bg-emerald-700 p-8 rounded-lg shadow-xl border-t-4 border-emerald-500 h-full">
                            <h4 class="text-2xl font-bold mb-4 flex items-center text-emerald-100">
                                <i class="mdi mdi-book-open-outline mdi-24px mr-3"></i>
                                Sejarah Singkat
                            </h4>
                            <p class="text-emerald-100 leading-relaxed text-justify text-lg">
                                {{ $profil->sejarah }}
                            </p>
                        </div>

                        <!-- Data Demografi -->
                        {{-- Changed to emerald-700 background, emerald-500 border, emerald-100 text --}}
                        <div class="bg-emerald-700 p-8 rounded-lg shadow-xl border-t-4 border-emerald-500 h-full">
                            <h4 class="text-2xl font-bold mb-4 flex items-center text-emerald-100">
                                <i class="mdi mdi-account-group-outline mdi-24px mr-3"></i>
                                Data Demografi
                            </h4>
                            <ul class="text-emerald-100 space-y-3 text-lg">
                                <li class="flex justify-between items-center"><span class="font-semibold">Total
                                        Penduduk:</span>
                                    <span>{{ $profil->jumlah_penduduk }}</span>
                                </li>
                                <li class="flex justify-between items-center"><span class="font-semibold">Laki-laki:</span>
                                    <span>{{ $profil->jumlah_laki_laki }}</span>
                                </li>
                                <li class="flex justify-between items-center"><span class="font-semibold">Perempuan:</span>
                                    <span>{{ $profil->jumlah_perempuan }}</span>
                                </li>
                                <li class="flex justify-between items-center"><span class="font-semibold">Jumlah KK:</span>
                                    <span>{{ $profil->jumlah_kk }}</span>
                                </li>
                                <li class="flex justify-between items-center"><span class="font-semibold">Jumlah
                                        RT/RW:</span>
                                    <span>{{ $profil->jumlah_rtrw }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-10">
                        <!-- Informasi Geografis -->
                        {{-- Changed to emerald-700 background, emerald-500 border, emerald-100 text --}}
                        <div class="bg-emerald-700 p-8 rounded-lg shadow-xl border-t-4 border-emerald-500 h-full">
                            <h4 class="text-2xl font-bold mb-4 flex items-center text-emerald-100">
                                <i class="mdi mdi-map-marker-multiple-outline mdi-24px mr-3"></i>
                                Data Geografis
                            </h4>
                            <ul class="text-emerald-100 space-y-3 text-lg">
                                <li class="flex justify-between items-center"><span class="font-semibold">Luas
                                        Wilayah:</span>
                                    <span>{{ $profil->luas_wilayah }}</span>
                                </li>
                                <li class="flex justify-between items-center"><span class="font-semibold">Batas
                                        Utara:</span>
                                    <span>{{ $profil->batas_utara }}</span>
                                </li>
                                <li class="flex justify-between items-center"><span class="font-semibold">Batas
                                        Selatan:</span>
                                    <span>{{ $profil->batas_selatan }}</span>
                                </li>
                                <li class="flex justify-between items-center"><span class="font-semibold">Batas
                                        Timur:</span>
                                    <span>{{ $profil->batas_timur }}</span>
                                </li>
                                <li class="flex justify-between items-center"><span class="font-semibold">Batas
                                        Barat:</span>
                                    <span>{{ $profil->batas_barat }}</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Kontak & Media Sosial -->
                        {{-- Changed to emerald-700 background, emerald-500 border, emerald-100 text --}}
                        <div class="bg-emerald-700 p-8 rounded-lg shadow-xl border-t-4 border-emerald-500 h-full">
                            <h4 class="text-2xl font-bold mb-4 flex items-center text-emerald-100">
                                <i class="mdi mdi-phone-settings-outline mdi-24px mr-3"></i>
                                Kontak & Media Sosial
                            </h4>
                            <ul class="text-emerald-100 space-y-3 text-lg">
                                <li class="flex items-center"><i
                                        class="mdi mdi-phone-outline mdi-20px mr-3 flex-shrink-0 text-emerald-300"></i><span>{{ $profil->nomor_telepon }}</span>
                                </li>
                                <li class="flex items-center"><i
                                        class="mdi mdi-email-outline mdi-20px mr-3 flex-shrink-0 text-emerald-300"></i><span>{{ $profil->email_kelurahan }}</span>
                                </li>
                                @if ($profil->instagram)
                                    <li class="flex items-center"><i
                                            class="mdi mdi-instagram mdi-20px mr-3 flex-shrink-0 text-emerald-300"></i><a
                                            href="{{ Str::startsWith($profil->instagram, ['http://', 'https://']) ? $profil->instagram : 'https://instagram.com/' . $profil->instagram }}"
                                            target="_blank" rel="noopener noreferrer"
                                            class="text-emerald-300 hover:underline">Instagram</a></li>
                                @endif
                                @if ($profil->facebook)
                                    <li class="flex items-center"><i
                                            class="mdi mdi-facebook mdi-20px mr-3 flex-shrink-0 text-emerald-300"></i><a
                                            href="{{ Str::startsWith($profil->facebook, ['http://', 'https://']) ? $profil->facebook : 'https://facebook.com/' . $profil->facebook }}"
                                            target="_blank" rel="noopener noreferrer"
                                            class="text-emerald-300 hover:underline">Facebook</a></li>
                                @endif
                                @if ($profil->tiktok)
                                    <li class="flex items-center"><i
                                            class="mdi mdi-tiktok mdi-20px mr-3 flex-shrink-0 text-emerald-300"></i><a
                                            href="{{ Str::startsWith($profil->tiktok, ['http://', 'https://']) ? $profil->tiktok : 'https://tiktok.com/@' . $profil->tiktok }}"
                                            target="_blank" rel="noopener noreferrer"
                                            class="text-emerald-300 hover:underline">TikTok</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Lokasi Kantor Kelurahan -->
                <div class="bg-white rounded-xl shadow-2xl p-10 transform hover:scale-102 transition duration-300">
                    <div class="text-center mb-10">
                        {{-- Changed to emerald-900 for stronger heading --}}
                        <h3 class="text-3xl md:text-4xl font-bold text-emerald-900 mb-4">Lokasi Kantor Kelurahan</h3>
                        <p class="text-lg text-gray-700">Temukan lokasi kami di peta dan jam pelayanan</p>
                        {{-- Changed to emerald-600 --}}
                        <div class="w-20 h-1 bg-emerald-600 mx-auto mt-4 rounded-full"></div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-10 items-start">
                        <div>
                            {{-- Changed to emerald-700 --}}
                            <h4 class="text-2xl font-bold text-emerald-700 mb-4 flex items-center">
                                <i class="mdi mdi-home-map-marker mdi-24px mr-3"></i>
                                Detail Alamat
                            </h4>
                            <div class="space-y-4 text-gray-700 text-lg">
                                <p class="flex items-start">
                                    {{-- Changed to emerald-600 --}}
                                    <span class="font-semibold mr-3 min-w-[100px] text-emerald-600">Alamat Lengkap:</span>
                                    <span>{{ $profil->alamat_kantor }}</span>
                                </p>
                                <p class="flex items-start">
                                    {{-- Changed to emerald-600 --}}
                                    <span class="font-semibold mr-3 min-w-[100px] text-emerald-600">Telepon:</span>
                                    <span>{{ $profil->nomor_telepon }}</span>
                                </p>
                                <p class="flex items-start">
                                    {{-- Changed to emerald-600 --}}
                                    <span class="font-semibold mr-3 min-w-[100px] text-emerald-600">Email:</span>
                                    <span>{{ $profil->email_kelurahan }}</span>
                                </p>
                            </div>

                            {{-- Changed to emerald-50 background, emerald-500 border, emerald-700 heading --}}
                            <div class="mt-8 p-6 bg-emerald-50 rounded-lg border-l-4 border-emerald-500 shadow-md">
                                <h5 class="font-bold text-emerald-700 text-xl mb-2">Jam Operasional Pelayanan</h5>
                                <p class="text-gray-700 text-lg">{{ $profil->jam_operasional }}</p>
                                <p class="text-gray-600 text-sm mt-3 italic">*Informasi jam operasional dapat berubah
                                    sewaktu-waktu.</p>
                            </div>
                        </div>

                        <div>
                            {{-- Changed to emerald-200 border --}}
                            <div class="rounded-lg overflow-hidden shadow-2xl border-4 border-emerald-200">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.927338641621!2d106.14473827523793!3d-6.140463293846465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e418ab743b30d7d%3A0x9354f1242498978f!2sKantor%20Kelurahan%20Dalung!5e0!3m2!1sid!2sid!4v1756732805141!5m2!1sid!2sid"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade" class="w-full">
                                </iframe>
                            </div>
                            <p class="text-center text-base text-gray-600 mt-4">
                                {{-- Changed to emerald-500 --}}
                                <i class="mdi mdi-map-search-outline mdi-18px mr-2 text-emerald-500"></i>Klik pada peta
                                untuk
                                membuka di Google Maps
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Profil Kelurahan Section -->

        <!-- Galeri -->
        <section id="galeri-publik" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Galeri Lengkap Kelurahan Dalung</h2>
                    {{-- Changed to emerald-600 --}}
                    <div class="w-24 h-1 bg-emerald-600 mx-auto"></div>
                    <p class="text-lg text-gray-600 mt-4">Jelajahi semua momen indah dan kegiatan di Kelurahan Dalung.</p>
                </div>

                @if ($galeriItems->isEmpty())
                    <div class="text-center py-10 bg-gray-50 rounded-lg shadow-md">
                        <p class="text-xl text-gray-500">Galeri belum memiliki konten. Mohon maaf.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($galeriItems as $item)
                            <div
                                class="relative group overflow-hidden rounded-lg shadow-md hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                                <img src="{{ $item->file_path ? Storage::url($item->file_path) : asset('assets/img/logo.png') }}"
                                    alt="Kegiatan {{ $item->title }}"
                                    class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                                {{-- Changed to emerald-600 --}}
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-emerald-600/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end justify-center pb-4">
                                    <span
                                        class="text-white font-bold text-lg transform translate-y-4 group-hover:translate-y-0 transition duration-300">
                                        Kegiatan {{ $item->title }}
                                    </span>
                                </div>
                                <div
                                    class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition duration-300">
                                    <div
                                        class="w-8 h-8 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Link Paginasi --}}
                    <div class="mt-10">
                        {{ $galeriItems->links('pagination::tailwind') }} {{-- Added 'pagination::tailwind' for basic styling --}}
                    </div>
                @endif
            </div>
        </section>

        <!-- Berita -->
        <section id="berita" class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Berita Terkini</h2>
                    {{-- Changed to emerald-600 --}}
                    <div class="w-24 h-1 bg-emerald-600 mx-auto"></div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($beritas as $berita)
                        <article
                            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 group">
                            <div class="relative overflow-hidden">
                                <img src="{{ Storage::url($berita->gambar) }}" alt="Berita {{ $berita->judul }}"
                                    class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                                <div class="absolute top-4 left-4">
                                    {{-- Changed to emerald-600 --}}
                                    <span class="bg-emerald-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                        Berita
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                {{-- Changed to emerald-600 --}}
                                <div class="flex items-center text-emerald-600 text-sm mb-3">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $berita->created_at->format('d M Y') }} {{-- Formatted date --}}
                                </div>
                                <h3
                                    class="text-xl font-bold text-gray-800 mb-3 hover:text-emerald-600 transition duration-300 line-clamp-2">
                                    {{-- Menggunakan placeholder route untuk tautan berita --}}
                                    <a href="{{ route('berita.show', $berita->slug ?? '#') }}"
                                        class="block">{{ $berita->judul }}</a>
                                </h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit($berita->isi, 150) }}
                                </p>
                                {{-- Changed to emerald-600 and emerald-700 for hover --}}
                                {{-- Menggunakan placeholder route untuk tautan baca selengkapnya --}}
                                <a href="{{ route('berita.show', $berita->slug ?? '#') }}"
                                    class="inline-flex items-center text-emerald-600 font-semibold hover:text-emerald-700 transition duration-300 group">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition duration-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if ($beritas->isEmpty())
                    <div class="text-center py-10 bg-gray-50 rounded-lg shadow-md">
                        <p class="text-xl text-gray-500">Berita belum memiliki konten. Mohon maaf.</p>
                    </div>
                @endif
                @if ($beritas->hasPages())
                    <div class="text-center mt-12">
                        {{-- Changed to emerald-600 and emerald-700 for hover --}}
                        {{-- Menggunakan placeholder route untuk tautan semua berita --}}
                        <a href="{{ route('berita.index') ?? '#' }}"
                            class="bg-emerald-600 text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-emerald-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            Lihat Semua Berita
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <!-- Form Pengaduan -->
        <section id="pengaduan" class="py-16">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Form Pengaduan</h2>
                    {{-- Changed to emerald-600 --}}
                    <div class="w-24 h-1 bg-emerald-600 mx-auto mb-4"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                        Sampaikan aspirasi, keluhan, atau saran Anda untuk kemajuan kelurahan
                    </p>
                </div>

                <div class="max-w-4xl mx-auto">
                    <form action="#" method="POST" class="bg-white p-8 rounded-xl shadow-md">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div class="group">
                                {{-- Changed focus-within color to emerald-600 --}}
                                <label for="nama"
                                    class="block text-gray-700 font-semibold mb-2 group-focus-within:text-emerald-600 transition duration-300">Nama
                                    Lengkap</label>
                                {{-- Changed focus ring and border color to emerald-500 --}}
                                <input type="text" id="nama" name="nama" required
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300">
                            </div>
                            <div class="group">
                                {{-- Changed focus-within color to emerald-600 --}}
                                <label for="email"
                                    class="block text-gray-700 font-semibold mb-2 group-focus-within:text-emerald-600 transition duration-300">Email</label>
                                {{-- Changed focus ring and border color to emerald-500 --}}
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div class="group">
                                {{-- Changed focus-within color to emerald-600 --}}
                                <label for="telepon"
                                    class="block text-gray-700 font-semibold mb-2 group-focus-within:text-emerald-600 transition duration-300">No.
                                    Telepon</label>
                                {{-- Changed focus ring and border color to emerald-500 --}}
                                <input type="tel" id="telepon" name="telepon"
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300">
                            </div>
                            <div class="group">
                                {{-- Changed focus-within color to emerald-600 --}}
                                <label for="kategori"
                                    class="block text-gray-700 font-semibold mb-2 group-focus-within:text-emerald-600 transition duration-300">Kategori</label>
                                {{-- Changed focus ring and border color to emerald-500 --}}
                                <select id="kategori" name="kategori" required
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300">
                                    <option value="">Pilih Kategori</option>
                                    <option value="infrastruktur">Infrastruktur</option>
                                    <option value="kebersihan">Kebersihan</option>
                                    <option value="keamanan">Keamanan</option>
                                    <option value="pelayanan">Pelayanan</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-6 group">
                            {{-- Changed focus-within color to emerald-600 --}}
                            <label for="subjek"
                                class="block text-gray-700 font-semibold mb-2 group-focus-within:text-emerald-600 transition duration-300">Subjek</label>
                            {{-- Changed focus ring and border color to emerald-500 --}}
                            <input type="text" id="subjek" name="subjek" required
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300">
                        </div>

                        <div class="mb-8 group">
                            {{-- Changed focus-within color to emerald-600 --}}
                            <label for="pesan"
                                class="block text-gray-700 font-semibold mb-2 group-focus-within:text-emerald-600 transition duration-300">Pesan</label>
                            {{-- Changed focus ring and border color to emerald-500 --}}
                            <textarea id="pesan" name="pesan" rows="5" required
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 resize-vertical transition duration-300"
                                placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>

                        {{-- Changed button gradient to emerald shades --}}
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-emerald-600 to-emerald-700 text-white py-4 rounded-lg font-bold text-lg hover:from-emerald-700 hover:to-emerald-800 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Kirim Pengaduan
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main> {{-- End of <main> tag --}}

    <!-- Custom CSS for animations -->
    <style>
        /* Custom pattern for subtle background */
        .bg-pattern-light {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'%3E%3Cpath d='M0 60L60 0H0V60zM60 60V0h-4L60 56v4z'/%3E%3C/g%3E%3C/svg%3E");
            background-size: 30px 30px;
            /* Adjust size for subtlety */
        }

        /* Animation for the header */
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
        }

        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
            opacity: 0;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        .delay-600 {
            animation-delay: 0.6s;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Styling for Laravel's default Tailwind pagination view */
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin-top: 2.5rem;
            /* Equivalent to mt-10 */
        }

        .pagination .page-item {
            margin: 0 0.25rem;
            /* Equivalent to px-1 */
        }

        .pagination .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 2.5rem;
            /* 40px */
            height: 2.5rem;
            /* 40px */
            border-radius: 0.375rem;
            /* rounded-md */
            text-decoration: none;
            color: #4a5568;
            /* text-gray-700 */
            background-color: #f7fafc;
            /* bg-gray-100 */
            border: 1px solid #e2e8f0;
            /* border-gray-300 */
            transition: all 0.2s ease-in-out;
            font-weight: 500;
        }

        .pagination .page-link:hover {
            background-color: #edf2f7;
            /* hover:bg-gray-200 */
            color: #2d3748;
            /* hover:text-gray-800 */
        }

        .pagination .page-item.active .page-link {
            background-color: #059669;
            /* bg-emerald-600 */
            border-color: #059669;
            /* border-emerald-600 */
            color: #ffffff;
            /* text-white */
            font-weight: 700;
        }

        .pagination .page-item.disabled .page-link {
            opacity: 0.6;
            cursor: not-allowed;
            background-color: #f7fafc;
            color: #a0aec0;
            /* text-gray-500 */
        }

        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            border-radius: 0.375rem;
            /* rounded-md */
        }

        .pagination .page-item.dots .page-link {
            background-color: transparent;
            border-color: transparent;
            cursor: default;
        }
    </style>

    <!-- Enhanced JavaScript -->
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Form submission handler with better UX
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Show loading state
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;
            button.innerHTML = `
                <span class="flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Mengirim...
                </span>
            `;
            button.disabled = true;

            // Simulate form submission
            setTimeout(() => {
                // Success notification
                const notification = document.createElement('div');
                {{-- Changed bg-green-500 to bg-emerald-500 --}}
                notification.className =
                    'fixed top-4 right-4 bg-emerald-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
                notification.innerHTML = `
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Pengaduan berhasil dikirim!
                    </div>
                `;
                document.body.appendChild(notification);

                // Show notification
                setTimeout(() => {
                    notification.classList.remove('translate-x-full');
                }, 100);

                // Hide notification
                setTimeout(() => {
                    notification.classList.add('translate-x-full');
                    setTimeout(() => {
                        document.body.removeChild(notification);
                    }, 300);
                }, 3000);

                // Reset form and button
                this.reset();
                button.innerHTML = originalText;
                button.disabled = false;
            }, 1500);
        });

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    observer.unobserve(entry.target); // Stop observing once animated
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll(
            'section > .container > div.text-center > h2, ' + // Section headers
            '#profil .mb-20 > div:first-child, ' + // Sambutan Lurah header
            '#profil .grid.lg\\:grid-cols-2 > div' // Visi Misi cards
        ).forEach(el => {
            observer.observe(el);
        });

        // For news and gallery items, observe their individual cards
        document.querySelectorAll('#galeri-publik .grid > div, #berita .grid > article').forEach(el => {
            observer.observe(el);
        });
    </script>
@endsection
