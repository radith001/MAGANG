<div>

    {{-- ======================= NAVBAR ======================= --}}
    <nav id="navbar" class="bg-surface-container-lowest border-b border-outline-variant w-full sticky top-0 z-50">
        <div class="flex justify-between items-center w-full px-md max-w-container-max mx-auto h-16">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ asset('images/logo-brs.png') }}" alt="Logo BRS" class="h-10 w-auto object-contain">
                <span class="text-title-md font-title-md font-bold text-primary">BRS NET</span>
            </a>
            <div class="hidden md:flex gap-gutter items-center h-full">
                <a id="nav-home" href="#home" class="nav-link text-on-surface-variant hover:text-primary transition-colors duration-200 font-label-sm text-label-sm h-full flex items-center">Home</a>
                <a id="nav-lapor" href="#lapor" class="nav-link text-on-surface-variant hover:text-primary transition-colors duration-200 font-label-sm text-label-sm h-full flex items-center">Lapor Gangguan</a>
                <a id="nav-cek" href="#cek-status" class="nav-link text-on-surface-variant hover:text-primary transition-colors duration-200 font-label-sm text-label-sm h-full flex items-center">Cek Status</a>
            </div>
            <a href="{{ url('/admin') }}" class="hidden md:inline-flex items-center gap-xs px-sm py-xs border border-primary text-primary rounded-lg font-label-sm text-label-sm hover:bg-surface-container-low transition-colors">
                <span class="material-symbols-outlined text-[18px]">login</span>
                Login
            </a>
            <button id="mobile-menu-btn" class="md:hidden text-on-surface-variant">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-surface-container-lowest border-t border-outline-variant px-md py-sm flex flex-col gap-xs">
            <a href="#home" class="py-xs text-on-surface-variant font-label-sm text-label-sm hover:text-primary transition-colors">Home</a>
            <a href="#lapor" class="py-xs text-on-surface-variant font-label-sm text-label-sm hover:text-primary transition-colors">Lapor Gangguan</a>
            <a href="#cek-status" class="py-xs text-on-surface-variant font-label-sm text-label-sm hover:text-primary transition-colors">Cek Status</a>
            <a href="{{ url('/admin') }}" class="py-xs text-primary font-label-sm text-label-sm font-bold">Login Admin</a>
        </div>
    </nav>

    {{-- ======================= NOTIFIKASI API (Ditampilkan via JavaScript) ======================= --}}
    <div id="api-success-banner" class="hidden animate-fade-in-down fixed top-16 left-0 right-0 z-40 mx-auto max-w-2xl mt-3 px-md">
        <div class="bg-green-50 border border-green-200 rounded-xl p-md flex items-start gap-sm shadow-lg">
            <span class="material-symbols-outlined text-green-600 mt-0.5" style="font-variation-settings:'FILL' 1;">check_circle</span>
            <div class="flex-1">
                <p class="font-label-sm text-label-sm font-bold text-green-800">Laporan Gangguan Berhasil Dikirim!</p>
                <p class="font-body-md text-body-md text-green-700 mt-1">
                    Simpan kode tiket Anda:
                    <strong id="api-ticket-code" class="font-code-xs text-code-xs tracking-widest bg-green-100 px-2 py-1 rounded text-green-900 ml-1 select-all"></strong>
                </p>
                <p class="font-label-sm text-label-sm text-green-600 mt-1">Gunakan kode ini untuk memantau status perbaikan di bagian "Cek Status".</p>
            </div>
            <button onclick="document.getElementById('api-success-banner').classList.add('hidden')" class="text-green-500 hover:text-green-700 transition-colors ml-auto flex-shrink-0">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    </div>

    <div id="api-error-banner" class="hidden animate-fade-in-down fixed top-16 left-0 right-0 z-40 mx-auto max-w-2xl mt-3 px-md">
        <div class="bg-red-50 border border-red-200 rounded-xl p-md flex items-start gap-sm shadow-lg">
            <span class="material-symbols-outlined text-red-600 mt-0.5" style="font-variation-settings:'FILL' 1;">error</span>
            <div class="flex-1">
                <p class="font-label-sm text-label-sm font-bold text-red-800">Terdapat kesalahan pada formulir:</p>
                <ul id="api-error-list" class="mt-1 list-disc list-inside space-y-0.5"></ul>
            </div>
            <button onclick="document.getElementById('api-error-banner').classList.add('hidden')" class="text-red-500 hover:text-red-700 transition-colors ml-auto flex-shrink-0">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    </div>

    <main class="flex-grow">

        {{-- ======================= SECTION: HOME ======================= --}}
        <section id="home" class="relative px-md py-xl md:py-[120px] overflow-hidden">
            <div class="absolute top-0 right-0 -z-10 w-full md:w-1/2 h-full opacity-10 bg-gradient-to-bl from-primary to-transparent rounded-bl-full pointer-events-none"></div>
            <div class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-2 gap-xl items-center">
                <div class="flex flex-col gap-sm">
                    <span class="font-label-sm text-label-sm text-primary uppercase tracking-wider">Layanan Bantuan Pelanggan</span>
                    <h1 class="font-display-lg text-display-lg text-on-background">
                        Sistem Informasi Manajemen Gangguan Pelanggan BRS NET
                    </h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mt-xs mb-md max-w-xl">
                        Kami mengutamakan konektivitas Anda. Laporkan gangguan atau pantau status perbaikan jaringan dengan cepat dan transparan melalui platform layanan pelanggan terpadu kami.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-xs mt-sm">
                        <a href="#lapor" class="bg-secondary-container text-on-secondary-container px-md py-sm rounded-lg font-label-sm text-label-sm font-medium hover:opacity-90 transition-opacity flex items-center justify-center gap-xs soft-lift">
                            <span class="material-symbols-outlined text-[20px]">report</span>
                            Laporkan Gangguan Baru
                        </a>
                        <a href="#cek-status" class="bg-primary text-on-primary px-md py-sm rounded-lg font-label-sm text-label-sm font-medium hover:bg-primary-container transition-colors flex items-center justify-center gap-xs soft-lift">
                            <span class="material-symbols-outlined text-[20px]">search</span>
                            Cek Status Perbaikan
                        </a>
                    </div>
                </div>
                <div class="relative w-full h-[400px] md:h-[500px] bg-surface-container-low rounded-xl border border-outline-variant overflow-hidden soft-lift">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://img.magnific.com/foto-gratis/proses-kolaboratif-para-pebisnis-multikultural-menggunakan-presentasi-laptop-dan-pertemuan-komunikasi-bertukar-pikiran-tentang-rekan-kerja-proyek-yang-bekerja-merencanakan-strategi-kesuksesan-di-kantor-modern_7861-2510.jpg?semt=ais_hybrid&w=740&q=80');"></div>

                </div>
            </div>
        </section>

        {{-- =================== FEATURES BENTO GRID =================== --}}
        <section class="bg-surface-container-low px-md py-xl border-t border-outline-variant">
            <div class="max-w-container-max mx-auto">
                <div class="text-center mb-lg">
                    <h2 class="font-headline-lg text-headline-lg mb-xs">Mengapa BRS NET?</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">Komitmen kami untuk memberikan layanan internet terbaik tanpa hambatan.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
                    <div class="bg-surface-container-lowest rounded-xl p-md border border-outline-variant soft-lift soft-lift-hover transition-all flex flex-col gap-sm">
                        <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-xs">
                            <span class="material-symbols-outlined text-2xl" style="font-variation-settings:'FILL' 1;">support_agent</span>
                        </div>
                        <h3 class="font-title-md text-title-md">Layanan 24/7</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Tim dukungan pelanggan kami siap membantu Anda kapan saja, siang maupun malam, memastikan koneksi Anda selalu terawasi.</p>
                    </div>
                    <div class="bg-surface-container-lowest rounded-xl p-md border border-outline-variant soft-lift soft-lift-hover transition-all flex flex-col gap-sm">
                        <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-xs">
                            <span class="material-symbols-outlined text-2xl" style="font-variation-settings:'FILL' 1;">engineering</span>
                        </div>
                        <h3 class="font-title-md text-title-md">Teknisi Profesional</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Didukung oleh tim teknisi lapangan berpengalaman yang bersertifikat untuk menangani infrastruktur jaringan fiber optik secara presisi.</p>
                    </div>
                    <div class="bg-surface-container-lowest rounded-xl p-md border border-outline-variant soft-lift soft-lift-hover transition-all flex flex-col gap-sm">
                        <div class="w-12 h-12 rounded-full bg-secondary-container/20 flex items-center justify-center text-secondary-container mb-xs">
                            <span class="material-symbols-outlined text-2xl" style="font-variation-settings:'FILL' 1;">bolt</span>
                        </div>
                        <h3 class="font-title-md text-title-md">Respons Cepat</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Sistem pelacakan tiket kami memprioritaskan penanganan gangguan secara efisien dengan target penyelesaian yang jelas dan terukur.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- ======================= SECTION: LAPOR GANGGUAN ======================= --}}
        <section id="lapor" class="px-md py-xl border-t border-outline-variant">
            <div class="max-w-container-max mx-auto">
                <div class="text-center mb-lg">
                    <span class="font-label-sm text-label-sm text-primary uppercase tracking-wider">Formulir Online</span>
                    <h2 class="font-headline-lg text-headline-lg mb-xs mt-1">Lapor Gangguan Baru</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">Isi formulir di bawah ini, teknisi kami akan segera menindaklanjuti laporan Anda.</p>
                </div>
                <div class="w-full max-w-3xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-0 bg-surface-container-lowest rounded-xl border border-outline-variant soft-lift overflow-hidden">
                    {{-- Brand Side --}}
                    <div class="hidden md:flex flex-col bg-surface-container-low p-lg items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, #0015b5 1px, transparent 0); background-size: 24px 24px;"></div>
                        <div class="relative z-10 flex flex-col items-center text-center space-y-md">
                            <div class="w-24 h-24 rounded-full bg-primary/10 flex items-center justify-center">
                                <span class="material-symbols-outlined text-5xl text-primary" style="font-variation-settings:'FILL' 1;">router</span>
                            </div>
                            <div>
                                <h3 class="font-title-md text-title-md text-on-surface mb-2">Pusat Bantuan Teknis</h3>
                                <p class="font-body-md text-body-md text-on-surface-variant">Tim teknisi kami siap membantu Anda menyelesaikan kendala koneksi dengan cepat dan transparan.</p>
                            </div>
                            <div class="flex flex-col gap-xs w-full mt-sm">
                                <div class="flex items-center gap-xs text-on-surface-variant font-label-sm text-label-sm">
                                    <span class="material-symbols-outlined text-[16px] text-primary">call</span>
                                    <span>087761205991</span>
                                </div>
                                <div class="flex items-center gap-xs text-on-surface-variant font-label-sm text-label-sm">
                                    <span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
                                    <span>Senin – Minggu, 08.00 – 20.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Form Side --}}
                    <div class="p-lg md:p-xl flex flex-col justify-center glass-panel">
                        <div class="mb-lg">
                            <h2 class="font-headline-lg-mobile text-headline-lg-mobile text-primary mb-2">Form Pengaduan</h2>
                            <p class="font-body-md text-body-md text-on-surface-variant">Silakan lengkapi data di bawah ini agar teknisi kami dapat segera melakukan pengecekan jaringan Anda.</p>
                        </div>
                        <form id="complaint-form" class="space-y-sm" novalidate>

                            {{-- Nama Pelanggan --}}
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="nama_pelanggan">
                                    Nama Pelanggan <span class="text-error">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-outline">
                                        <span class="material-symbols-outlined text-[18px]">person</span>
                                    </span>
                                    <input class="block w-full pl-10 pr-3 py-2 bg-surface-container-lowest border border-outline-variant rounded-lg text-on-surface focus:ring-2 focus:ring-primary-container focus:border-primary-container transition-shadow shadow-sm"
                                           id="nama_pelanggan" name="nama_pelanggan" placeholder="Contoh: Budi Santoso"
                                           type="text">
                                </div>
                                <p id="error-nama_pelanggan" class="hidden mt-1 font-label-sm text-label-sm text-error"></p>
                            </div>
                            {{-- Kategori Keluhan (Dinamis dari DB) --}}
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="keluhan_id">
                                    Kategori Kendala <span class="text-error">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-outline">
                                        <span class="material-symbols-outlined text-[18px]">report_problem</span>
                                    </span>
                                    <select class="block w-full pl-10 pr-10 py-2 bg-surface-container-lowest border border-outline-variant rounded-lg text-on-surface focus:ring-2 focus:ring-primary-container focus:border-primary-container transition-shadow shadow-sm appearance-none"
                                            id="keluhan_id" name="keluhan_id">
                                        <option disabled selected value="">Pilih jenis kendala...</option>
                                        @foreach($keluhans as $keluhan)
                                            <option value="{{ $keluhan->id }}">{{ $keluhan->nama_keluhan }}</option>
                                        @endforeach
                                    </select>
                                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-outline">
                                        <span class="material-symbols-outlined text-[18px]">expand_more</span>
                                    </span>
                                </div>
                                <p id="error-keluhan_id" class="hidden mt-1 font-label-sm text-label-sm text-error"></p>
                            </div>
                            {{-- Alamat --}}
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="alamat">
                                    Alamat Lengkap Pemasangan <span class="text-error">*</span>
                                </label>
                                <textarea class="block w-full px-3 py-2 bg-surface-container-lowest border border-outline-variant rounded-lg text-on-surface focus:ring-2 focus:ring-primary-container focus:border-primary-container transition-shadow shadow-sm resize-none"
                                          id="alamat" name="alamat" placeholder="Masukkan alamat lengkap beserta patokan rumah..." rows="3"></textarea>
                                <p id="error-alamat" class="hidden mt-1 font-label-sm text-label-sm text-error"></p>
                            </div>

                            {{-- Geolokasi: Bagikan Lokasi Anda --}}
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface mb-2">
                                    Lokasi GPS <span class="text-on-surface-variant font-normal"></span>
                                </label>

                                {{-- Hidden inputs untuk koordinat --}}
                                <input type="hidden" id="latitude" name="latitude">
                                <input type="hidden" id="longitude" name="longitude">

                                {{-- Tombol Bagikan Lokasi --}}
                                <button type="button" id="btn-share-location"
                                    class="w-full flex items-center justify-center gap-2 py-2.5 px-4 border-2 border-dashed border-primary/40 rounded-lg text-primary bg-primary/5 hover:bg-primary/10 hover:border-primary/70 transition-all font-label-sm text-label-sm font-medium group">
                                    <span class="material-symbols-outlined text-[20px] group-hover:scale-110 transition-transform" style="font-variation-settings:'FILL' 1;">my_location</span>
                                    <span id="btn-location-text">Bagikan Lokasi Saya</span>
                                </button>

                                {{-- Card Preview Lokasi (muncul setelah GPS berhasil) --}}
                                <div id="location-preview" class="hidden mt-3 rounded-xl border border-green-200 bg-green-50 overflow-hidden">
                                    <div class="flex items-center justify-between px-3 py-2 bg-green-100 border-b border-green-200">
                                        <div class="flex items-center gap-1.5">
                                            <span class="material-symbols-outlined text-green-600 text-[18px]" style="font-variation-settings:'FILL' 1;">location_on</span>
                                            <span class="font-label-sm text-label-sm font-bold text-green-800">Lokasi Berhasil Diambil</span>
                                        </div>
                                        <button type="button" id="btn-clear-location" class="text-green-600 hover:text-green-800 transition-colors">
                                            <span class="material-symbols-outlined text-[18px]">close</span>
                                        </button>
                                    </div>
                                    <div class="px-3 py-2.5 flex flex-col gap-1">
                                        <p id="location-coords-text" class="font-code-xs text-code-xs text-green-700 tracking-wide"></p>
                                        <a id="location-maps-link" href="#" target="_blank"
                                            class="inline-flex items-center gap-1 font-label-sm text-label-sm text-primary hover:underline font-medium mt-0.5">
                                            <span class="material-symbols-outlined text-[15px]">open_in_new</span>
                                            Verifikasi di Google Maps
                                        </a>
                                    </div>
                                </div>

                                {{-- Card Error Geolokasi --}}
                                <div id="location-error" class="hidden mt-3 rounded-xl border border-orange-200 bg-orange-50 px-3 py-2.5 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-orange-500 text-[18px]" style="font-variation-settings:'FILL' 1;">warning</span>
                                    <p id="location-error-text" class="font-label-sm text-label-sm text-orange-700"></p>
                                </div>
                            </div>
                            {{-- Submit --}}
                            <div class="pt-sm">
                                <button class="w-full flex justify-center items-center gap-2 py-3 px-4 bg-primary text-on-primary rounded-lg font-label-sm text-label-sm font-bold shadow-md hover:bg-primary-container transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" type="submit">
                                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">send</span>
                                    Kirim Laporan Gangguan
                                </button>
                                <p class="text-center mt-3 font-code-xs text-code-xs text-on-surface-variant flex items-center justify-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">lock</span>
                                    Data Anda dienkripsi dan aman.
                                </p>
                            </div>
                        </form>

                        {{-- ===== MODAL: KONFIRMASI KIRIM TANPA GPS ===== --}}
                        <div id="modal-gps-confirm" class="hidden fixed inset-0 z-[9999] flex items-center justify-center px-4" role="dialog" aria-modal="true" aria-labelledby="modal-gps-title">
                            {{-- Backdrop --}}
                            <div id="modal-gps-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

                            {{-- Card --}}
                            <div class="relative z-10 w-full max-w-sm bg-surface rounded-2xl shadow-2xl border border-outline-variant overflow-hidden">
                                {{-- Header --}}
                                <div class="flex items-start gap-3 px-5 pt-5 pb-4 border-b border-outline-variant bg-error-container/30">
                                    <span class="material-symbols-outlined text-[32px] text-error flex-shrink-0 mt-0.5" style="font-variation-settings:'FILL' 1;">location_off</span>
                                    <div>
                                        <p id="modal-gps-title" class="font-label-lg text-label-lg font-bold text-on-surface">Lokasi GPS Belum Dibagikan</p>
                                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Teknisi mungkin kesulitan menemukan alamat Anda.</p>
                                    </div>
                                </div>

                                {{-- Body --}}
                                <div class="px-5 py-4">
                                    <p class="font-body-md text-body-md text-on-surface leading-relaxed">
                                        Anda belum membagikan lokasi GPS. Yakin ingin mengirim laporan hanya dengan alamat teks?
                                    </p>
                                </div>

                                {{-- Actions --}}
                                <div class="flex flex-col gap-2 px-5 pb-5">
                                    <button id="modal-btn-cancel-gps"
                                        class="w-full flex items-center justify-center gap-2 py-2.5 px-4 bg-primary text-on-primary rounded-xl font-label-sm text-label-sm font-bold hover:opacity-90 transition-opacity">
                                        <span class="material-symbols-outlined text-[18px]" style="font-variation-settings:'FILL' 1;">my_location</span>
                                        Batal — Saya Ingin Isi Lokasi GPS
                                    </button>
                                    <button id="modal-btn-confirm-send"
                                        class="w-full flex items-center justify-center gap-2 py-2.5 px-4 bg-surface-container border border-outline-variant rounded-xl font-label-sm text-label-sm text-on-surface-variant hover:bg-surface-container-high transition-colors">
                                        <span class="material-symbols-outlined text-[18px]">send</span>
                                        Ya, Tetap Kirim Tanpa Lokasi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ======================= SECTION: CEK STATUS ======================= --}}
        <section id="cek-status" class="bg-surface-container-low px-md py-xl border-t border-outline-variant">
            <div class="max-w-container-max mx-auto flex flex-col gap-lg">
                <div class="w-full max-w-2xl mx-auto text-center flex flex-col gap-sm">
                    <span class="font-label-sm text-label-sm text-primary uppercase tracking-wider">Lacak Tiket Anda</span>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">Cek Status Perbaikan</h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant">Masukkan Kode Tiket untuk melihat status perbaikan secara real-time.</p>
                    <form action="{{ route('home') }}" method="GET"
                          class="mt-md relative w-full flex items-center shadow-sm rounded-lg overflow-hidden border border-outline-variant focus-within:border-primary focus-within:ring-2 focus-within:ring-primary-fixed-dim transition-all bg-surface-container-lowest">
                        <span class="material-symbols-outlined text-outline ml-4">search</span>
                        <input class="w-full bg-transparent border-none focus:ring-0 text-body-md font-body-md text-on-surface placeholder:text-outline py-4 px-4 uppercase"
                               id="ticket_code" name="ticket_code" placeholder="Contoh: BRS0001"
                               value="{{ $searchedCode ?? '' }}" type="text" maxlength="10">
                        <button class="bg-primary text-on-primary px-6 py-4 font-label-sm text-label-sm font-medium hover:bg-primary-container hover:text-on-primary-container transition-colors whitespace-nowrap" type="submit">
                            Cek Status
                        </button>
                    </form>
                </div>

                {{-- Hasil: Ditemukan --}}
                @if($ticket)
                    @php
                        $statusName   = $ticket->status->nama_status ?? 'Open';
                        $badgeClass   = match(true) { $statusName==='Open'=>'bg-red-100 text-red-700', $statusName==='In Progress'=>'bg-blue-100 text-blue-700', $statusName==='Resolved'=>'bg-green-100 text-green-700', default=>'bg-surface-container text-on-surface-variant' };
                        $progressW    = match(true) { $statusName==='Open'=>'w-1/4', $statusName==='In Progress'=>'w-1/2', $statusName==='Resolved'=>'w-full', default=>'w-1/4' };
                        $progressCol  = match(true) { $statusName==='Open'=>'bg-red-500', $statusName==='In Progress'=>'bg-blue-500', $statusName==='Resolved'=>'bg-green-500', default=>'bg-outline' };
                        $statusIcon   = match(true) { $statusName==='Open'=>'pending', $statusName==='In Progress'=>'sync', $statusName==='Resolved'=>'check_circle', default=>'help' };
                        $statusDesc   = match(true) { $statusName==='Open'=>'Laporan diterima, menunggu penugasan teknisi.', $statusName==='In Progress'=>'Teknisi sedang menuju lokasi Anda.', $statusName==='Resolved'=>'Gangguan telah berhasil diperbaiki.', default=>'' };
                    @endphp
                    <section class="w-full max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-xs md:gap-gutter animate-fade-in-down">
                        <div class="md:col-span-2 bg-surface-container-lowest border border-outline-variant rounded-lg soft-lift overflow-hidden flex flex-col">
                            <div class="bg-[#F8FAFC] border-b border-outline-variant px-md py-sm flex justify-between items-center">
                                <div class="flex items-center gap-xs text-on-surface">
                                    <span class="material-symbols-outlined text-primary">receipt_long</span>
                                    <h3 class="text-title-md font-title-md">Detail Tiket</h3>
                                </div>
                                <span class="text-code-xs font-code-xs text-outline bg-surface-container px-2 py-1 rounded tracking-widest">ID: {{ $ticket->kode_ticket }}</span>
                            </div>
                            <div class="p-md grid grid-cols-1 sm:grid-cols-2 gap-md flex-grow">
                                <div class="flex flex-col gap-1">
                                    <span class="text-label-sm font-label-sm text-on-surface-variant">Nama Pelanggan</span>
                                    <span class="text-body-md font-body-md text-on-surface font-medium">{{ $ticket->nama_pelanggan }}</span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span class="text-label-sm font-label-sm text-on-surface-variant">Kategori Keluhan</span>
                                    <span class="text-body-md font-body-md text-on-surface font-medium">{{ $ticket->keluhan->nama_keluhan ?? '-' }}</span>
                                </div>
                                <div class="flex flex-col gap-1 sm:col-span-2">
                                    <span class="text-label-sm font-label-sm text-on-surface-variant">Alamat Pemasangan</span>
                                    <span class="text-body-md font-body-md text-on-surface font-medium">{{ $ticket->alamat }}</span>
                                </div>
                                <div class="flex flex-col gap-1 sm:col-span-2">
                                    <span class="text-label-sm font-label-sm text-on-surface-variant">Tanggal Laporan</span>
                                    <span class="text-body-md font-body-md text-on-surface font-medium">
                                        {{ $ticket->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY [pukul] HH:mm') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-surface-container-lowest border border-outline-variant rounded-lg soft-lift p-md flex flex-col items-center justify-center text-center gap-sm">
                            <h3 class="text-title-md font-title-md text-on-surface">Status Saat Ini</h3>
                            <div class="{{ $badgeClass }} px-6 py-3 rounded-full flex items-center gap-2 mt-2">
                                <span class="material-symbols-outlined {{ $statusName==='In Progress' ? 'animate-spin' : '' }}" style="font-variation-settings:'FILL' 1;">{{ $statusIcon }}</span>
                                <span class="text-body-lg font-body-lg font-bold">{{ $statusName }}</span>
                            </div>
                            <p class="text-label-sm font-label-sm text-on-surface-variant mt-2">{{ $statusDesc }}</p>
                            <div class="w-full bg-surface-container-high h-2 rounded-full mt-4 overflow-hidden">
                                <div class="{{ $progressCol }} {{ $progressW }} h-full rounded-full transition-all duration-700"></div>
                            </div>
                            <div class="w-full flex justify-between text-code-xs font-code-xs text-outline mt-1">
                                <span>Dilaporkan</span>
                                <span>Selesai</span>
                            </div>
                        </div>
                    </section>

                {{-- Hasil: Tidak Ditemukan --}}
                @elseif($ticketNotFound)
                    <div class="w-full max-w-2xl mx-auto animate-fade-in-down">
                        <div class="bg-error-container border border-red-200 rounded-xl p-lg flex flex-col items-center text-center gap-sm soft-lift">
                            <span class="material-symbols-outlined text-5xl text-on-error-container" style="font-variation-settings:'FILL' 1;">search_off</span>
                            <h3 class="font-title-md text-title-md text-on-error-container">Tiket Tidak Ditemukan</h3>
                            <p class="font-body-md text-body-md text-on-error-container">
                                Kode tiket <strong class="font-code-xs text-code-xs tracking-widest">{{ $searchedCode }}</strong> tidak ditemukan dalam sistem kami.
                            </p>
                            <p class="font-label-sm text-label-sm text-on-error-container/70">Pastikan kode tiket yang Anda masukkan sudah benar.</p>
                        </div>
                    </div>

                {{-- State Awal --}}
                @else
                    <div class="w-full max-w-2xl mx-auto">
                        <div class="bg-surface-container-lowest border border-outline-variant border-dashed rounded-xl p-lg flex flex-col items-center text-center gap-sm">
                            <span class="material-symbols-outlined text-5xl text-outline">confirmation_number</span>
                            <h3 class="font-title-md text-title-md text-on-surface-variant">Masukkan Kode Tiket</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant">
                                Ketikkan kode tiket (contoh: <span class="font-code-xs text-code-xs text-primary tracking-widest">BRS0001</span>) pada kolom pencarian di atas.
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </section>

    </main>

    {{-- ======================= FOOTER ======================= --}}
    <footer class="bg-surface-container-low border-t border-outline-variant mt-auto w-full">
        <div class="flex flex-col md:flex-row justify-between items-start w-full px-md py-lg max-w-container-max mx-auto gap-md">
            <div class="flex flex-col gap-xs">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/logo-brs.png') }}" alt="Logo BRS" class="h-8 w-auto object-contain">
                    <span class="text-title-md font-title-md font-bold text-primary">BRS NET</span>
                </div>
                <span class="font-label-sm text-label-sm text-on-surface-variant mt-1">
                    Copyright &copy; {{ date('Y') }} All rights reserved | by PT. Bina Raja Solusi
                </span>
            </div>
            <div class="flex flex-col gap-xs">
                <div class="flex items-center gap-xs font-label-sm text-label-sm text-on-surface-variant">
                    <span class="material-symbols-outlined text-[18px]">home</span>
                    <span>Jl. Raya Permata No.11, Saga, Kec. Balaraja, Kabupaten Tangerang, Banten 15610</span>
                </div>
                <a href="mailto:ptbinarajasolusi12345@gmail.com" class="flex items-center gap-xs font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-[18px]">mail</span>
                    <span>ptbinarajasolusi12345@gmail.com</span>
                </a>
                <a href="tel:087761205991" class="flex items-center gap-xs font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-[18px]">call</span>
                    <span>087761205991</span>
                </a>
            </div>
        </div>
    </footer>

    {{-- ======================= JAVASCRIPT ======================= --}}
    <script>
        // ---- Mobile Menu Toggle ----
        document.getElementById('mobile-menu-btn')?.addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
        document.getElementById('mobile-menu')?.querySelectorAll('a').forEach(l =>
            l.addEventListener('click', () => document.getElementById('mobile-menu').classList.add('hidden'))
        );

        // ---- Active Nav Link via IntersectionObserver ----
        const sections = document.querySelectorAll('section[id]');
        const navMap = { 'home': 'nav-home', 'lapor': 'nav-lapor', 'cek-status': 'nav-cek' };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const linkId = navMap[entry.target.id];
                const link = document.getElementById(linkId);
                if (!link) return;
                if (entry.isIntersecting) {
                    Object.values(navMap).forEach(id => document.getElementById(id)?.classList.remove('nav-link-active'));
                    link.classList.add('nav-link-active');
                }
            });
        }, { threshold: 0.4 });
        sections.forEach(s => observer.observe(s));

        // ---- Auto-scroll Cek Status jika ada query ticket_code ----
        @if($searchedCode)
            setTimeout(() => document.getElementById('cek-status')?.scrollIntoView({ behavior: 'smooth', block: 'start' }), 300);
        @endif

        // =========================================================
        // ==  FORM PENGADUAN — Submit via API (fetch, no reload)  ==
        // =========================================================
        const complaintForm = document.getElementById('complaint-form');
        const submitBtn = complaintForm?.querySelector('button[type="submit"]');

        // Helper: tampilkan/sembunyikan pesan error per field
        function showFieldError(fieldId, message) {
            const el = document.getElementById('error-' + fieldId);
            if (!el) return;
            el.textContent = message;
            el.classList.remove('hidden');
            // Tambahkan border merah pada input/select/textarea
            const input = document.getElementById(fieldId);
            input?.classList.add('border-error');
            input?.classList.remove('border-outline-variant');
        }

        function clearAllFieldErrors() {
            ['nama_pelanggan', 'keluhan_id', 'alamat'].forEach(id => {
                const errEl = document.getElementById('error-' + id);
                if (errEl) { errEl.textContent = ''; errEl.classList.add('hidden'); }
                const input = document.getElementById(id);
                input?.classList.remove('border-error');
                input?.classList.add('border-outline-variant');
            });
        }

        // Helper: tampilkan/sembunyikan banner notifikasi
        function showSuccessBanner(ticketCode) {
            document.getElementById('api-ticket-code').textContent = ticketCode;
            const banner = document.getElementById('api-success-banner');
            banner.classList.remove('hidden');
            // Auto-dismiss setelah 10 detik
            setTimeout(() => banner.classList.add('hidden'), 10000);
        }

        function showErrorBanner(errors) {
            const list = document.getElementById('api-error-list');
            list.innerHTML = '';
            Object.values(errors).flat().forEach(msg => {
                const li = document.createElement('li');
                li.className = 'font-body-md text-body-md text-red-700';
                li.textContent = msg;
                list.appendChild(li);
            });
            const banner = document.getElementById('api-error-banner');
            banner.classList.remove('hidden');
            setTimeout(() => banner.classList.add('hidden'), 8000);
        }

        // =========================================================
        // == GEOLOKASI: Tombol "Bagikan Lokasi Saya"             ==
        // =========================================================
        const btnShareLocation  = document.getElementById('btn-share-location');
        const btnLocationText   = document.getElementById('btn-location-text');
        const locationPreview   = document.getElementById('location-preview');
        const locationError     = document.getElementById('location-error');
        const locationErrorText = document.getElementById('location-error-text');
        const btnClearLocation  = document.getElementById('btn-clear-location');
        const inputLatitude     = document.getElementById('latitude');
        const inputLongitude    = document.getElementById('longitude');

        function resetLocationUI() {
            inputLatitude.value  = '';
            inputLongitude.value = '';
            locationPreview.classList.add('hidden');
            locationError.classList.add('hidden');
            btnLocationText.textContent = 'Bagikan Lokasi Saya';
            btnShareLocation.classList.remove('opacity-50');
            btnShareLocation.disabled = false;
        }

        btnClearLocation?.addEventListener('click', resetLocationUI);

        btnShareLocation?.addEventListener('click', () => {
            if (!navigator.geolocation) {
                locationError.classList.remove('hidden');
                locationPreview.classList.add('hidden');
                locationErrorText.textContent = 'Browser Anda tidak mendukung fitur GPS. Silakan isi alamat secara manual.';
                return;
            }

            // Loading state tombol
            btnLocationText.textContent = 'Mengambil Lokasi...';
            btnShareLocation.classList.add('opacity-50');
            btnShareLocation.disabled = true;
            locationError.classList.add('hidden');

            navigator.geolocation.getCurrentPosition(
                // SUCCESS
                (position) => {
                    const lat = position.coords.latitude.toFixed(7);
                    const lng = position.coords.longitude.toFixed(7);
                    const mapsUrl = `https://www.google.com/maps?q=${lat},${lng}`;

                    // Isi hidden inputs
                    inputLatitude.value  = lat;
                    inputLongitude.value = lng;

                    // Tampilkan preview card
                    document.getElementById('location-coords-text').textContent = `Lat: ${lat}, Lng: ${lng}`;
                    document.getElementById('location-maps-link').href = mapsUrl;
                    locationPreview.classList.remove('hidden');
                    locationError.classList.add('hidden');

                    // Update tombol ke state sukses
                    btnLocationText.textContent = 'Lokasi Sudah Diambil ✓';
                    btnShareLocation.classList.remove('opacity-50');
                    btnShareLocation.classList.add('opacity-70');
                    btnShareLocation.disabled = true;
                },
                // ERROR
                (error) => {
                    const msgs = {
                        1: 'Izin lokasi ditolak. Aktifkan izin lokasi di browser Anda.',
                        2: 'Posisi tidak dapat ditentukan. Pastikan GPS aktif.',
                        3: 'Waktu habis. Coba lagi atau isi alamat secara manual.',
                    };
                    locationErrorText.textContent = msgs[error.code] || 'Gagal mengambil lokasi.';
                    locationError.classList.remove('hidden');
                    locationPreview.classList.add('hidden');
                    btnLocationText.textContent = 'Coba Lagi';
                    btnShareLocation.classList.remove('opacity-50');
                    btnShareLocation.disabled = false;
                },
                { timeout: 10000, enableHighAccuracy: true, maximumAge: 0 }
            );
        });

        // ── Intercept submit: cek GPS dulu ──────────────────────────
        complaintForm?.addEventListener('submit', (e) => {
            e.preventDefault();

            const lat = document.getElementById('latitude').value;
            const lng = document.getElementById('longitude').value;

            if (!lat || !lng) {
                // Tidak ada koordinat → tampilkan modal konfirmasi
                const modal = document.getElementById('modal-gps-confirm');
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';

                // Tombol "Batal" → tutup modal, scroll ke tombol GPS
                document.getElementById('modal-btn-cancel-gps').onclick = () => {
                    modal.classList.add('hidden');
                    document.body.style.overflow = '';
                    const btnLoc = document.getElementById('btn-share-location');
                    btnLoc?.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    btnLoc?.classList.add('ring-2', 'ring-primary', 'ring-offset-2');
                    setTimeout(() => btnLoc?.classList.remove('ring-2', 'ring-primary', 'ring-offset-2'), 2500);
                };

                // Klik backdrop → tutup modal
                document.getElementById('modal-gps-backdrop').onclick = () => {
                    modal.classList.add('hidden');
                    document.body.style.overflow = '';
                };

                // Tombol "Tetap Kirim" → tutup modal lalu proses pengiriman
                document.getElementById('modal-btn-confirm-send').onclick = () => {
                    modal.classList.add('hidden');
                    document.body.style.overflow = '';
                    processFormSubmit();
                };
                return; // Hentikan, tunggu keputusan user
            }

            // Ada koordinat → langsung proses
            processFormSubmit();
        });

        // ── Fungsi inti pengiriman form ──────────────────────────────
        async function processFormSubmit() {
            // Reset semua error sebelumnya
            clearAllFieldErrors();
            document.getElementById('api-success-banner').classList.add('hidden');
            document.getElementById('api-error-banner').classList.add('hidden');

            // Loading state
            const originalBtnHTML = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<span class="material-symbols-outlined animate-spin">progress_activity</span> Mengirim...`;

            const lat = document.getElementById('latitude').value;
            const lng = document.getElementById('longitude').value;


            // Kumpulkan data form
            const payload = {
                nama_pelanggan: document.getElementById('nama_pelanggan').value.trim(),
                keluhan_id:     document.getElementById('keluhan_id').value,
                alamat:         document.getElementById('alamat').value.trim(),
                ...(lat && lng ? { latitude: parseFloat(lat), longitude: parseFloat(lng) } : {}),
            };

            try {
                // Kirim ke API endpoint
                const response = await fetch('/api/complaints', {
                    method:  'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept':       'application/json',
                    },
                    body: JSON.stringify(payload),
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    // ✅ SUKSES: Tampilkan notifikasi + kode tiket
                    showSuccessBanner(data.ticket_code);
                    complaintForm.reset(); // Kosongkan form
                    // Scroll ke atas agar banner terlihat
                    setTimeout(() => document.getElementById('lapor')?.scrollIntoView({ behavior: 'smooth', block: 'start' }), 200);
                } else if (response.status === 422 && data.errors) {
                    // ⚠️ VALIDASI ERROR: Tampilkan error per field
                    Object.entries(data.errors).forEach(([field, messages]) => {
                        showFieldError(field, messages[0]);
                    });
                    showErrorBanner(data.errors);
                } else {
                    // ❌ ERROR UMUM
                    showErrorBanner({ server: ['Terjadi kesalahan pada server. Silakan coba lagi.'] });
                }
            } catch (networkError) {
                // ❌ KONEKSI GAGAL
                showErrorBanner({ network: ['Koneksi bermasalah. Periksa jaringan Anda dan coba lagi.'] });
            } finally {
                // Kembalikan tombol submit ke kondisi semula
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHTML;
            }
        }
    </script>

</div>
