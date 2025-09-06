@extends('layouts.dashboard')

@section('content')
    <div class="row gy-4">
        <!-- Header Form Galeri -->
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">{{ isset($galeri) ? 'Edit' : 'Tambah' }} Item Galeri</h4>
                    <span class="badge bg-label-{{ isset($galeri) ? 'info' : 'primary' }} rounded-pill">Manajemen
                        Konten</span>
                </div>
                <p class="text-muted">Isi formulir di bawah ini untuk {{ isset($galeri) ? 'memperbarui' : 'menambahkan' }}
                    item galeri.</p>
            </div>
        </div>
        <!--/ Header Form Galeri -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0">{{ isset($galeri) ? 'Form Edit' : 'Form Tambah' }} Item Galeri</h5>
                </div>
                <div class="card-body">
                    <form action="{{ isset($galeri) ? route('galeri.update', $galeri->id) : route('galeri.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($galeri))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="Masukkan judul item galeri"
                                value="{{ old('title', $galeri->title ?? '') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi (Opsional)</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="3" placeholder="Deskripsi singkat tentang item galeri">{{ old('description', $galeri->description ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Gambar</label>
                            <input class="form-control @error('file') is-invalid @enderror" type="file" id="file"
                                name="file" accept="image/*">
                            <small class="text-muted mt-1 d-block">Unggah file gambar (JPG, PNG, GIF, maksimal 5MB)</small>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if (isset($galeri) && $galeri->file_path)
                                <div class="mt-3">
                                    <p class="mb-1">Gambar saat ini:</p>
                                    <img src="{{ Storage::url($galeri->file_path) }}" alt="{{ $galeri->title }}"
                                        class="img-thumbnail" style="max-width: 200px; height: auto; object-fit: cover;">
                                </div>
                            @endif
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="mdi mdi-content-save me-1"></i> {{ isset($galeri) ? 'Perbarui' : 'Simpan' }}
                            </button>
                            <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary">
                                <i class="mdi mdi-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
