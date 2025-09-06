@extends('layouts.dashboard')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="text-3xl font-bold mb-4">Berita</h1>
            <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Berita</a>
        </div>

        <div class="row card-body">
            @foreach ($beritas as $berita)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm bg-light">
                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top"
                                alt="{{ $berita->judul }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <div class="d-flex gap-2">
                                <a href="{{ route('berita.edit', $berita->id) }}"
                                    class="btn btn-success text-white">Edit</a>
                                <form action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus berita?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-white">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $beritas->links() }}
        </div>
    </div>
@endsection
