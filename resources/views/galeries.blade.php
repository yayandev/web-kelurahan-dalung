@extends('layouts.app')

@section('content')
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

        {{-- pagination --}}
        <div class="mt-8">
            {{ $galeriItems->links('pagination::tailwind') }}
        </div>
    </section>
@endsection
