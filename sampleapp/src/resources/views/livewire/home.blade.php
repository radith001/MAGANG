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

    {{-- ======================= FLASH: SUKSES LAPORAN ======================= --}}
    @if(session('ticket_success'))
    <div id="success-banner" class="animate-fade-in-down fixed top-16 left-0 right-0 z-40 mx-auto max-w-2xl mt-3 px-md">
        <div class="bg-green-50 border border-green-200 rounded-xl p-md flex items-start gap-sm shadow-lg">
            <span class="material-symbols-outlined text-green-600 mt-0.5" style="font-variation-settings:'FILL' 1;">check_circle</span>
            <div class="flex-1">
                <p class="font-label-sm text-label-sm font-bold text-green-800">Laporan Gangguan Berhasil Dikirim!</p>
                <p class="font-body-md text-body-md text-green-700 mt-1">
                    Simpan kode tiket Anda:
                    <strong class="font-code-xs text-code-xs tracking-widest bg-green-100 px-2 py-1 rounded text-green-900 ml-1 select-all">
                        {{ session('ticket_success') }}
                    </strong>
                </p>
                <p class="font-label-sm text-label-sm text-green-600 mt-1">Gunakan kode ini untuk memantau status perbaikan di bagian "Cek Status".</p>
            </div>
            <button onclick="document.getElementById('success-banner').remove()" class="text-green-500 hover:text-green-700 transition-colors ml-auto flex-shrink-0">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    </div>
    @endif

    {{-- ======================= FLASH: ERROR VALIDASI ======================= --}}
    @if($errors->any())
    <div id="error-banner" class="animate-fade-in-down fixed top-16 left-0 right-0 z-40 mx-auto max-w-2xl mt-3 px-md">
        <div class="bg-red-50 border border-red-200 rounded-xl p-md flex items-start gap-sm shadow-lg">
            <span class="material-symbols-outlined text-red-600 mt-0.5" style="font-variation-settings:'FILL' 1;">error</span>
            <div class="flex-1">
                <p class="font-label-sm text-label-sm font-bold text-red-800">Terdapat kesalahan pada formulir:</p>
                <ul class="mt-1 list-disc list-inside space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li class="font-body-md text-body-md text-red-700">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button onclick="document.getElementById('error-banner').remove()" class="text-red-500 hover:text-red-700 transition-colors ml-auto flex-shrink-0">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    </div>
    @endif

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
                        <form id="complaint-form" action="{{ route('complaint.store') }}" method="POST" class="space-y-sm">
                            @csrf
                            {{-- Nama Pelanggan --}}
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="nama_pelanggan">
                                    Nama Pelanggan <span class="text-error">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-outline">
                                        <span class="material-symbols-outlined text-[18px]">person</span>
                                    </span>
                                    <input class="block w-full pl-10 pr-3 py-2 bg-surface-container-lowest border @error('nama_pelanggan') border-error @else border-outline-variant @enderror rounded-lg text-on-surface focus:ring-2 focus:ring-primary-container focus:border-primary-container transition-shadow shadow-sm"
                                           id="nama_pelanggan" name="nama_pelanggan" placeholder="Contoh: Budi Santoso"
                                           value="{{ old('nama_pelanggan') }}" required type="text">
                                </div>
                                @error('nama_pelanggan')
                                    <p class="mt-1 font-label-sm text-label-sm text-error">{{ $message }}</p>
                                @enderror
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
                                    <select class="block w-full pl-10 pr-10 py-2 bg-surface-container-lowest border @error('keluhan_id') border-error @else border-outline-variant @enderror rounded-lg text-on-surface focus:ring-2 focus:ring-primary-container focus:border-primary-container transition-shadow shadow-sm appearance-none"
                                            id="keluhan_id" name="keluhan_id" required>
                                        <option disabled {{ old('keluhan_id') ? '' : 'selected' }} value="">Pilih jenis kendala...</option>
                                        @foreach($keluhans as $keluhan)
                                            <option value="{{ $keluhan->id }}" {{ old('keluhan_id') == $keluhan->id ? 'selected' : '' }}>
                                                {{ $keluhan->nama_keluhan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-outline">
                                        <span class="material-symbols-outlined text-[18px]">expand_more</span>
                                    </span>
                                </div>
                                @error('keluhan_id')
                                    <p class="mt-1 font-label-sm text-label-sm text-error">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- Alamat --}}
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="alamat">
                                    Alamat Lengkap Pemasangan <span class="text-error">*</span>
                                </label>
                                <textarea class="block w-full px-3 py-2 bg-surface-container-lowest border @error('alamat') border-error @else border-outline-variant @enderror rounded-lg text-on-surface focus:ring-2 focus:ring-primary-container focus:border-primary-container transition-shadow shadow-sm resize-none"
                                          id="alamat" name="alamat" placeholder="Masukkan alamat lengkap beserta patokan rumah..." required rows="3">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <p class="mt-1 font-label-sm text-label-sm text-error">{{ $message }}</p>
                                @enderror
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
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-btn')?.addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
        document.getElementById('mobile-menu')?.querySelectorAll('a').forEach(l => l.addEventListener('click', () => document.getElementById('mobile-menu').classList.add('hidden')));

        // Active Nav Link via IntersectionObserver
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

        // Auto-scroll after success
        @if(session('ticket_success'))
            setTimeout(() => document.getElementById('lapor')?.scrollIntoView({ behavior: 'smooth', block: 'start' }), 300);
        @endif
        @if($errors->any())
            setTimeout(() => document.getElementById('lapor')?.scrollIntoView({ behavior: 'smooth', block: 'start' }), 300);
        @endif
        @if($searchedCode)
            setTimeout(() => document.getElementById('cek-status')?.scrollIntoView({ behavior: 'smooth', block: 'start' }), 300);
        @endif

        // Auto-dismiss banners after 8s
        ['success-banner','error-banner'].forEach(id => {
            const el = document.getElementById(id);
            if (el) setTimeout(() => el.remove(), 8000);
        });
    </script>

</div>
