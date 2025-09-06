@extends('layouts.dashboard')

@section('title', 'Struktur Organisasi')

@section('content')
    <div class="container card">
        <div class="card-header">
            <h4 class="card-title">Struktur Organisasi</h4>
            <a href="{{ route('struktur-organisasi.create') }}" class="btn btn-primary btn-sm float-end">Tambah
                Struktur</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jabatan</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($strukturs as $struktur)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $struktur->jabatan }}</td>
                            <td>{{ $struktur->nama }}</td>
                            <td>
                                @if ($struktur->foto)
                                    <img src="{{ asset('storage/' . $struktur->foto) }}" alt="{{ $struktur->nama }}"
                                        width="100">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('struktur-organisasi.edit', $struktur->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('struktur-organisasi.destroy', $struktur->id) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
