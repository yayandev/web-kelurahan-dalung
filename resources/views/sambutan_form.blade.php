@extends('layouts.dashboard')

@section('content')
    <div class="row gy-4">
        <!-- Header Form Sambutan Lurah -->
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Edit Sambutan Lurah</h4>
                    <span class="badge bg-label-warning rounded-pill">Pembaruan Data</span>
                </div>
                <p class="text-muted">Gunakan formulir di bawah ini untuk memperbarui teks sambutan dan foto dari Lurah.</p>
            </div>
        </div>
        <!--/ Header Form Sambutan Lurah -->

        <form action="{{ route('sambutan_form.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Data Sambutan Lurah Card (Form) -->
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title m-0">Informasi Sambutan</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="judul_sambutan" class="form-label">Judul Sambutan</label>
                            <input type="text" id="judul_sambutan" name="judul_sambutan" class="form-control"
                                placeholder="Contoh: Sambutan Kepala Kelurahan Dalung"
                                value="{{ old('judul_sambutan', $sambutan->judul_sambutan) }}" />
                            @error('judul_sambutan')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="isi_sambutan" class="form-label">Isi Sambutan</label>
                            <textarea class="form-control" id="isi_sambutan" name="isi_sambutan" rows="10"
                                placeholder="Masukkan isi sambutan Lurah...">{{ old('isi_sambutan', $sambutan->isi_sambutan) }}</textarea>
                            @error('isi_sambutan')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_lurah" class="form-label">Nama Lurah</label>
                            <input type="text" id="nama_lurah" name="nama_lurah" class="form-control"
                                placeholder="Contoh: Bpk. John Doe, S.Pd."
                                value="{{ old('nama_lurah', $sambutan->nama_lurah) }}" />
                            @error('nama_lurah')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jabatan_lurah" class="form-label">Jabatan</label>
                            <input type="text" id="jabatan_lurah" name="jabatan_lurah" class="form-control"
                                placeholder="Contoh: Kepala Kelurahan Dalung"
                                value="{{ old('jabatan_lurah', $sambutan->jabatan_lurah) }}" />
                            @error('jabatan_lurah')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-0">
                            <label for="foto_lurah" class="form-label">Foto Lurah</label>
                            <input class="form-control" type="file" id="foto_lurah" name="foto_lurah" accept="image/*">
                            <small class="text-muted mt-1 d-block">Unggah foto Lurah (JPG, PNG, maksimal 2MB)</small>
                            @error('foto_lurah')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                            @if ($sambutan->foto_lurah)
                                <div class="mt-3">
                                    <img src="{{ Storage::url($sambutan->foto_lurah) }}" alt="Foto Lurah Saat Ini"
                                        class="img-thumbnail" style="max-width: 150px;">
                                    <p class="mt-1 text-muted">Foto saat ini</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Data Sambutan Lurah Card (Form) -->

            <!-- Tombol Simpan -->
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
            </div>
            <!--/ Tombol Simpan -->
        </form>
    </div>
@endsection
