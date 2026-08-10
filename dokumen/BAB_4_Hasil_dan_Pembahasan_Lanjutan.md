# BAB IV
# HASIL dan PEMBAHASAN LANJUTAN

## 4.1 Hasil Pengujian Fungsional
Pengujian fungsional dilakukan untuk memastikan bahwa seluruh fitur pada sistem *ticketing* pelaporan gangguan berjalan sesuai dengan kebutuhan yang telah dirancang. Metode pengujian yang digunakan adalah *Black Box Testing*, di mana pengujian difokuskan pada fungsi sistem tanpa melihat struktur kode program secara internal. Pengujian dilakukan dengan memberikan berbagai skenario *input* untuk melihat apakah sistem memberikan *output* yang sesuai dengan yang diharapkan.

Setiap modul diuji berdasarkan skenario penggunaan yang umum dilakukan oleh admin maupun teknisi. Fitur yang diuji meliputi otorisasi *login*, pembuatan dan pengubahan status tiket gangguan, manajemen master data keluhan dan status, pengelolaan pengguna (*user*), serta pengujian tombol aksi penunjuk arah ke *Google Maps*. Hasil pengujian menunjukkan bahwa seluruh fitur utama sistem dapat berjalan dengan baik tanpa mengalami kesalahan fungsional yang signifikan.

Berikut merupakan tabel hasil pengujian fungsional sistem:

**Tabel 4.1 Hasil Pengujian Fungsional Sistem**

| NO | Fitur yang Diuji | Skenario Pengujian | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|---|
| 1 | *Login* Sistem | Mengisi *email* dan *password* yang valid | Sistem mengarahkan ke halaman *Dashboard* Filament | *Dashboard* berhasil ditampilkan | LULUS |
| 2 | *Login* Sistem | Mengisi *email* atau *password* salah | Sistem menolak akses dan menampilkan pesan *error* | Pesan kesalahan kredensial muncul | LULUS |
| 3 | Tambah Tiket Gangguan | Membuat tiket keluhan baru dengan mengisi data pelanggan, alamat, dan keluhan secara lengkap | Data tiket tersimpan dan muncul di tabel `NamaPelanggans` | Data berhasil tersimpan dan tampil di tabel | LULUS |
| 4 | *Update* Status Tiket | Mengubah status tiket pada *form edit* (misal: dari *Open* ke *In Progress*) | Status tiket diperbarui di *database* dan warna *badge* pada tabel berubah | Status dan visualisasi *badge* berhasil di-*update* | LULUS |
| 5 | Tautan *Google Maps* | Mengklik tombol "📍 Lihat Lokasi" pada baris data tiket | Sistem membuka *tab* peramban baru yang memuat *Google Maps* sesuai tautan koordinat | *Google Maps* berhasil termuat di *tab* baru | LULUS |
| 6 | Kelola Master Data | Menambahkan atau menghapus entitas Keluhan/Status di Master Data | Opsi *dropdown* keluhan/status pada *form* pembuatan tiket akan langsung menyesuaikan | Perubahan pada Master Data langsung terefleksi | LULUS |
| 7 | Manajemen *User* | *Admin* menghapus kredensial teknisi/pegawai lain | Akun teknisi terhapus dan tidak bisa *login* kembali | Data *user* berhasil terhapus secara permanen | LULUS |

Dari hasil pengujian yang telah dilakukan, dapat disimpulkan bahwa seluruh fitur utama sistem telah berjalan sesuai dengan spesifikasi yang dirancang. Tidak ditemukan kesalahan logika maupun *error* sistem yang menghambat penggunaan aplikasi.

### 4.1.1 Pengujian *Login* (Kredensial Valid)
Pengujian pertama pada modul autentikasi dilakukan untuk memastikan bahwa sistem mampu mengenali kredensial pengguna secara akurat. Pengujian ini sangat penting karena gerbang *login* merupakan lapisan pertahanan utama yang mencegah pihak tidak berwenang mengakses data sensitif pelanggan. Pada skenario ini, pengguna memasukkan kombinasi *email* dan *password* yang valid dan telah terdaftar di dalam basis data sistem.

> **Catatan Screenshot:** *Ambil screenshot halaman "Dashboard" utama Filament setelah Anda berhasil login.*

Berdasarkan hasil pengujian, sistem merespons input yang valid dengan melakukan inisialisasi sesi (*session*) secara aman dan langsung mengarahkan pengguna ke halaman *Dashboard* utama. Tampilan *Dashboard* yang berhasil dimuat membuktikan bahwa integrasi antara komponen antarmuka pengguna (*front-end*) dan logika autentikasi *Laravel* (*back-end*) berjalan dengan sempurna tanpa hambatan.

