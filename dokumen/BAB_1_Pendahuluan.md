# BAB I
# PENDAHULUAN

## 1.1 Latar Belakang

Perkembangan teknologi informasi dan komunikasi di era globalisasi saat ini telah menempatkan konektivitas internet sebagai salah satu pilar utama pendukung kelancaran berbagai sektor kehidupan, mulai dari ekonomi, pendidikan, hingga pelayanan publik. Peran *Internet Service Provider* (ISP) menjadi sangat vital dalam menjamin ketersediaan akses data yang stabil dan berkelanjutan demi mendukung aktivitas operasional sehari-hari masyarakat (Nurajizah et al., 2020). Namun, seiring dengan pesatnya pertumbuhan jumlah pengguna internet, tantangan operasional yang dihadapi oleh penyedia layanan juga semakin kompleks, terutama dalam menjaga kestabilan kualitas layanan (*Quality of Service*) dan meminimalkan waktu henti (*downtime*) jaringan (Sulaiman & Priambodo, 2024). Oleh karena itu, penanganan insiden jaringan dan manajemen gangguan menjadi faktor penentu yang sangat krusial dalam keberhasilan menjaga kepuasan serta loyalitas pelanggan pada industri telekomunikasi (Octavian & Purnama, 2024).

Untuk menjaga efektivitas penanganan keluhan pelanggan, perusahaan ISP memerlukan sistem manajemen gangguan yang terstruktur, salah satunya melalui implementasi *ticketing system* (sistem pelaporan gangguan berbasis tiket). Variabel utama dalam sistem ini melibatkan pencatatan data identitas pelanggan, jenis kendala teknis yang dihadapi, serta proses pemantauan status penyelesaian masalah secara terintegrasi (Christanto & Somya, 2023). Secara konseptual, penanganan keluhan berfungsi sebagai jembatan komunikasi timbal balik yang krusial antara pelanggan dengan divisi teknis perusahaan guna melakukan eskalasi masalah secara presisi (Putra et al., 2025). Sayangnya, kompleksitas operasional ini sering kali tidak didukung oleh aplikasi manajemen keluhan yang andal, sehingga penanganan masalah di lapangan menjadi lambat dan tidak terdokumentasi dengan baik (Tarmidzi, 2024). Akibatnya, terjadi penurunan kualitas layanan pelanggan akibat tidak adanya pembagian tugas yang jelas serta tidak adanya riwayat pelaporan gangguan yang komprehensif.

Berdasarkan hasil observasi awal selama pelaksanaan magang di BRS NET, ditemukan adanya kesenjangan yang cukup signifikan antara kondisi ideal sistem manajemen gangguan dengan realitas operasional di lapangan. Alur pelaporan gangguan di BRS NET saat ini masih didominasi oleh proses konvensional, di mana aduan pelanggan dicatat secara manual menggunakan aplikasi pesan singkat (WhatsApp) atau lembar kerja (*spreadsheet*) terpisah (Rosmalina et al., 2025). Hal tersebut menimbulkan dampak buruk berupa sulitnya melacak progres perbaikan, tidak adanya nomor referensi tiket yang unik, serta rentannya terjadi kehilangan data pengaduan (Sinlae et al., 2024). Lebih lanjut, ketiadaan integrasi sistem informasi geografis atau tautan koordinat lokasi pelanggan sering kali menghambat tim teknisi lapangan dalam menemukan alamat pelanggan secara cepat. Keterbatasan-keterbatasan ini menunjukkan bahwa mekanisme pengolahan data keluhan pelanggan di BRS NET membutuhkan optimalisasi berbasis teknologi agar data yang diolah dapat disajikan secara terpusat, real-time, dan akurat (Pratama & Rizal, 2026).

Upaya untuk mengatasi permasalahan manajemen keluhan melalui digitalisasi sistem *helpdesk* telah banyak dikaji dalam berbagai penelitian terdahulu yang relevan. Banyak peneliti yang memfokuskan kajian mereka pada perancangan aplikasi pelaporan gangguan menggunakan kerangka kerja (*framework*) berbasis web untuk meningkatkan efisiensi administrasi internal instansi (Nugroho dkk., 2023; Azkiyatun et al., 2023; Wahab & Bhakti, 2026). Penelitian-penelitian tersebut secara komparatif menunjukkan bahwa implementasi *framework* MVC (Model-View-Controller) seperti Laravel mampu mempercepat proses pembangunan basis data relasional serta mempermudah integrasi sistem otorisasi pengguna. Temuan-temuan ini menegaskan bahwa otomatisasi pelaporan berbasis web terbukti efektif dalam memangkas alur birokrasi penanganan aduan dan meningkatkan transparansi layanan.

