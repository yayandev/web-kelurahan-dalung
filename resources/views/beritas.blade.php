@extends('layouts.app')

@section('content')
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

        {{-- pagination --}}
        <div class="mt-8">
            {{ $beritas->links('pagination::tailwind') }}
        </div>
    </section>
@endsection