### 4.1.2 Pengujian *Login* (Kredensial Salah)
Pengujian selanjutnya berfokus pada mekanisme perlindungan sistem ketika menerima *input* kredensial yang salah. Skenario ini menyimulasikan situasi di mana pengguna salah mengetikkan *password* atau mencoba memasukkan *email* yang belum terdaftar. Tujuannya adalah untuk menguji apakah sistem memiliki penanganan pesan kesalahan (*error handling*) yang informatif namun tetap menjaga keamanan dari serangan peretasan.

> **Catatan Screenshot:** *Ambil screenshot halaman Login saat muncul notifikasi error berwarna merah (misalnya "These credentials do not match our records.").*

Hasil pengujian menunjukkan bahwa sistem secara otomatis memblokir akses dan mengembalikan pengguna ke halaman *login* yang sama. Bersamaan dengan itu, sistem menampilkan notifikasi kesalahan berwarna merah tepat di bawah kolom *input*, yang memberikan visibilitas yang jelas kepada pengguna bahwa proses autentikasi gagal. Hal ini menunjukkan bahwa fungsi pelindung bawaan kerangka kerja telah berjalan sesuai dengan prosedur keamanan standar.

### 4.1.3 Pengujian Tambah Tiket Gangguan
Pengujian ini bertujuan untuk menguji kemampuan fungsional sistem dalam merekam data pelaporan gangguan baru secara komprehensif. Sebagai fitur yang paling krusial, kelancaran proses penambahan data (*Create*) menjadi indikator kesuksesan operasional aplikasi. Administrator atau teknisi melakukan pengujian dengan membuka formulir penambahan data, lalu mengisi berbagai *field* informasi seperti Nama Pelanggan, Kode Tiket, jenis keluhan, serta melampirkan *link Google Maps*.

> **Catatan Screenshot:** *Ambil screenshot saat Anda sedang mengisi Form penambahan data "Nama Pelanggan" / Tiket baru, atau screenshot pop-up notifikasi hijau bertuliskan "Saved/Created successfully".*

Setelah formulir disubmit, sistem melakukan validasi di latar belakang untuk mencegah masuknya data kosong (*null*) pada kolom wajib. Hasil pengujian membuktikan bahwa data sukses divalidasi dan tersimpan di dalam basis data, yang ditandai dengan munculnya notifikasi keberhasilan hijau di antarmuka layar. Setelah itu, data pelaporan pelanggan yang baru saja dimasukkan langsung muncul di dalam tabel utama tanpa perlu melakukan pemuatan ulang (*refresh*) halaman secara manual.

### 4.1.4 Pengujian *Update* Status Tiket
Selain kemampuan menyimpan data baru, sistem juga diuji kemampuannya dalam melakukan pembaruan (*Update*) informasi, khususnya pada status penanganan tiket gangguan. Skenario ini dirancang untuk merepresentasikan alur kerja dunia nyata di mana teknisi mengubah status laporan dari *Open* (baru masuk) menjadi *In Progress* (sedang dikerjakan), hingga akhirnya menjadi *Resolved* (telah diperbaiki).

> **Catatan Screenshot:** *Ambil screenshot halaman Tabel Data (List Records) yang menunjukkan kolom "Status" dengan warna badge yang berbeda (misalnya hijau untuk Resolved, kuning untuk In Progress).*

Berdasarkan pengujian, perubahan status berhasil disimpan ke dalam sistem dengan sangat cepat. Selain itu, pembaruan data secara langsung merubah warna *badge* indikator status pada tabel antarmuka pengguna—misalnya warna merah untuk menandakan masalah kritis dan hijau untuk penanganan yang telah selesai. Fitur visual ini memberikan kemudahan yang luar biasa bagi manajer jaringan untuk melakukan kontrol visual terhadap progres teknisi di lapangan secara sekilas.

### 4.1.5 Pengujian Tautan Peta Lokasi (*Google Maps*)
Sistem ini dilengkapi dengan integrasi tautan peta lokasi geografis untuk mempercepat penemuan letak gangguan oleh teknisi lapangan. Pengujian fitur ini dilakukan dengan mengklik ikon pin lokasi yang terdapat pada salah satu baris data tiket keluhan di dalam tabel. Tujuan pengujian adalah untuk memastikan bahwa struktur URL yang disimpan tidak terpotong dan dapat dieksekusi dengan benar oleh peramban web.

> **Catatan Screenshot:** *Ambil screenshot saat mouse Anda menunjuk (hover) tombol lokasi di tabel, atau screenshot tab baru browser yang berhasil membuka halaman peta Google Maps pelanggan tersebut.*

