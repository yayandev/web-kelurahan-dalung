@extends('layouts.dashboard')

@section('content')
    <div class="row gy-4">
        <!-- Header Galeri -->
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Manajemen Galeri</h4>
                    <a href="{{ route('galeri.create') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus me-1"></i> Tambah Item Baru
                    </a>
                </div>
                <p class="text-muted">Kelola koleksi foto dan video Kelurahan Dalung.</p>
            </div>
        </div>
        <!--/ Header Galeri -->

        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Daftar Item Galeri</h5>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($galeriItems->isEmpty())
                        <div class="alert alert-info" role="alert">
                            Belum ada item galeri. Silakan tambahkan yang baru!
                        </div>
                    @else
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($galeriItems as $item)
                                        <tr>
                                            <td>{{ $loop->iteration + ($galeriItems->currentPage() - 1) * $galeriItems->perPage() }}
                                            </td>
                                            <td>
                                                <img src="{{ Storage::url($item->file_path) }}" alt="{{ $item->title }}"
                                                    class="img-thumbnail"
                                                    style="width: 80px; height: 80px; object-fit: cover;">
                                            </td>
                                            <td><strong>{{ $item->title }}</strong></td>
                                            <td>{{ Str::limit($item->description, 50) }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown"><i
                                                            class="mdi mdi-dots-vertical"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('galeri.edit', $item->id) }}">
                                                            <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                                        </a>
                                                        <form action="{{ route('galeri.destroy', $item->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="mdi mdi-trash-can-outline me-1"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $galeriItems->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
