@extends('layouts.dashboard')

@section('content')
    <div class="row gy-4">
        {{-- errors & success response --}}
        @if ($errors->any())
            <div class="col-12">
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if (session('success'))
            <div class="col-12">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Header Form Profil Kelurahan -->
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Edit Profil Kelurahan Dalung</h4>
                    <span class="badge bg-label-primary rounded-pill">Pembaruan Data</span>
                </div>
                <p class="text-muted">Gunakan formulir di bawah ini untuk memperbarui informasi dasar Kelurahan Dalung.</p>
            </div>
        </div>
        <!--/ Header Form Profil Kelurahan -->

        <form action="{{ route('profil.update') }}" method="POST"> {{-- Sesuaikan route ini dengan route update Anda --}}
            @csrf
            @method('PUT') {{-- Gunakan metode PUT untuk update data sesuai standar RESTful --}}

            <!-- Sejarah Kelurahan Card (Form) -->
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title m-0">Sejarah Singkat</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="sejarah" class="form-label">Deskripsi Sejarah</label>
                            <textarea class="form-control" id="sejarah" name="sejarah" rows="6"
                                placeholder="Masukkan sejarah singkat Kelurahan Dalung...">{{ old('sejarah', 'Kelurahan Dalung merupakan salah satu kelurahan yang memiliki sejarah panjang di wilayah ini. Berawal dari sebuah pedesaan agraris, Dalung terus berkembang seiring waktu menjadi pusat kegiatan masyarakat yang dinamis. Perkembangan infrastruktur dan peningkatan partisipasi warga telah membentuk Kelurahan Dalung seperti sekarang. Nama Dalung sendiri diyakini berasal dari cerita rakyat atau penamaan lokal yang telah turun-temurun. Upaya pelestarian nilai-nilai sejarah terus dilakukan untuk mengenang dan menghargai warisan leluhur.') }}</textarea>
                            @error('sejarah')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Sejarah Kelurahan Card (Form) -->

            <!-- Geografis Kelurahan Card (Form) -->
            <div class="col-lg-6 col-12">
                <div class="card mb-4 h-100">
                    <div class="card-header">
                        <h5 class="card-title m-0">Informasi Geografis</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="luas_wilayah" class="form-label">Luas Wilayah (Ha)</label>
                            <input type="text" id="luas_wilayah" name="luas_wilayah" class="form-control"
                                placeholder="Contoh: 120" value="{{ old('luas_wilayah', $profil->luas_wilayah ?? '') }}" />
                            @error('luas_wilayah')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="batas_utara" class="form-label">Batas Utara</label>
                            <input type="text" id="batas_utara" name="batas_utara" class="form-control"
                                placeholder="Contoh: Desa A" value="{{ old('batas_utara', $profil->batas_utara ?? '') }}" />
                            @error('batas_utara')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="batas_selatan" class="form-label">Batas Selatan</label>
                            <input type="text" id="batas_selatan" name="batas_selatan" class="form-control"
                                placeholder="Contoh: Desa B"
                                value="{{ old('batas_selatan', $profil->batas_selatan ?? '') }}" />
                            @error('batas_selatan')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="batas_timur" class="form-label">Batas Timur</label>
                            <input type="text" id="batas_timur" name="batas_timur" class="form-control"
                                placeholder="Contoh: Desa C"
                                value="{{ old('batas_timur', $profil->batas_timur ?? '') }}" />
                            @error('batas_timur')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-0">
                            <label for="batas_barat" class="form-label">Batas Barat</label>
                            <input type="text" id="batas_barat" name="batas_barat" class="form-control"
                                placeholder="Contoh: Desa D"
                                value="{{ old('batas_barat', $profil->batas_barat ?? '') }}" />
                            @error('batas_barat')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Geografis Kelurahan Card (Form) -->

            <!-- Demografi Kelurahan Card (Form) -->
            <div class="col-lg-6 col-12">
                <div class="card mb-4 h-100">
                    <div class="card-header">
                        <h5 class="card-title m-0">Data Demografi</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="jumlah_penduduk" class="form-label">Jumlah Penduduk (Jiwa)</label>
                            <input type="text" id="jumlah_penduduk" name="jumlah_penduduk" class="form-control"
                                placeholder="Contoh: 25000"
                                value="{{ old('jumlah_penduduk', $profil->jumlah_penduduk ?? 'XX.XXX') }}" />
                            @error('jumlah_penduduk')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_laki_laki" class="form-label">Jumlah Laki-laki (Jiwa)</label>
                            <input type="text" id="jumlah_laki_laki" name="jumlah_laki_laki" class="form-control"
                                placeholder="Contoh: 12500"
                                value="{{ old('jumlah_laki_laki', $profil->jumlah_laki_laki ?? 'XX.XXX') }}" />
                            @error('jumlah_laki_laki')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_perempuan" class="form-label">Jumlah Perempuan (Jiwa)</label>
                            <input type="text" id="jumlah_perempuan" name="jumlah_perempuan" class="form-control"
                                placeholder="Contoh: 12500"
                                value="{{ old('jumlah_perempuan', $profil->jumlah_perempuan ?? 'XX.XXX') }}" />
                            @error('jumlah_perempuan')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_kk" class="form-label">Jumlah Kepala Keluarga (KK)</label>
                            <input type="text" id="jumlah_kk" name="jumlah_kk" class="form-control"
                                placeholder="Contoh: 5000"
                                value="{{ old('jumlah_kk', $profil->jumlah_kk ?? 'X.XXX') }}" />
                            @error('jumlah_kk')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-0">
                            <label for="jumlah_rtrw" class="form-label">Jumlah RT/RW</label>
                            <input type="text" id="jumlah_rtrw" name="jumlah_rtrw" class="form-control"
                                placeholder="Contoh: 40 RT / 10 RW"
                                value="{{ old('jumlah_rtrw', $profil->jumlah_rtrw ?? 'XX RT / XX RW') }}" />
                            @error('jumlah_rtrw')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Demografi Kelurahan Card (Form) -->

            <!-- Alamat & Kontak Card (Form) -->
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title m-0">Alamat & Kontak</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="alamat_kantor" class="form-label">Alamat Kantor Kelurahan</label>
                            <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" rows="3"
                                placeholder="Masukkan alamat lengkap kantor kelurahan...">{{ old('alamat_kantor', $profil->alamat_kantor ?? '') }}</textarea>
                            @error('alamat_kantor')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control"
                                placeholder="Contoh: (0361) 1234 567"
                                value="{{ old('nomor_telepon', $profil->nomor_telepon ?? '') }}" />
                            @error('nomor_telepon')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email_kelurahan" class="form-label">Email</label>
                            <input type="email" id="email_kelurahan" name="email_kelurahan" class="form-control"
                                placeholder="Contoh: info@kelurahandalung.go.id"
                                value="{{ old('email_kelurahan', $profil->email_kelurahan ?? '') }}" />
                            @error('email_kelurahan')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jam_operasional" class="form-label">Jam Operasional</label>
                            <input type="text" id="jam_operasional" name="jam_operasional" class="form-control"
                                placeholder="Contoh: Senin - Jumat: 08.00 - 16.00 WIB"
                                value="{{ old('jam_operasional', $profil->jam_operasional ?? '') }}" />
                            @error('jam_operasional')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Sosial Media -->
                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="url" id="instagram" name="instagram" class="form-control"
                                placeholder="Contoh: https://instagram.com/kelurahandalung"
                                value="{{ old('instagram', $profil->instagram ?? '') }}" />
                            @error('instagram')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="url" id="facebook" name="facebook" class="form-control"
                                placeholder="Contoh: https://facebook.com/kelurahandalung"
                                value="{{ old('facebook', $profil->facebook ?? '') }}" />
                            @error('facebook')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-0">
                            <label for="tiktok" class="form-label">TikTok</label>
                            <input type="url" id="tiktok" name="tiktok" class="form-control"
                                placeholder="Contoh: https://tiktok.com/@kelurahandalung"
                                value="{{ old('tiktok', $profil->tiktok ?? '') }}" />
                            @error('tiktok')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- /Sosial Media -->
                    </div>
                </div>
            </div>
            <!--/ Alamat & Kontak Card (Form) -->


            <!-- Tombol Simpan -->
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
            </div>
            <!--/ Tombol Simpan -->
        </form>
    </div>
@endsection