Sesuai dengan hasil pengujian, penekanan pada tombol lokasi langsung memicu peramban untuk membuka sebuah *tab* baru yang mengarah tepat pada koordinat *Google Maps* pelanggan. Mekanisme pembukaan *tab* baru (*target="_blank"*) ini berfungsi dengan sempurna, sehingga teknisi dapat meninjau letak geografis tanpa kehilangan halaman tabel *monitoring* utama yang sedang mereka operasikan.

### 4.1.6 Pengujian Kelola Master Data
Modul *Master Data* merupakan fondasi yang mengatur pilihan konfigurasi sistem, meliputi data referensi jenis Keluhan dan Status penanganan. Pengujian dilakukan untuk memastikan bahwa tabel referensi ini bersifat dinamis dan dapat dikembangkan seiring waktu. Admin mencoba menambah jenis keluhan baru serta menghapus jenis status lama yang sudah tidak relevan.

> **Catatan Screenshot:** *Ambil screenshot halaman Tabel/Daftar Keluhan (Master Data Keluhan) atau Status yang menunjukkan daftar jenis gangguan.*

Hasil pengujian mengonfirmasi bahwa segala bentuk modifikasi (penambahan, pengubahan, atau penghapusan) pada modul *Master Data* langsung direfleksikan secara instan ke dalam opsi *dropdown* di formulir pembuatan tiket gangguan. Kesuksesan relasi *database* ini membuktikan bahwa kerangka kerja *Laravel* mampu menangani konektivitas antar tabel (*foreign key*) dengan konsistensi yang sangat tinggi, mencegah anomali data di seluruh sistem.

### 4.1.7 Pengujian Manajemen *User*
Pengujian yang terakhir menyasar pada fitur pengelolaan akun (*User Management*). Fitur ini memberikan administrator kewenangan penuh untuk mengontrol siapa saja yang memiliki akses masuk ke dalam portal. Pengujian dilakukan dengan menelusuri halaman daftar pengguna, menambah akun teknisi baru, serta mencoba melakukan penghapusan akun staf yang telah nonaktif.

> **Catatan Screenshot:** *Ambil screenshot halaman manajemen/Tabel Users yang menampilkan daftar akun, email, beserta tombol aksinya (Edit/Delete).*

Dari pengujian tersebut, terbukti bahwa modul manajemen pengguna berjalan dengan stabil tanpa hambatan. Admin dapat mengawasi seluruh riwayat pendaftaran akun beserta hak otorisasi masing-masing entitas. Kemampuan melakukan hapus kredensial secara permanen juga berfungsi penuh, yang berarti administrator BRS NET dapat sewaktu-waktu memutus hak akses staf guna menjaga kerahasiaan dan integritas data operasional perusahaan.

## 4.2 Pembahasan Sistem
Sistem *Ticketing* Laporan Gangguan yang diimplementasikan pada BRS NET telah berhasil mengintegrasikan proses pelaporan yang selama ini berserakan di aplikasi pihak ketiga (seperti WhatsApp dan *spreadsheet*) menjadi satu *platform back-office* yang kokoh. Penggunaan *framework* Laravel yang dipadukan dengan Filament Admin Panel terbukti sangat efektif untuk menghasilkan *software* dengan struktur *database* yang baik dan antarmuka yang sangat responsif (*user-friendly*). 

Dari sisi efisiensi, pengguna (admin/teknisi) tidak perlu lagi mengetik ulang rekapan masalah jaringan. Pemberian **Kode Tiket** unik memberikan kemudahan identifikasi, sedangkan implementasi *badge* berwarna pada kolom Status (seperti *Open*, *In Progress*, *Resolved*) memberikan informasi visual yang sangat cepat untuk mengetahui prioritas penanganan. Ditambah lagi, ketersediaan tombol *Google Maps* pada baris tiket sangat memangkas waktu komunikasi dalam mencari koordinat pelanggan yang mengalami gangguan jaringan.

## 4.3 Relevansi Sistem terhadap Kebutuhan Pengguna
Pengembangan sistem pelaporan gangguan ini didasarkan pada kebutuhan nyata BRS NET untuk mengoptimalkan operasional dan menjamin *Service Level Agreement* (SLA) perbaikan jaringan yang lebih singkat. Sebelumnya, tidak adanya pencatatan digital yang terpusat menyebabkan manajemen kesulitan melacak keluhan mana yang belum terselesaikan. 

Melalui sistem ini, seluruh data dikelola dalam satu lingkungan yang aman dan transparan. Bagi manajemen, sistem ini sangat relevan untuk melakukan kontrol, evaluasi teknisi, dan merekapitulasi tren jenis gangguan. Bagi staf layanan pelanggan (*customer service*) dan teknisi, sistem ini sangat meringankan beban kognitif karena mereka dapat memfokuskan energi pada perbaikan jaringan teknis secara langsung dibandingkan kebingungan mencari riwayat pelaporan.