Penelitian terdahulu lainnya juga menyoroti pentingnya keandalan infrastruktur dan efisiensi waktu respon tim lapangan dalam siklus penyelesaian kendala. Integrasi modul pemetaan lokasi geografis dan otomatisasi pembaruan status laporan secara instan dinilai memberikan dampak signifikan dalam mempercepat waktu resolusi gangguan (Puranik et al., 2025). Selain itu, kemudahan pengelolaan data pelanggan serta validasi data input di sisi server terbukti mampu menekan angka kesalahan data pengaduan hingga tingkat minimum. Penggunaan teknologi *full-stack* modern dan otomatisasi proses *deployment* juga diidentifikasi sebagai faktor penting yang menjamin kestabilan dan kemudahan pemeliharaan aplikasi dalam jangka panjang (Drofa, 2025). Secara konsisten, literatur-literatur ini membuktikan bahwa keberadaan *ticketing system* yang dinamis mampu mendongkrak performa layanan operasional perusahaan penyedia jasa telekomunikasi secara berkelanjutan (Kharisma et al., 2023).

Meskipun penelitian terdahulu telah banyak memberikan solusi, sebagian besar sistem yang dikembangkan masih memiliki keterbatasan dalam hal fleksibilitas pengembangan panel admin dan kemudahan kustomisasi fitur antarmuka bagi teknisi di lapangan (Tarmidzi, 2024). Beberapa sistem *helpdesk* tradisional membutuhkan penulisan kode antarmuka yang sangat kompleks untuk sekadar membedakan hak akses dan memperbarui status laporan secara interaktif (Sinlae et al., 2024). Selain itu, masih sedikit penelitian yang membahas integrasi pustaka admin panel dinamis berskala ringan seperti Filament Admin Panel dalam mengelola data pelaporan gangguan secara *real-time* (Pratama & Rizal, 2026). Oleh karena itu, terdapat kebutuhan yang mendesak untuk merancang sistem informasi laporan gangguan yang menggabungkan kepraktisan kustomisasi antarmuka dan kekuatan arsitektur Laravel secara terpadu.

Berdasarkan kesenjangan (*gap*) penelitian tersebut, kebaruan (*novelty*) dari kegiatan magang ini terletak pada pengembangan prototipe *ticketing system* yang mengintegrasikan *framework* Laravel dengan Filament Admin Panel dan Livewire untuk menciptakan antarmuka pelaporan gangguan yang sangat dinamis, ringan, dan interaktif. Sistem ini dikembangkan secara khusus untuk BRS NET dengan fitur pelacakan tiket unik, integrasi penunjuk arah peta lokasi pelanggan secara instan, serta representasi status penanganan menggunakan penanda visual dinamis. Tujuan utama dari penelitian magang ini adalah merancang dan mengimplementasikan prototipe "Sistem Informasi Laporan Gangguan (Ticketing System) Berbasis Web Menggunakan Framework Laravel pada BRS NET". Dengan terwujudnya sistem ini, diharapkan alur pengelolaan keluhan pelanggan di BRS NET dapat terdokumentasi dengan baik, mempercepat waktu penanganan teknisi, dan meminimalkan kendala operasional yang dihadapi perusahaan.


## 1.2 Identifikasi Masalah

Berdasarkan hasil observasi terhadap proses bisnis dan pengelolaan keluhan di BRS NET, dapat diidentifikasi beberapa permasalahan sebagai berikut:
1. Proses pencatatan data nama pelanggan dan keluhan jaringan masih belum sepenuhnya terintegrasi dalam satu platform khusus, sehingga rentan terjadi duplikasi atau hilangnya data laporan.
2. Belum tersedianya sistem terpusat yang memfasilitasi pelacakan status penanganan gangguan secara *real-time*, sehingga koordinasi antara layanan pelanggan dan teknisi menjadi kurang optimal.
3. Evaluasi kinerja penanganan gangguan sulit dilakukan karena riwayat keluhan pelanggan dan dokumentasi perbaikan masih tersebar di berbagai media pencatatan (seperti aplikasi pesan instan atau *spreadsheet* manual).

## 1.3 Rumusan Masalah

Berdasarkan identifikasi masalah yang telah diuraikan, maka rumusan masalah dalam penyusunan laporan ini adalah:
1. Bagaimana merancang dan mengimplementasikan prototipe Sistem Informasi Laporan Gangguan (*Ticketing System*) berbasis web menggunakan *framework* Laravel di BRS NET?
2. Bagaimana sistem yang dibangun mampu mempermudah staf dalam mengelola data pelanggan, mencatat detail keluhan, serta memantau status penyelesaian masalah secara terstruktur?

## 1.4 Batasan Masalah

