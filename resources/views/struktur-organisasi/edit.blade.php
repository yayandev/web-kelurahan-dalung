@extends('layouts.dashboard')

@section('title', 'Edit - Struktur Organisasi')

@section('content')
    <div class="container card">
        <div class="card-header">
            <h4 class="card-title">Edit Struktur Organisasi</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('struktur-organisasi.update', $struktur->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan"
                        value="{{ $struktur->jabatan }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $struktur->nama }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                    @if ($struktur->foto)
                        <img src="{{ asset('storage/' . $struktur->foto) }}" alt="{{ $struktur->nama }}" width="100"
                            class="mt-2">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
