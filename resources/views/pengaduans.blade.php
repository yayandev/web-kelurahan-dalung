@extends('layouts.dashboard')

@section('title', 'Data Pengaduan')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaduan /</span> Data Pengaduan</h4>

        <div class="card">
            <h5 class="card-header">Data Pengaduan Masyarakat</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No WhatsApp</th>
                            <th>Subjek</th>
                            <th>Pesan</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($pengaduans as $index => $pengaduan)
                            <tr>
                                <td>{{ $index + 1 + ($pengaduans->currentPage() - 1) * $pengaduans->perPage() }}</td>
                                <td><strong>{{ $pengaduan->nama }}</strong></td>
                                <td>{{ $pengaduan->no_whatsapp }}</td>
                                <td>{{ $pengaduan->subjek }}</td>
                                <td>{{ $pengaduan->pesan }}</td>
                                <td>
                                    @if ($pengaduan->gambar)
                                        <img src="{{ asset('storage/' . $pengaduan->gambar) }}" alt="Gambar"
                                            style="max-width: 100px; max-height: 100px;">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('pengaduan.destroy', $pengaduan->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                    {{-- tombol ke whatsapp --}}
                                    <a href="https://wa.me/{{ $pengaduan->no_whatsapp }}" target="_blank"
                                        class="btn btn-success btn-sm mt-2">Balas via WhatsApp</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $pengaduans->links() }}
            </div>
        </div>
    </div>
@endsection
