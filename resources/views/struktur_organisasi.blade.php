@extends('layouts.app')

@section('content')
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


    </section>
@endsection
