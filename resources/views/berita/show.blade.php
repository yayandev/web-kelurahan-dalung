@extends('layouts.app')

@section('content')
    <style>
        .berita-content p {
            font-size: 1.1rem !important;
            line-height: 1.7 !important;
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
@endsection
