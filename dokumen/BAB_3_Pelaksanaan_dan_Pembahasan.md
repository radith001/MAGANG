# BAB III
# PELAKSANAAN DAN PEMBAHASAN

## 3.1 Analisis Sistem
Selama pelaksanaan kegiatan magang di BRS NET, penulis melakukan observasi langsung terhadap alur kerja layanan pelanggan dan penanganan gangguan (*incident management*). Sistem pencatatan keluhan yang berjalan sebelumnya belum sepenuhnya terpusat; keluhan yang masuk dari pelanggan masih dicatat menggunakan *spreadsheet* manual atau aplikasi pesan singkat. Hal ini menyebabkan proses pelacakan (*tracking*) status gangguan menjadi kurang efisien, rawan terjadi kehilangan data, serta menyulitkan teknisi dalam menemukan titik lokasi pelanggan.

Berdasarkan permasalahan tersebut, penulis mengusulkan dan merancang sebuah Sistem Informasi Laporan Gangguan (*Ticketing System*) berbasis web. Sistem ini dirancang untuk mengotomatisasi pencatatan keluhan dengan memberikan setiap laporan sebuah **Kode Ticket** unik. Sistem ini juga terintegrasi dengan tabel master data (seperti jenis Keluhan dan Status penanganan) serta memiliki tautan langsung ke *Google Maps* untuk mempermudah teknisi melacak lokasi pelanggan. Dengan adanya sistem ini, manajemen keluhan menjadi lebih terstruktur, transparan, dan mempercepat *Service Level Agreement* (SLA) perbaikan gangguan.

## 3.2 Metodologi Pengembangan Sistem
Dalam pengembangan *ticketing system* ini, penulis menggunakan metode *Prototype*. Metode ini dipilih karena memungkinkan pengembangan secara interaktif antara pengembang dan *stakeholder* (pihak perusahaan). Pengembangan dilakukan secara bertahap, dimulai dari pengumpulan kebutuhan, pembuatan *prototype* awal antarmuka menggunakan *framework* Laravel dan Filament, evaluasi fitur-fitur pendataan pelanggan, hingga penyempurnaan sistem secara keseluruhan.

## 3.3 Perancangan Sistem
Perancangan sistem dibangun menggunakan pendekatan *Model-View-Controller* (MVC) yang melekat pada *framework* Laravel. Struktur basis data sistem ini berpusat pada entitas pelaporan gangguan yang terdiri dari beberapa tabel utama, yaitu:
- **Tabel `users`**: Menyimpan data autentikasi admin dan teknisi.
- **Tabel `keluhans`**: Menyimpan master data jenis-jenis gangguan jaringan.
- **Tabel `statuses`**: Menyimpan master data status perbaikan (misal: *Open, In Progress, Resolved*).
- **Tabel `nama_pelanggans`**: Merupakan tabel transaksional utama (berfungsi sebagai tiket) yang menyimpan relasi ID Pelanggan, Kode Tiket, Alamat, Koordinat/Link Lokasi, Jenis Keluhan, dan Status saat ini.

## 3.4 Implementasi Sistem
Tahap implementasi merupakan realisasi dari perancangan arsitektur dan basis data ke dalam bentuk kode program berbasis web. Sistem ini dikembangkan menggunakan *framework* Laravel dengan implementasi antarmuka *back-office* menggunakan **Filament Admin Panel**. Penggunaan Filament secara signifikan mempercepat pembuatan modul *CRUD (Create, Read, Update, Delete)* dengan tampilan yang modern dan responsif.

### 3.4.1 Integrasi Web dan Antarmuka Pengguna
Implementasi antarmuka dibangun terpusat di dalam lingkungan Filament Admin. Pengguna yang mengakses sistem harus melewati proses *login* terlebih dahulu. Autentikasi dan antarmuka *dashboard* dikelola secara otomatis oleh *core* Filament yang menawarkan pengalaman pengguna yang dinamis menggunakan integrasi *Livewire* dan *Alpine.js*.
> **Catatan Screenshot:** *Nanti Anda dapat melampirkan screenshot halaman Login Filament dan halaman Dashboard Utama di sini.*

