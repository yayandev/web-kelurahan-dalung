<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Meta SEO dari data berita --}}
    <title>{{ $berita->judul }} - Kelurahan Dalung</title>
    <meta name="title" content="{{ $berita->judul }} - Kelurahan Dalung">
    <meta name="description" content="{{ Str::limit(strip_tags($berita->isi), 160, '...') }}">
    <meta name="keywords"
        content="Kelurahan Dalung, Kecamatan Cipocok Jaya, Kota Serang, Banten, Berita Dalung, {{ $berita->judul }}">
    <meta name="author" content="Kelurahan Dalung">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $berita->judul }} - Kelurahan Dalung">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($berita->isi), 160, '...') }}">
    <meta name="twitter:image" content="{{ Storage::url($berita->gambar) }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $berita->judul }} - Kelurahan Dalung">
    <meta property="og:description" content="{{ Str::limit(strip_tags($berita->isi), 160, '...') }}">
    <meta property="og:image" content="{{ Storage::url($berita->gambar) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="Kelurahan Dalung">

    {{-- Favicon --}}
    <link rel="icon" href="logo.jpg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .nav-gradient {
            background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%);
            position: relative;
            overflow: hidden;
        }

        .nav-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .logo-glow {
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.3);
            transition: all 0.3s ease;
        }

        .logo-glow:hover {
            box-shadow: 0 0 30px rgba(16, 185, 129, 0.5);
            transform: scale(1.05);
        }

        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #10b981, #ffffff);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 8px;
        }

        .nav-link.active::after {
            width: 100%;
            background: #ffffff;
        }

        .mobile-menu-bg {
            background: linear-gradient(180deg, rgba(5, 150, 105, 0.95) 0%, rgba(4, 120, 87, 0.95) 100%);
            backdrop-filter: blur(10px);
            border-radius: 0 0 20px 20px;
        }

        .mobile-nav-link {
            transition: all 0.3s ease;
            border-radius: 12px;
        }

        .mobile-nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(8px);
        }

        .mobile-nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            border-left: 4px solid #ffffff;
        }

        .menu-toggle {
            transition: all 0.3s ease;
        }

        .menu-toggle:hover {
            transform: scale(1.1);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .floating-circle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-circle:nth-child(3) {
            width: 40px;
            height: 40px;
            top: 30%;
            right: 30%;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .slide-down {
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .brand-text {
            background: linear-gradient(45deg, #ffffff, #ecfdf5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .footer-link::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: #ffffff;
            transition: width 0.3s ease;
        }

        .footer-link:hover::before {
            width: 100%;
        }

        .contact-item {
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            transform: translateY(-2px);
        }

        #scroll-to-top {
            transition: all 0.3s ease;
        }

        #scroll-to-top:hover {
            transform: translateY(-2px);
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        /* Mengatur tinggi div peta agar terlihat */
        #mapid {
            height: 500px;
            /* Anda bisa menyesuaikan tinggi ini */
            width: 100%;
            border-radius: 0.5rem;
            /* Sesuai dengan rounded-lg di Tailwind */
        }
    </style>


</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="nav-gradient shadow-glass sticky w-full top-0 z-[999]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 relative z-10">
            <div class="flex justify-between items-center h-16">
                <!-- Enhanced Logo Section -->
                <div class="flex items-center space-x-4 group">
                    <!-- Logo with Glow Effect -->
                    <div class="relative">
                        <img src="{{ asset('logo.jpg') }}" alt="Logo Kelurahan Dalung"
                            class="h-16 w-16 rounded-full logo-glow border-2 border-white/20">
                        <div class="absolute inset-0 rounded-full bg-gradient-to-br from-white/20 to-transparent"></div>
                    </div>

                    <!-- Enhanced Brand Text -->
                    <div class="text-white">
                        <h1
                            class="font-bold text-xl sm:text-2xl brand-text group-hover:scale-105 transition-transform duration-300">
                            Kelurahan Dalung
                        </h1>
                        <p class="text-emerald-100 text-xs sm:text-sm font-medium tracking-wide">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Kecamatan Cipocok Jaya, Kota Serang
                        </p>
                    </div>
                </div>

                <!-- Enhanced Desktop Menu -->
                <div class="hidden md:flex items-center space-x-2">
                    <a href="/"
                        class="nav-link {{ Request::is('/') ? 'active' : '' }} text-white px-4 py-2 font-medium text-sm tracking-wide">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="/profil"
                        class="nav-link {{ Request::is('profil') ? 'active' : '' }} text-emerald-100 hover:text-white px-4 py-2 font-medium text-sm tracking-wide">
                        <i class="fas fa-building mr-2"></i>Profil Kelurahan
                    </a>
                    <a href="/galeries"
                        class="nav-link {{ Request::is('galeries') ? 'active' : '' }} text-emerald-100 hover:text-white px-4 py-2 font-medium text-sm tracking-wide">
                        <i class="fas fa-images mr-2"></i>Galeri
                    </a>
                    <a href="/beritas"
                        class="nav-link {{ Request::is('beritas') ? 'active' : '' }} text-emerald-100 hover:text-white px-4 py-2 font-medium text-sm tracking-wide">
                        <i class="fas fa-newspaper mr-2"></i>Berita
                    </a>
                    <a href="/pengaduan"
                        class="nav-link {{ Request::is('pengaduan') ? 'active' : '' }} text-emerald-100 hover:text-white px-4 py-2 font-medium text-sm tracking-wide">
                        <i class="fas fa-comment-dots mr-2"></i>Pengaduan
                    </a>

                </div>

                <!-- Enhanced Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button"
                        class="menu-toggle text-white hover:text-emerald-100 focus:outline-none p-2 rounded-lg">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Enhanced Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden slide-down">
                <div class="mobile-menu-bg px-4 pt-4 pb-6 space-y-2 mt-4 mx-2">
                    <a href="/"
                        class="mobile-nav-link {{ Request::is('/') ? 'active' : '' }} text-white flex items-center px-4 py-3 text-base font-medium">
                        <i class="fas fa-home mr-3 w-5"></i>Home
                        <span class="ml-auto"><i class="fas fa-chevron-right text-xs"></i></span>
                    </a>
                    <a href="/profil"
                        class="mobile-nav-link {{ Request::is('profil') ? 'active' : '' }} text-emerald-100 hover:text-white flex items-center px-4 py-3 text-base font-medium">
                        <i class="fas fa-building mr-3 w-5"></i>Profil Kelurahan
                        <span class="ml-auto"><i class="fas fa-chevron-right text-xs"></i></span>
                    </a>
                    <a href="/galeries"
                        class="mobile-nav-link {{ Request::is('galeries') ? 'active' : '' }} text-emerald-100 hover:text-white flex items-center px-4 py-3 text-base font-medium">
                        <i class="fas fa-images mr-3 w-5"></i>Galeri
                        <span class="ml-auto"><i class="fas fa-chevron-right text-xs"></i></span>
                    </a>
                    <a href="/beritas"
                        class="mobile-nav-link {{ Request::is('beritas') ? 'active' : '' }} text-emerald-100 hover:text-white flex items-center px-4 py-3 text-base font-medium">
                        <i class="fas fa-newspaper mr-3 w-5"></i>Berita
                        <span class="ml-auto"><i class="fas fa-chevron-right text-xs"></i></span>
                    </a>
                    <a href="/pengaduan"
                        class="mobile-nav-link {{ Request::is('pengaduan') ? 'active' : '' }} text-emerald-100 hover:text-white flex items-center px-4 py-3 text-base font-medium">
                        <i class="fas fa-comment-dots mr-3 w-5"></i>Pengaduan
                        <span class="ml-auto"><i class="fas fa-chevron-right text-xs"></i></span>
                    </a>

                </div>
            </div>
        </div>
    </nav>

    <!-- Demo Content Section -->
    <div>
        <style>
            .berita-content p {
                font-size: 1.1rem !important;
                line-height: 1.7 !important;
                margin-bottom: 1.5rem !important;
            }

            .berita-content img {
                max-width: 100% !important;
                height: auto !important;
                /* Pastikan gambar responsif */
            }

            .berita-content h2,
            .berita-content h3,
            .berita-content h4 {
                margin-top: 1.5rem !important;
                margin-bottom: 1rem !important;
                font-weight: 600 !important;
            }

            .berita-content ul,
            .berita-content ol {
                margin-left: 1.5rem !important;
                margin-bottom: 1rem !important;
            }

            .berita-content a {
                color: #059669 !important;
                text-decoration: underline !important;
            }

            .berita-content a:hover {
                color: #047857 !important;
            }

            .berita-content blockquote {
                border-left: 4px solid #059669 !important;
                padding-left: 1rem !important;
                color: #555 !important;
                margin: 1.5rem 0 !important;
                font-style: italic !important;
                background-color: #f9f9f9 !important;
                border-radius: 0.375rem !important;
            }

            .berita-content h1 {
                font-size: 2.5rem !important;
                margin-bottom: 1rem !important;
            }

            .berita-content pre {
                background-color: #f3f4f6 !important;
                padding: 1rem !important;
                border-radius: 0.375rem !important;
                overflow-x: auto !important;
                font-family: 'Courier New', Courier, monospace !important;
                margin-bottom: 1.5rem !important;
            }
        </style>
        <section class="max-w-4xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <!-- Back to News List Button -->
            <div class="mb-8">
                <a href="{{ url('/beritas') }}"
                    class="inline-flex items-center text-custom-light-gray-text hover:text-custom-red transition-colors duration-200">
                    <i class="fa-solid fa-arrow-left mr-2"></i>
                    <span>Kembali ke Berita Lainnya</span>
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-xl p-6 sm:p-8 lg:p-10">
                <!-- News Article Title -->
                <h1 class="text-custom-dark-text text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight mb-4">
                    {{ $berita->judul }}
                </h1>

                <!-- Meta Information -->
                <div class="flex flex-wrap items-center text-custom-light-gray-text text-sm mb-4 space-x-4">
                    <div class="flex items-center">
                        <i class="fa-solid fa-user mr-2"></i>
                        <span>Administrator</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-calendar-alt mr-2"></i>
                        <span>{{ $berita->created_at->format('d F Y') }}</span>
                    </div>
                    {{-- Bagian Dilihat bisa diaktifkan jika ada counter views --}}
                    {{-- <div class="flex items-center">
                    <i class="fa-solid fa-eye mr-2"></i>
                    <span>Dilihat {{ $berita->views ?? 0 }} kali</span>
                </div> --}}
                </div>

                <!-- Share Buttons -->
                <div class="flex items-center mb-8 space-x-3 text-custom-dark-text text-lg">
                    <span class="font-semibold text-base mr-1">Bagikan:</span>
                    @php
                        $shareUrl = url()->current(); // URL halaman detail berita saat ini
                        $shareTitle = $berita->judul; // Judul berita
                        $whatsappText = urlencode($shareTitle . ' - ' . $shareUrl);
                        $facebookShareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($shareUrl);
                        $twitterShareUrl =
                            'https://twitter.com/intent/tweet?url=' .
                            urlencode($shareUrl) .
                            '&text=' .
                            urlencode($shareTitle);
                        $whatsappShareUrl = 'https://api.whatsapp.com/send?text=' . $whatsappText;
                    @endphp
                    <a href="{{ $facebookShareUrl }}" target="_blank" rel="noopener noreferrer"
                        class="text-blue-600 hover:text-blue-800 transition-colors duration-200 text-2xl"
                        aria-label="Bagikan ke Facebook">
                        <i class="fa-brands fa-facebook-square"></i>
                    </a>
                    <a href="{{ $twitterShareUrl }}" target="_blank" rel="noopener noreferrer"
                        class="text-blue-400 hover:text-blue-600 transition-colors duration-200 text-2xl"
                        aria-label="Bagikan ke Twitter">
                        <i class="fa-brands fa-twitter-square"></i>
                    </a>
                    <a href="{{ $whatsappShareUrl }}" target="_blank" rel="noopener noreferrer"
                        class="text-green-500 hover:text-green-700 transition-colors duration-200 text-2xl"
                        aria-label="Bagikan ke WhatsApp">
                        <i class="fa-brands fa-whatsapp-square"></i>
                    </a>
                </div>

                <!-- Main News Image -->
                <div class="mb-8 rounded-lg overflow-hidden">
                    <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}"
                        class="w-full h-auto object-cover">
                </div>

                <!-- News Content -->
                <div class="prose max-w-none text-custom-dark-text leading-relaxed berita-content">
                    {!! $berita->isi !!}
                </div>
            </div>
        </section>
    </div>

    <!-- Enhanced Footer -->
    <footer class="nav-gradient relative overflow-hidden mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

                <!-- Pemerintah Kelurahan Section -->
                <div class="lg:col-span-2">
                    <div class="flex items-start space-x-4 mb-6">
                        <!-- Logo with Glow Effect -->
                        <div class="relative">
                            <img src="{{ asset('logo.jpg') }}" alt="Logo Kelurahan Dalung"
                                class="h-20 w-20 rounded-full logo-glow border-2 border-white/20">
                            <div class="absolute inset-0 rounded-full bg-gradient-to-br from-white/20 to-transparent">
                            </div>
                        </div>
                    </div>

                    <h3 class="text-white text-xl font-bold mb-4">Pemerintah Kelurahan Dalung</h3>
                    <div class="text-emerald-100 space-y-2">
                        <p class="flex items-start">
                            <i class="fas fa-map-marker-alt mr-3 mt-1 text-emerald-300"></i>
                            <span>Kelurahan Dalung Kode Pos 42127<br>
                                Kelurahan Dalung, Kecamatan Cipocok Jaya, Kota Serang,<br>
                                Provinsi Banten</span>
                        </p>
                    </div>
                </div>

                <!-- Hubungi Kami Section -->
                <div>
                    <h3 class="text-white text-lg font-bold mb-6">Hubungi Kami</h3>
                    <div class="space-y-4">
                        <a href="tel:{{ $profil->nomor_telepon }}"
                            class="flex items-center text-emerald-100 hover:text-white transition-colors duration-300 group">
                            <div
                                class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center mr-3 group-hover:bg-white/20 transition-colors duration-300">
                                <i class="fas fa-phone text-emerald-300"></i>
                            </div>
                            <span class="font-medium">{{ $profil->nomor_telepon }}</span>
                        </a>

                        <a href="mailto:kantorkelurahandalung@gmail.com"
                            class="flex items-center text-emerald-100 hover:text-white transition-colors duration-300 group">
                            <div
                                class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center mr-3 group-hover:bg-white/20 transition-colors duration-300">
                                <i class="fas fa-envelope text-emerald-300"></i>
                            </div>
                            <span class="font-medium break-all">{{ $profil->email_kelurahan }}</span>
                        </a>
                    </div>

                    <!-- Social Media Icons -->
                    <div class="mt-6">
                        <h4 class="text-white text-sm font-semibold mb-3">Ikuti Kami</h4>
                        <div class="flex space-x-3">
                            <a href="{{ $profil->instagram }}" target="_blank" rel="noopener noreferrer"
                                class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                                <i class="fab fa-instagram text-white text-lg"></i>
                            </a>
                            <a href="{{ $profil->facebook }}" target="_blank" rel="noopener noreferrer"
                                class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                                <i class="fab fa-facebook text-white text-lg"></i>
                            </a>
                            <a href="{{ $profil->tiktok }}" target="_blank" rel="noopener noreferrer"
                                class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                                <i class="fab fa-tiktok text-white text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Nomor Telepon Penting & Jelajahi Section -->
                <div>
                    <!-- Nomor Telepon Penting -->
                    <div class="mb-8">
                        <h3 class="text-white text-lg font-bold mb-4">Nomor Telepon Penting</h3>
                        <div class="space-y-3">
                            <a href="#"
                                class="footer-link block text-emerald-100 hover:text-white transition-colors duration-300 font-medium">
                                <i class="fas fa-shield-alt mr-2 text-emerald-300"></i>
                                Keamanan & Ketertiban
                            </a>
                            <a href="https://dinkes.serangkota.go.id/"
                                class="footer-link block text-emerald-100 hover:text-white transition-colors duration-300 font-medium">
                                <i class="fas fa-ambulance mr-2 text-emerald-300"></i>
                                Layanan Kesehatan
                            </a>
                            <a href="https://damkarkotaserang.com/"
                                class="footer-link block text-emerald-100 hover:text-white transition-colors duration-300 font-medium">
                                <i class="fas fa-fire-extinguisher mr-2 text-emerald-300"></i>
                                Pemadam Kebakaran
                            </a>
                        </div>
                    </div>

                    <!-- Jelajahi -->
                    <div>
                        <h3 class="text-white text-lg font-bold mb-4">Jelajahi</h3>
                        <div class="space-y-3">
                            <a href="https://kemendesa.go.id/"
                                class="footer-link block text-emerald-100 hover:text-white transition-colors duration-300 font-medium">
                                <i class="fas fa-external-link-alt mr-2 text-emerald-300"></i>
                                Website Kemendesa
                            </a>
                            <a href="https://pelita.kemendagri.go.id/"
                                class="footer-link block text-emerald-100 hover:text-white transition-colors duration-300 font-medium">
                                <i class="fas fa-external-link-alt mr-2 text-emerald-300"></i>
                                Website Kemendagri
                            </a>
                            <a href="https://cekdptonline.kpu.go.id/"
                                class="footer-link block text-emerald-100 hover:text-white transition-colors duration-300 font-medium">
                                <i class="fas fa-search mr-2 text-emerald-300"></i>
                                Cek DPT Online
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-emerald-400/30 my-8"></div>

            <!-- Bottom Footer -->
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-emerald-100 text-sm mb-4 md:mb-0">
                    <p class="flex items-center">
                        <i class="fas fa-copyright mr-2 text-emerald-300"></i>
                        2025 Kelurahan Dalung. Hak Cipta Dilindungi Undang-Undang.
                    </p>
                    <p class="text-xs text-emerald-200 mt-1">
                        Dikembangkan dengan <i class="fas fa-heart text-red-400 mx-1"></i> untuk melayani masyarakat
                    </p>
                </div>

                <div
                    class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-4 text-emerald-100 text-sm">
                    <a href="#" class="footer-link hover:text-white transition-colors duration-300">Kebijakan
                        Privasi</a>
                    <span class="hidden md:block text-emerald-400">|</span>
                    <a href="#" class="footer-link hover:text-white transition-colors duration-300">Syarat &
                        Ketentuan</a>
                    <span class="hidden md:block text-emerald-400">|</span>
                    <a href="#" class="footer-link hover:text-white transition-colors duration-300">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (dipindahkan ke luar footer) -->
    <button id="scroll-to-top"
        class="fixed bottom-6 right-6 w-12 h-12 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 opacity-0 invisible">
        <i class="fas fa-chevron-up"></i>
    </button>


    <script>
        // Enhanced Mobile menu toggle with smooth animations
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = mobileMenuButton.querySelector('i');

        mobileMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            const isHidden = mobileMenu.classList.contains('hidden');

            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('slide-down');
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-times');
                menuIcon.style.transform = 'rotate(180deg)';
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('slide-down');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
                menuIcon.style.transform = 'rotate(0deg)';
            }
        });

        // Enhanced click outside to close
        document.addEventListener('click', (e) => {
            if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('slide-down');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
                menuIcon.style.transform = 'rotate(0deg)';
            }
        });

        // Enhanced resize handler
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('slide-down');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
                menuIcon.style.transform = 'rotate(0deg)';
            }
        });

        // Add scroll effect to navbar
        let lastScrollTop = 0;
        const navbar = document.querySelector('nav');
        const scrollToTopBtn = document.getElementById('scroll-to-top');

        window.addEventListener('scroll', () => {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // if (scrollTop > lastScrollTop && scrollTop > 100) {
            //     // Scrolling down
            //     navbar.style.transform = 'translateY(-100%)';
            // } else {
            //     // Scrolling up
            //     navbar.style.transform = 'translateY(0)';
            // }

            // Show/hide scroll to top button
            if (scrollTop > 300) {
                scrollToTopBtn.classList.remove('opacity-0', 'invisible');
                scrollToTopBtn.classList.add('opacity-100', 'visible');
            } else {
                scrollToTopBtn.classList.add('opacity-0', 'invisible');
                scrollToTopBtn.classList.remove('opacity-100', 'visible');
            }

            lastScrollTop = scrollTop;
        });

        // Scroll to top functionality
        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>