## 4.4 Pembahasan dan Relevansi Mata Kuliah dengan Kegiatan Magang
Kegiatan magang mandiri di BRS NET menjadi sarana penerapan ilmu yang esensial, serta bentuk implementasi nyata dari capaian pembelajaran di bangku kuliah Program Studi Teknik Informatika. Berikut adalah analisis keselarasan antara kompetensi kurikulum dengan penyelesaian studi kasus proyek *Ticketing System* ini:

**1. Magang (CSF721)**
Mata kuliah ini menekankan pada analisis permasalahan industri nyata, adaptasi terhadap budaya kerja profesional, dan perancangan solusi berbasis teknologi informasi. Dalam proyek ini, capaian tersebut direalisasikan melalui tahapan observasi di lingkungan ISP BRS NET, merumuskan masalah *tracking* keluhan, lalu mendesain *platform ticketing* yang relevan.

**2. Arsitektur Berbasis Layanan (CIE408)**
Mata kuliah ini berfokus pada perancangan antarmuka pemrograman aplikasi (API) dan layanan *web* yang dapat saling berkomunikasi. Dalam kegiatan magang ini, prinsip arsitektur berbasis layanan diterapkan secara nyata melalui pembuatan *endpoint* API untuk mengirimkan data pelaporan dari antarmuka pengguna (*front-end*) menuju ke *server* pemrosesan (*back-end*). Selain itu, sistem juga memanfaatkan layanan pihak ketiga dengan mengambil API dari *Google Maps* untuk menghadirkan fitur bagikan lokasi (*share location*) yang akurat, sehingga mempermudah teknisi dalam menemukan alamat rumah pelanggan yang bermasalah.

**3. Isu Sosial dan Keprofesian Teknologi Informasi (CIE617)**
Etika profesi, keamanan informasi, serta pengelolaan batasan hak otorisasi sangat ditekankan. Penerapan pengelolaan hak akses *login* dan *password hashing* (*bcrypt*) di Laravel mengartikulasikan bentuk tanggung jawab profesional untuk melindungi privasi data keluhan pelanggan.

**4. Interaksi Manusia Komputer (CSF619)**
Konsep utama dari mata kuliah ini adalah merancang antarmuka sistem yang berpusat pada kenyamanan pengguna (*user-centered design*). Relevansi tersebut diwujudkan pada tahap awal pengembangan aplikasi, di mana penulis membuat *mockup* dan purarupa (*prototype*) visual terlebih dahulu menggunakan aplikasi rancang grafis Figma. Pembuatan desain di Figma ini sangat membantu dalam memetakan tata letak (*layout*) halaman *dashboard*, struktur form keluhan, serta pewarnaan tabel secara matang sebelum dieksekusi ke dalam bahasa pemrograman, sehingga menghasilkan interaksi visual yang intuitif bagi operator aplikasi.

**5. Sistem Basis Data Terdistribusi (CIE721)**
Mata kuliah ini mempelajari bagaimana sebuah sistem *database* berskala besar dapat dikelola secara terpisah namun tetap terintegrasi secara utuh. Dalam konteks operasional laporan gangguan, konsep ini diimplementasikan dengan membuat sistem basis data yang bercabang untuk menangani tingginya arus pemrosesan tiket pelanggan. Sistem dirancang dengan mengandalkan satu basis data utama (*master database*) yang berfungsi sebagai pusat penyimpanan operasional global, yang kemudian dipecah ke dalam basis data cabang (*slave databases*) untuk melayani akses pembacaan data. Pemisahan arsitektur ini mencegah server utama dari kelebihan beban (*overload*) saat teknisi mengakses dan merender peta lokasi secara bersamaan.

**6. Ketekunan (MBK002)**
Mata kuliah ini tidak hanya berorientasi pada wawasan kognitif, melainkan pada pembentukan karakter ketangguhan mental di lingkungan kerja. Relevansinya sangat terasa selama fase pengembangan sistem, di mana penulis sering kali dihadapkan pada berbagai kendala teknis perangkat lunak (seperti kegagalan penarikan API *Google Maps*, galat sistem saat inisialisasi basis data terdistribusi, hingga masalah tata letak desain antarmuka yang pecah). Kegigihan dan ketekunan untuk terus mencari solusi pemecahan masalah (*debugging*), menelaah dokumentasi kerangka kerja semalaman, dan konsistensi untuk menyempurnakan alur aplikasi tanpa henti merupakan kunci utama dari tuntasnya pengembangan sistem ini.
