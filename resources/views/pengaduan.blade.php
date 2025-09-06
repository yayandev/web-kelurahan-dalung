@extends('layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        {{-- notification response --}}
        @if (session('success'))
            <div
                class="mb-6 p-4 bg-green-100 border border-green-200 text-green-800 rounded-lg shadow-sm flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.style.display='none';"
                    class="text-green-500 hover:text-green-700 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div
                class="mb-6 p-4 bg-red-100 border border-red-200 text-red-800 rounded-lg shadow-sm flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                    <span class="text-sm">{{ session('error') }}</span>
                </div>
                <button onclick="this.parentElement.style.display='none';"
                    class="text-red-500 hover:text-red-700 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div
                class="mb-6 p-4 bg-red-100 border border-red-200 text-red-800 rounded-lg shadow-sm flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                    <div>
                        <strong class="font-semibold">Terjadi kesalahan:</strong>
                        <ul class="list-disc list-inside mt-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button onclick="this.parentElement.style.display='none';"
                    class="text-red-500 hover:text-red-700 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        @endif

        <!-- Background Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-32 h-32 bg-[#059669] opacity-5 rounded-full blur-3xl animate-pulse"></div>
            <div
                class="absolute bottom-20 right-10 w-40 h-40 bg-[#059669] opacity-5 rounded-full blur-3xl animate-pulse delay-1000">
            </div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-[#059669] opacity-3 rounded-full blur-3xl animate-pulse delay-500">
            </div>
        </div>

        <!-- Title and Description -->
        <div class="mb-12 lg:mb-16 text-center relative z-10">
            <div class="inline-block">
                <h2
                    class="text-[#059669] text-5xl sm:text-6xl lg:text-7xl font-extrabold leading-tight mb-6 tracking-tight relative">
                    Kirim Pengaduan
                    <!-- Decorative line under title -->
                    <div
                        class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-transparent via-[#059669] to-transparent rounded-full">
                    </div>
                </h2>
            </div>
            <p class="text-[#333333] text-lg sm:text-xl lg:text-2xl leading-relaxed max-w-3xl mx-auto mt-8 opacity-90">
                Sampaikan keluhan, saran, atau masukan Anda kepada pemerintah desa melalui formulir di bawah ini.
            </p>

            <!-- Info Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-4xl mx-auto mt-12">
                <div
                    class="bg-white/80 backdrop-blur-sm rounded-xl p-4 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 bg-[#059669]/10 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-[#059669]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-[#333333] mb-2">Respon Cepat</h3>
                    <p class="text-sm text-gray-600">Pengaduan diproses dalam 24 jam</p>
                </div>

                <div
                    class="bg-white/80 backdrop-blur-sm rounded-xl p-4 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 bg-[#059669]/10 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-[#059669]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-[#333333] mb-2">Terjamin Aman</h3>
                    <p class="text-sm text-gray-600">Data pribadi dilindungi</p>
                </div>

                <div
                    class="bg-white/80 backdrop-blur-sm rounded-xl p-4 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 bg-[#059669]/10 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-[#059669]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-[#333333] mb-2">Follow Up</h3>
                    <p class="text-sm text-gray-600">Notifikasi via WhatsApp</p>
                </div>
            </div>
        </div>

        <!-- Complaint Form Container -->
        <div class="relative z-10">
            <div
                class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl border border-gray-100 p-8 sm:p-10 lg:p-12 max-w-4xl mx-auto relative overflow-hidden">
                <!-- Decorative corner elements -->
                <div
                    class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-[#059669]/10 to-transparent rounded-bl-3xl">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-20 h-20 bg-gradient-to-tr from-[#059669]/10 to-transparent rounded-tr-3xl">
                </div>

                <form action="{{ route('pengaduan.store') }}" method="POST" class="space-y-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Nama Lengkap -->
                        <div class="group">
                            <label for="full_name"
                                class="block text-sm font-semibold text-gray-700 mb-2 group-hover:text-[#059669] transition-colors duration-200">
                                Nama Lengkap
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="nama" id="full_name" autocomplete="name" required
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm placeholder-gray-400 transition-all duration-300
                                           focus:outline-none focus:ring-0 focus:border-[#059669] focus:shadow-lg focus:shadow-[#059669]/10
                                           hover:border-gray-300 bg-white/80 backdrop-blur-sm"
                                    placeholder="Masukkan nama lengkap Anda">
                                <div
                                    class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-[#059669] to-[#059669] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left">
                                </div>
                            </div>
                        </div>

                        <!-- Nomor WhatsApp -->
                        <div class="group">
                            <label for="whatsapp_number"
                                class="block text-sm font-semibold text-gray-700 mb-2 group-hover:text-[#059669] transition-colors duration-200">
                                Nomor WhatsApp
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute left-3 top-3 flex items-center">
                                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.688" />
                                    </svg>
                                    <span class="ml-2 text-gray-500 text-sm">+62</span>
                                </div>
                                <input type="tel" name="no_whatsapp" id="whatsapp_number" autocomplete="tel"
                                    required
                                    class="w-full pl-16 pr-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm placeholder-gray-400 transition-all duration-300
                                           focus:outline-none focus:ring-0 focus:border-[#059669] focus:shadow-lg focus:shadow-[#059669]/10
                                           hover:border-gray-300 bg-white/80 backdrop-blur-sm"
                                    placeholder="81234567890">
                                <div
                                    class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-[#059669] to-[#059669] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left">
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-gray-500 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Kami akan menghubungi Anda melalui nomor ini untuk konfirmasi pengaduan.
                            </p>
                        </div>
                    </div>

                    <!-- Subjek Pengaduan -->
                    <div class="group">
                        <label for="subject"
                            class="block text-sm font-semibold text-gray-700 mb-2 group-hover:text-[#059669] transition-colors duration-200">
                            Subjek Pengaduan
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <select name="subjek" id="subject" required
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm transition-all duration-300
                                       focus:outline-none focus:ring-0 focus:border-[#059669] focus:shadow-lg focus:shadow-[#059669]/10
                                       hover:border-gray-300 bg-white/80 backdrop-blur-sm appearance-none cursor-pointer">
                                <option value="">Pilih kategori pengaduan</option>
                                <option value="pelayanan_administrasi">Pelayanan Administrasi</option>
                                <option value="infrastruktur">Infrastruktur Desa</option>
                                <option value="kebersihan">Kebersihan Lingkungan</option>
                                <option value="keamanan">Keamanan dan Ketertiban</option>
                                <option value="pelayanan_kesehatan">Pelayanan Kesehatan</option>
                                <option value="pendidikan">Pendidikan</option>
                                <option value="ekonomi">Ekonomi dan UMKM</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                            <div
                                class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-[#059669] to-[#059669] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left">
                            </div>
                        </div>
                    </div>

                    <!-- Isi Pengaduan -->
                    <div class="group">
                        <label for="complaint_message"
                            class="block text-sm font-semibold text-gray-700 mb-2 group-hover:text-[#059669] transition-colors duration-200">
                            Isi Pengaduan
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <textarea id="complaint_message" name="pesan" rows="6" required
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm placeholder-gray-400 transition-all duration-300
                                       focus:outline-none focus:ring-0 focus:border-[#059669] focus:shadow-lg focus:shadow-[#059669]/10
                                       hover:border-gray-300 bg-white/80 backdrop-blur-sm resize-none"
                                placeholder="Tulis pengaduan Anda di sini secara detail. Semakin lengkap informasi yang Anda berikan, semakin cepat kami dapat menindaklanjuti pengaduan Anda."></textarea>
                            <div class="absolute bottom-3 right-3">
                                <span class="text-xs text-gray-400" id="char-count">0 / 1000</span>
                            </div>
                            <div
                                class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-[#059669] to-[#059669] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left">
                            </div>
                        </div>
                        <p class="mt-2 text-xs text-gray-500">Jelaskan pengaduan Anda dengan detail agar dapat
                            ditindaklanjuti dengan baik.</p>
                    </div>

                    <!-- Upload File (Optional) -->
                    <div class="group">
                        <label
                            class="block text-sm font-semibold text-gray-700 mb-2 group-hover:text-[#059669] transition-colors duration-200">
                            Lampiran Pendukung
                            <span class="text-gray-400 font-normal">(Opsional)</span>
                        </label>
                        <div
                            class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-[#059669] transition-all duration-300 group-hover:bg-[#059669]/5 cursor-pointer">
                            <input type="file" class="hidden" id="file-upload" name="gambar"
                                accept="image/*,.pdf,.doc,.docx">
                            <label for="file-upload" class="cursor-pointer">
                                <svg class="w-8 h-8 text-gray-400 mx-auto mb-2 group-hover:text-[#059669] transition-colors duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="text-sm text-gray-600 mb-1">Klik untuk mengunggah file</p>
                                <p class="text-xs text-gray-400">PNG, JPG, PDF (Max. 5MB)</p>
                            </label>
                        </div>
                    </div>

                    <!-- Privacy Notice -->
                    <div class="bg-[#059669]/5 border border-[#059669]/20 rounded-xl p-4">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-[#059669] mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div class="text-sm">
                                <p class="font-semibold text-[#059669] mb-1">Perlindungan Data Pribadi</p>
                                <p class="text-gray-600 text-xs leading-relaxed">Data yang Anda berikan akan dijaga
                                    kerahasiaan dan hanya digunakan untuk keperluan penanganan pengaduan. Kami berkomitmen
                                    melindungi privasi Anda sesuai dengan peraturan yang berlaku.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <button type="submit"
                            class="flex-1 group relative inline-flex items-center justify-center py-4 px-8 border border-transparent text-base font-semibold rounded-xl text-white bg-[#059669] overflow-hidden transition-all duration-300 hover:bg-[#047857] hover:shadow-xl hover:shadow-[#059669]/25 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#059669]">
                            <span class="relative z-10 flex items-center">
                                <svg class="w-5 h-5 mr-2 transition-transform duration-300 group-hover:scale-110"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Kirim Pengaduan
                            </span>
                            <!-- Animated background -->
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                            </div>
                        </button>

                        <button type="reset"
                            class="sm:w-auto group inline-flex items-center justify-center py-4 px-6 border-2 border-gray-300 text-base font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <svg class="w-5 h-5 mr-2 transition-transform duration-300 group-hover:rotate-180"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Reset Form
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        // Character counter for textarea
        document.getElementById('complaint_message').addEventListener('input', function() {
            const current = this.value.length;
            const max = 1000;
            document.getElementById('char-count').textContent = current + ' / ' + max;

            if (current > max) {
                this.value = this.value.substring(0, max);
                document.getElementById('char-count').textContent = max + ' / ' + max;
            }
        });

        // File upload preview
        document.getElementById('file-upload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const parent = this.closest('div');

            if (file) {
                const fileInfo = document.createElement('div');
                fileInfo.className = 'mt-2 text-sm text-[#059669] font-medium';
                fileInfo.innerHTML = `
                    <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    File terpilih: ${file.name}
                `;

                const existing = parent.querySelector('.mt-2');
                if (existing) existing.remove();
                parent.appendChild(fileInfo);
            }
        });

        // Form animation on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        document.querySelectorAll('.group').forEach((el) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });
    </script>
@endsection