### 3.4.2 Implementasi Modul Tiket Gangguan (Nama Pelanggan)
Modul ini merupakan *core function* dari aplikasi, direpresentasikan melalui `NamaPelanggansResource`. Pada halaman daftar tiket, sistem menampilkan tabel interaktif yang dikonfigurasi melalui `NamaPelanggansTable.php`. Tabel ini menampilkan kolom-kolom krusial seperti:
- **Kode Ticket:** Sebagai identitas unik laporan.
- **Nama Pelanggan & Alamat:** Informasi detail pelapor.
- **Keluhan & Status:** Menggunakan format *badge* berwarna untuk memudahkan identifikasi visual kondisi masalah.
- **Lokasi (Google Maps Link):** Tombol aksi yang secara otomatis membuka *tab* baru ke Google Maps berdasarkan URL yang diinputkan.

Implementasi tabel ini memanfaatkan *class* `TextColumn` dari Filament yang mendukung fitur pencarian (*searchable*) dan pengurutan data (*sortable*), sehingga staf administrasi dapat dengan cepat menemukan laporan tertentu.

![Tampilan Antarmuka Daftar Tiket Pelanggan](masukkan_nama_file_gambar_disini.png)
<p align="center"><b>Gambar 3.1 Tampilan Antarmuka Daftar Tiket Pelanggan</b></p>

### 3.4.3 Implementasi Master Data (Keluhan dan Status)
Untuk mencegah kesalahan pengetikan (*typo*) dan menstandarisasi pelaporan, sistem dilengkapi dengan manajemen Master Data untuk **Keluhan** (`KeluhanResource`) dan **Status** (`StatusResource`). Administrator dapat menambah jenis gangguan baru (misal: *Koneksi Terputus, Kabel Putus, Router Mati*) dan jenis status. Data ini direlasikan (*belongsTo*) dengan tabel utama tiket gangguan, sehingga pada saat membuat tiket baru, pengguna cukup memilih opsi dari *dropdown*.

![Tampilan Antarmuka Master Data](masukkan_nama_file_gambar_disini.png)
<p align="center"><b>Gambar 3.2 Tampilan Antarmuka Pengelolaan Master Data (Keluhan / Status)</b></p>

### 3.4.4 Manajemen Hak Akses User
Sistem memiliki modul manajemen `User` untuk mengatur akun pegawai (seperti *admin* dan teknisi) yang memiliki akses ke panel. Modul ini memastikan bahwa setiap tindakan penambahan atau perubahan status tiket dilakukan oleh pihak yang berwenang, sehingga menjaga akuntabilitas *log* pekerjaan.

## 3.5 Pengujian Sistem
Pengujian sistem dilakukan dengan menggunakan metode *Black Box Testing*. Fokus pengujian berada pada kesesuaian fungsionalitas aplikasi dengan kebutuhan pengguna, tanpa perlu melihat struktur *source code* secara internal.

### 3.5.1 Pengujian Fitur Login dan Autentikasi
Skenario pengujian dilakukan dengan memasukkan email dan *password* yang valid serta tidak valid.
- **Hasil:** Sistem berhasil mencegah masuknya pengguna yang tidak memiliki kredensial valid, dan langsung mengarahkan pengguna valid ke dalam halaman *Dashboard* Filament. Fitur *logout* dan perlindungan sesi berjalan dengan sempurna (LULUS).

### 3.5.2 Pengujian Modul Pembuatan Tiket Baru
Pengujian difokuskan pada pengisian *form* pembuatan tiket baru pada tabel `nama_pelanggans`, di mana *field* wajib harus diisi.
- **Hasil:** Sistem berhasil memvalidasi *form* kosong (menampilkan pesan *error* wajib isi). Saat data dimasukkan secara lengkap beserta tautan lokasi *Google Maps*, sistem berhasil menyimpan data ke dalam basis data dan langsung menampilkannya di halaman tabel (LULUS).

### 3.5.3 Pengujian Pembaruan Status dan Integrasi Lokasi
Pengujian dilakukan untuk menyimulasikan proses yang dilakukan oleh teknisi, yaitu memperbarui kolom status (misalnya dari *Open* menjadi *Resolved*) dan mengklik tombol tautan peta.
- **Hasil:** Perubahan status menggunakan fitur Edit dari Filament berhasil mengubah label *badge* status di halaman utama seketika. Tautan `google_maps_link` berhasil membuka jendela baru (*shouldOpenInNewTab*) yang mengarah tepat pada koordinat pelanggan yang dituju (LULUS).