Agar pembahasan dan pengerjaan tetap fokus dan terarah, batasan masalah pada kegiatan magang ini adalah:
1. Sistem dibangun berbasis web menggunakan *framework* Laravel (PHP) dengan manajemen basis data MySQL.
2. Fitur utama dalam aplikasi dibatasi pada modul pencatatan nama pelanggan, pengelolaan data keluhan, serta pembaruan status laporan (misalnya: *pending*, *on progress*, *resolved*).
3. Sistem ini secara spesifik dirancang untuk digunakan oleh pihak internal BRS NET (admin atau staf teknis) dan tidak mencakup antarmuka mandiri (*self-service portal*) untuk pelanggan akhir.
4. Pengujian sistem terbatas pada pengujian fungsionalitas utama (*Black Box Testing*) untuk memastikan setiap fitur berjalan dengan baik di lingkungan pengembangan lokal (*local development*).

## 1.5 Tujuan Magang

Tujuan yang ingin dicapai dari pelaksanaan kegiatan magang ini adalah:
1. Mengaplikasikan ilmu pengetahuan dan keterampilan di bidang rekayasa perangkat lunak dan pengembangan web yang telah diperoleh selama perkuliahan ke dalam lingkungan kerja nyata.
2. Mengidentifikasi kebutuhan dan menganalisis permasalahan yang berkaitan dengan manajemen pelaporan gangguan jaringan pada operasional harian BRS NET.
3. Merancang dan membangun prototipe sistem Laporan Gangguan berbasis web sebagai solusi konseptual guna meningkatkan efisiensi dan transparansi penanganan keluhan di BRS NET.

## 1.6 Manfaat Magang

**Bagi Penulis (Mahasiswa)**
Kegiatan magang ini bermanfaat bagi penulis dalam mendapatkan pengalaman praktis merancang sistem informasi secara komprehensif di dunia industri. Penulis juga dapat meningkatkan kemampuan analisis, *problem-solving*, dan *hard-skill* pemrograman, khususnya dalam penggunaan *framework* Laravel.

**Bagi Instansi (BRS NET)**
Memberikan gagasan dan solusi teknis berupa prototipe *ticketing system* yang dapat menjadi referensi instansi dalam mendigitalisasi proses pelaporan gangguan, sehingga ke depannya pengelolaan data keluhan dan pelacakan status perbaikan menjadi lebih efektif dan terpusat.

**Bagi Universitas**
Menjadi sarana penguatan hubungan kolaboratif antara institusi pendidikan dan dunia industri. Laporan yang dihasilkan juga dapat berfungsi sebagai bahan evaluasi kurikulum untuk memastikan kompetensi lulusan relevan dengan kebutuhan teknologi dan bisnis terkini.

## 1.7 Tempat dan Waktu Pelaksanaan

Pelaksanaan kegiatan magang dilakukan di **BRS NET** sebagai institusi penyedia layanan internet. Kegiatan magang berlangsung selama 6 (enam) bulan, terhitung mulai dari **1 Agustus 2025 hingga 28 Januari 2026**. Selama periode tersebut, penulis terlibat dalam observasi proses bisnis penanganan gangguan, analisis kebutuhan perangkat lunak, serta perancangan dan implementasi sistem Laporan Gangguan berbasis web. *(Catatan: Tanggal disesuaikan dengan contoh format dokumen).*

## 1.8 Sistematika Penulisan Laporan

Laporan magang ini disusun ke dalam beberapa bab agar pembahasan disajikan secara sistematis, runtut, dan mudah dipahami. Adapun sistematika penulisannya adalah sebagai berikut:

**BAB I Pendahuluan**
Bab ini menguraikan latar belakang masalah, identifikasi masalah, rumusan masalah, batasan masalah, tujuan magang, manfaat magang, waktu dan tempat pelaksanaan, serta sistematika penulisan laporan.

**BAB II Gambaran Umum Instansi dan Landasan Teori**
Bab ini membahas profil BRS NET beserta struktur organisasinya. Selain itu, bab ini juga menyajikan landasan teori dan konsep-konsep teknologi yang digunakan (seperti sistem informasi web, *framework* Laravel, dan basis data) sebagai pijakan perancangan sistem.

**BAB III Pelaksanaan dan Pembahasan**
Bab ini memaparkan secara rinci pelaksanaan kegiatan magang, mulai dari analisis sistem yang sedang berjalan, usulan otomatisasi/digitalisasi, hingga perancangan sistem (*UML/ERD*) dan implementasi modul-modul utama seperti pengelolaan pelanggan, keluhan, dan status.

**BAB IV Hasil dan Pembahasan Lanjutan**
Bab ini berfokus pada hasil pengujian fungsional perangkat lunak yang telah dibangun (menggunakan *Black Box Testing*). Bab ini juga mengevaluasi sejauh mana sistem yang dikembangkan berhasil menjawab permasalahan yang diidentifikasi.

**BAB V Penutup**
Bab ini berisi kesimpulan dari keseluruhan kegiatan perancangan dan implementasi sistem pelaporan gangguan selama masa magang, serta saran konstruktif untuk pengembangan sistem lebih lanjut di masa mendatang.
