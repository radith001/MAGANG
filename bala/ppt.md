Baik, saya paham! Kita akan menyusun materi presentasi berdasarkan proyek **Sistem Informasi Manajemen Laporan Gangguan (Ticketing System)** yang ada pada folder `LaporanGangguanBRS`. 

Berikut adalah draf materi per *slide* yang bisa Anda masukkan ke dalam PowerPoint Anda:

---

### Slide 1: Latar Belakang
Peningkatan jumlah pelanggan internet pada BRS NET menuntut pengelolaan layanan pelanggan yang lebih efisien dan terpusat. Saat ini, pencatatan keluhan gangguan jaringan masih dilakukan secara manual menggunakan aplikasi pesan singkat (WhatsApp) dan *spreadsheet*. Sistem yang tidak terpusat ini menyulitkan pemantauan progres penanganan tiket, sehingga sulit membedakan status laporan yang masih *Open*, sedang *In Progress*, atau sudah *Resolved*. Di sisi lain, tidak adanya integrasi titik koordinat yang presisi sering kali membuat teknisi lapangan kesulitan dan membuang banyak waktu hanya untuk mencari alamat rumah pelanggan. Selain memperlambat waktu tanggap operasional, metode pencatatan konvensional ini juga rentan terhadap risiko kehilangan riwayat data dan duplikasi laporan keluhan.

---

### Slide 2: Tujuan Utama Sistem
*   **Sentralisasi & Digitalisasi:** Menyediakan satu *platform back-office* terpadu untuk mendigitalisasi alur laporan gangguan dari staf *Customer Service* kepada teknisi lapangan.
*   **Efisiensi Waktu Respons (SLA):** Mempercepat penanganan masalah jaringan melalui manajemen tiket yang terstruktur dan mudah dilacak.
*   **Integrasi Geospasial:** Mengintegrasikan titik koordinat pelanggan secara otomatis ke *Google Maps* untuk memandu mobilitas teknisi lapangan.
*   **Ketahanan Basis Data (*Scalability*):** Menerapkan arsitektur basis data terdistribusi (*Master-Slave Replication*) agar sistem tidak *down* saat diakses oleh banyak teknisi secara bersamaan.

---

### Slide 3: Teknologi Pengembangan
**Backend & Kerangka Kerja**
*   **Framework:** PHP 8 & Laravel 11
*   **Admin Panel:** Filament PHP (Integrasi TALL Stack: *Tailwind CSS, Alpine.js, Laravel, Livewire*)

**Database & Infrastruktur**
*   **Database:** MySQL / MariaDB (Relational)
*   **Arsitektur DB:** Terdistribusi (1 *Master*, 2 *Slave*) untuk pemisahan *Read/Write* (*Load Balancing*).
*   **Infrastruktur:** Docker Containerization (menggunakan `docker-compose`)
*   **Integrasi Eksternal:** *Google Maps URL Routing*

---

### Slide 4: Hasil & Pembahasan
*(Anda bisa membaginya ke dalam beberapa slide jika visualnya banyak)*

**1. Halaman Login & Dashboard Interaktif**
*   **Fungsi:** Gerbang keamanan utama dan ringkasan data statistik jumlah laporan.
*   📸 **Yang di-screenshot:** Halaman Login Filament dan halaman *Dashboard* utama setelah berhasil *login*.

**2. Manajemen Keluhan (Data Laporan)**
*   **Fungsi:** Pencatatan nama pelanggan, kode tiket otomatis, kategori keluhan, dan *badge* warna untuk status penanganan (*Open/Resolved*).
*   📸 **Yang di-screenshot:** Tabel "Daftar Nama Pelanggan" yang memperlihatkan kolom data lengkap beserta *badge* status yang berwarna.

**3. Integrasi Titik Lokasi (*Google Maps*)**
*   **Fungsi:** Memudahkan teknisi membuka rute perjalanan menuju rumah pelanggan hanya dengan satu kali klik.
*   📸 **Yang di-screenshot:** Tabel pelanggan yang menyorot tombol "📍 Lihat Lokasi", atau *screenshot* saat *tab* baru *Google Maps* terbuka dari sistem.

**4. Formulir Pembuatan Tiket Gangguan**
*   **Fungsi:** Memudahkan staf *Customer Service* untuk mendata identitas pelanggan, keluhan yang dialami, serta detail alamat dalam satu formulir digital yang rapi dan otomatis.
*   📸 **Yang di-screenshot:** Halaman form pengisian "Create Nama Pelanggan" / "Tambah Laporan Baru" pada sistem Filament yang menampilkan kolom-kolom isian dan *dropdown*.

---

### Slide 5: Kesimpulan
*   **Transformasi Alur Kerja Berhasil:** Penggantian pencatatan manual (*spreadsheet/WA*) menjadi *Ticketing System* digital yang terpusat dan transparan.
*   **Peningkatan Efisiensi Teknisi:** Fitur *direct link* ke *Google Maps* secara signifikan memangkas waktu pencarian lokasi gangguan fisik di lapangan.
*   **Ketangguhan Arsitektur (*High Availability*):** Pemisahan jalur beban baca/tulis data menggunakan metode *Master-Slave Database* dengan *Docker* menjamin aplikasi tetap cepat dan stabil tanpa risiko *server overload*.
*   **Antarmuka Modern & Cepat:** Implementasi *Filament Admin Panel (TALL Stack)* menyajikan *User Experience* (UX) yang sangat responsif layaknya *Single Page Application* tanpa mengorbankan performa *backend*.

---
Semua kerangka di atas sudah saya buat 100% selaras dengan kode, modul, dan fitur yang kita buat di dalam folder proyek `LaporanGangguanBRS` Anda! Silakan disalin ke dalam *slide* presentasi Anda.