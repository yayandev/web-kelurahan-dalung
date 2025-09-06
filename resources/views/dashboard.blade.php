@extends('layouts.dashboard')

@section('content')
    <div class="row gy-4">
        <!-- Welcome Card -->
        <div class="col-md-12 col-lg-8">
            <div class="card h-100">
                <div class="d-flex align-items-end row">
                    <div class="col-md-8 order-2 order-md-1">
                        <div class="card-body">
                            <h4 class="card-title pb-xl-2">Selamat Datang di Dashboard Kelurahan Dalung! 👋</h4>
                            <p class="mb-0">Kelola informasi dan aktivitas kelurahan dengan mudah.</p>
                            <p>Lihat ringkasan terbaru di bawah.</p>
                            <a href="/profil" class="btn btn-primary">Lihat Profil Kelurahan</a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center text-md-end order-1 order-md-2">
                        <div class="card-body pb-0 px-0 px-md-4 ps-0">
                            {{-- You might want to replace this illustration with a custom one for Kelurahan Dalung --}}
                            <img src="/assets/img/illustrations/illustration-john-light.png" height="140"
                                alt="Welcome Illustration" data-app-light-img="illustrations/illustration-john-light.png"
                                data-app-dark-img="illustrations/illustration-john-dark.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Welcome Card -->

        <!-- Statistics Cards -->
        <div class="col-lg-2 col-sm-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                        <div class="avatar">
                            <div class="avatar-initial bg-label-primary rounded">
                                <i class="mdi mdi-newspaper-variant-multiple-outline mdi-24px"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
                        <h5 class="mb-2">{{ \App\Models\Berita::count() }}</h5>
                        <p class="mb-lg-2 mb-xl-3">Total Berita</p>
                        <div class="badge bg-label-secondary rounded-pill">Sejak Awal</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-sm-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                        <div class="avatar">
                            <div class="avatar-initial bg-label-info rounded">
                                <i class="mdi mdi-bullhorn-outline mdi-24px"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
                        <h5 class="mb-2">{{ \App\Models\Pengaduam::count() }}</h5>
                        <p class="mb-lg-2 mb-xl-3">Total Pengaduan</p>
                        <div class="badge bg-label-secondary rounded-pill">Sejak Awal</div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics Cards -->

        <!-- Recent Content & Quick Access -->
        <div class="col-12 col-xl-8">
            <div class="row gy-4">
                <!-- Latest News -->
                <div class="col-md-12">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Berita Terbaru</h5>
                            <a href="/berita" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                        </div>
                        <div class="card-body">
                            <ul class="p-0 m-0">

                                @foreach (\App\Models\Berita::limit(5)->get() as $berita)
                                    <li class="d-flex mb-3 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="news"
                                                class="rounded">
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">{{ $berita->judul }}</h6>
                                                <small class="text-muted">{{ $berita->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ Latest News -->
            </div>
        </div>

        <div class="col-12 col-xl-4">
            <div class="row gy-4">
                <!-- Gallery Stats -->
                <div class="col-md-6 col-sm-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                                <div class="avatar">
                                    <div class="avatar-initial bg-label-warning rounded">
                                        <i class="mdi mdi-image-multiple-outline mdi-24px"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-info mt-4 pt-3">
                                <h5 class="mb-2">250</h5>
                                <p class="text-body">Total Foto</p>
                                <div class="badge bg-label-secondary rounded-pill mt-1">Galeri</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Gallery Stats -->
            </div>
        </div>
    </div>
@endsection
