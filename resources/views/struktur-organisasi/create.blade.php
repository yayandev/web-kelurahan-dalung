@extends('layouts.dashboard')

@section('title', 'Tambah - Struktur Organisasi')

@section('content')
    <div class="container card">
        <div class="card-header">
            <h4 class="card-title">Tambah Struktur Organisasi</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('struktur-organisasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
