@extends('layouts.dashboard')

@section('content')
    <div class="row gy-4">
        <!-- Header Form Visi & Misi Kelurahan -->
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Edit Visi & Misi Kelurahan Dalung</h4>
                    <span class="badge bg-label-info rounded-pill">Pembaruan Data</span>
                </div>
                <p class="text-muted">Gunakan formulir di bawah ini untuk memperbarui Visi dan Misi Kelurahan Dalung.</p>
            </div>
        </div>
        <!--/ Header Form Visi & Misi Kelurahan -->

        <form action="{{ route('vision_mission.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Visi Kelurahan Card (Form) -->
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title m-0">Visi Kelurahan</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="visi" class="form-label">Deskripsi Visi</label>
                            <textarea class="form-control" id="visi" name="visi" rows="5"
                                placeholder="Masukkan visi Kelurahan Dalung...">{{ old('visi', $visiMisi->visi) }}</textarea>
                            @error('visi')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Visi Kelurahan Card (Form) -->

            <!-- Misi Kelurahan Card (Form) -->
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">Misi Kelurahan</h5>
                        {{-- Tombol untuk menambah input misi baru, bisa diimplementasikan dengan JS --}}
                        {{-- <button type="button" class="btn btn-sm btn-primary" id="addMisiField">Tambah Misi</button> --}}
                    </div>
                    <div class="card-body">
                        <div id="misiFields">
                            @php
                                $misiCount = count(old('misi', $visiMisi->misi));
                                $displayedMisi = old('misi', $visiMisi->misi);
                            @endphp

                            @for ($i = 0; $i < max(4, $misiCount); $i++)
                                {{-- Tampilkan minimal 4 input, atau sebanyak misi yang ada --}}
                                <div class="mb-3 misi-item">
                                    <label for="misi_{{ $i + 1 }}" class="form-label">Misi
                                        {{ $i + 1 }}</label>
                                    <div class="input-group">
                                        <input type="text" id="misi_{{ $i + 1 }}" name="misi[]"
                                            class="form-control" placeholder="Masukkan misi ke-{{ $i + 1 }}..."
                                            value="{{ $displayedMisi[$i] ?? '' }}" />
                                        @if ($i >= 4 || $misiCount > 4)
                                            {{-- Tampilkan tombol hapus jika lebih dari 4 atau jika sudah ada data --}}
                                            <button class="btn btn-outline-danger remove-misi-field"
                                                type="button">Hapus</button>
                                        @endif
                                    </div>
                                    @error('misi.' . $i)
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endfor
                        </div>
                        <button type="button" class="btn btn-sm btn-success mt-2" id="addMisiField">Tambah Misi
                            Baru</button>

                        <small class="text-muted mt-3 d-block">Anda dapat menambah atau mengurangi poin misi.</small>
                    </div>
                </div>
            </div>
            <!--/ Misi Kelurahan Card (Form) -->

            <!-- Tombol Simpan -->
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
            </div>
            <!--/ Tombol Simpan -->
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let misiCounter = document.querySelectorAll('.misi-item').length;
            const misiFields = document.getElementById('misiFields');
            const addMisiFieldButton = document.getElementById('addMisiField');

            addMisiFieldButton.addEventListener('click', function() {
                misiCounter++;
                const newMisiField = document.createElement('div');
                newMisiField.classList.add('mb-3', 'misi-item');
                newMisiField.innerHTML = `
                <label for="misi_${misiCounter}" class="form-label">Misi ${misiCounter}</label>
                <div class="input-group">
                    <input type="text" id="misi_${misiCounter}" name="misi[]" class="form-control" placeholder="Masukkan misi ke-${misiCounter}..." />
                    <button class="btn btn-outline-danger remove-misi-field" type="button">Hapus</button>
                </div>
            `;
                misiFields.appendChild(newMisiField);
            });

            misiFields.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-misi-field')) {
                    e.target.closest('.misi-item').remove();
                    // Re-index labels if needed (optional but good UX)
                    document.querySelectorAll('.misi-item').forEach((item, index) => {
                        item.querySelector('.form-label').textContent = `Misi ${index + 1}`;
                        item.querySelector('input').setAttribute('id', `misi_${index + 1}`);
                        item.querySelector('input').setAttribute('placeholder',
                            `Masukkan misi ke-${index + 1}...`);
                    });
                    misiCounter = document.querySelectorAll('.misi-item')
                    .length; // Update counter after removal
                }
            });
        });
    </script>
@endpush
