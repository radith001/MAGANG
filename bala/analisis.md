Berikut adalah draf teks formal mengenai **Rancangan Konsep dan Kebutuhan Fitur Sistem Informasi Manajemen Gangguan Pelanggan BRS NET**. 

Anda bisa menyalin teks di bawah ini ke Ms. Word, lalu mengambil tangkapan layar (*screenshot*) dokumen tersebut untuk dijadikan lampiran bukti kegiatan pada tanggal 8 April 2026.

---

### **DOKUMEN RANCANGAN KONSEP & ANALISIS KEBUTUHAN SISTEM**
**Proyek:** Sistem Informasi Laporan Gangguan Jaringan Pelanggan (Ticketing System)
**Instansi:** BRS NET (PT Bina Raja Solusi)
**Tanggal Perancangan:** 8 April 2026

---

#### **I. KONSEP UTAMA SISTEM**
Sistem ini dirancang sebagai *platform back-office* berbasis web terintegrasi untuk mendigitalisasi alur penanganan gangguan jaringan internet pelanggan. Konsep utama sistem ini adalah **"Fast Ticket Dispatching & Geolocation Mapping"**, yang menghubungkan Staf Layanan Pelanggan (*Customer Service*) dengan Teknisi Lapangan secara *real-time*.

```
[Customer Service] ──(Input Tiket)──> [Sistem Terpusat (Laravel)] ──(Google Maps Link)──> [Teknisi Lapangan]
                                               │
                                       (Auto-Generate Code)
                                               │
                                               v
                                     [Database Master-Slave]
```

---

#### **II. KEBUTUHAN FUNGSIONAL SISTEM (FUNCTIONAL REQUIREMENTS)**

##### **1. Modul Autentikasi & Keamanan (Login & User)**
*   Sistem wajib menyediakan halaman masuk (*Login*) dengan enkripsi kata sandi yang aman.
*   Sistem menerapkan *Role-Based Access Control* (RBAC) untuk membatasi hak akses operasional (Admin, CS, dan Teknisi Lapangan).

##### **2. Modul Manajemen Tiket Gangguan (Data Pelanggan)**
*   **Auto-Generate Kode Tiket:** Setiap tiket keluhan baru yang dibuat harus mendapatkan kode tiket unik secara otomatis untuk mempermudah identifikasi masalah.
*   **Pencatatan Keluhan Jaringan:** Mengakomodasi pencatatan nama pelanggan, kontak, alamat lengkap, tipe keluhan (misal: *Red Los*, *Koneksi Lambat*, *Router Mati*), dan status penanganan.
*   **Indikator Status Visual:** Menyediakan indikator visual (*badge* warna) untuk membedakan progres tiket secara sekilas:
    *   `Open` (Merah): Tiket baru dibuat dan belum ditangani.
    *   `In Progress` (Kuning): Masalah sedang dalam proses perbaikan oleh teknisi.
    *   `Resolved` (Hijau): Masalah telah selesai ditangani.

##### **3. Modul Integrasi Geospasial (Google Maps API)**
*   Sistem mampu menyimpan koordinat letak geografis rumah pelanggan (*Latitude* & *Longitude*).
*   Sistem menyediakan tombol pintasan langsung (*Lihat Lokasi*) yang secara otomatis membuka rute penunjuk arah ke rumah pelanggan via aplikasi *Google Maps* di tab browser baru.

##### **4. Modul Master Data (Daftar Keluhan & Status)**
*   Menyediakan halaman konfigurasi untuk menambah, mengubah, atau menghapus daftar master jenis gangguan dan opsi status tiket yang dapat dipilih pada form input utama.

---

#### **III. KEBUTUHAN NON-FUNGSIONAL (NON-FUNCTIONAL REQUIREMENTS)**

*   **Availability & Performance:** Basis data harus dirancang dengan arsitektur terdistribusi (*Master-Slave Replication*) agar pemrosesan data tetap cepat dan stabil tanpa terjadi *overload* basis data pada saat banyak teknisi lapangan mengakses peta lokasi secara bersamaan.
*   **Usability:** Antarmuka aplikasi web dirancang responsif dan ramah pengguna (*user-friendly*) menggunakan kerangka kerja admin modern agar mudah dioperasikan dari perangkat komputer kantor maupun *smartphone* teknisi lapangan.
*   **Data Integrity:** Mencegah terjadinya duplikasi data tiket atau nama pelanggan dengan menerapkan validasi keunikan (*unique constraint*) pada kolom kode tiket.