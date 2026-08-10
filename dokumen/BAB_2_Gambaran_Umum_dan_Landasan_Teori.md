# BAB II
# GAMBARAN UMUM INSTANSI DAN LANDASAN TEORI

## 2.1 Sejarah BRS NET
*(Catatan: Anda dapat menyesuaikan profil ini dengan sejarah asli perusahaan tempat Anda magang)*
BRS NET merupakan perusahaan penyedia layanan *Internet Service Provider* (ISP) yang didirikan untuk menjawab kebutuhan konektivitas masyarakat dan sektor bisnis di era digital. Pada masa awal berdirinya, BRS NET fokus pada penyediaan akses internet berskala kecil untuk area residensial. Seiring dengan peningkatan permintaan terhadap jaringan yang stabil dan andal, BRS NET memperluas layanannya mencakup layanan internet korporat (Dedicated Internet), pengelolaan infrastruktur jaringan, serta dukungan teknis terpadu. Perusahaan terus berinovasi dalam mengadopsi teknologi terbaru guna memastikan distribusi *bandwidth* yang merata dan optimal, menjadikan BRS NET sebagai mitra teknologi yang dipercaya di wilayah pelayanannya.

## 2.2 Visi dan Misi BRS NET
**Visi:**
Menjadi penyedia layanan internet (ISP) terdepan yang menghadirkan konektivitas digital yang cepat, andal, dan inovatif guna mendukung transformasi digital masyarakat dan bisnis.

**Misi:**
1. Menyediakan infrastruktur jaringan internet dengan kualitas prima dan jangkauan yang luas.
2. Memberikan pelayanan pelanggan yang responsif, profesional, dan berorientasi pada kepuasan pelanggan (*customer-centric*).
3. Mengembangkan sistem teknologi informasi yang modern dan terintegrasi untuk mendukung efisiensi operasional perusahaan.
4. Terus berinovasi dengan mengadopsi teknologi jaringan terkini untuk menjawab tantangan perkembangan teknologi masa depan.

## 2.3 Struktur Organisasi BRS NET
Struktur organisasi BRS NET dirancang secara fungsional untuk memastikan setiap divisi dapat menjalankan peran spesifiknya secara optimal, terutama dalam memberikan pelayanan prima kepada pelanggan. Susunan organisasi secara umum terdiri dari:
1. **Pimpinan/Direktur:** Bertanggung jawab atas kebijakan strategis dan jalannya keseluruhan operasional perusahaan.
2. **Divisi Teknik (NOC & Teknisi):** Bertugas melakukan pemeliharaan server, pemantauan kualitas jaringan (*monitoring*), serta instalasi dan perbaikan gangguan fisik di lapangan.
3. **Divisi Layanan Pelanggan (Customer Service):** Bertugas sebagai lini pertama (*front-liner*) dalam menerima keluhan, memproses *ticketing*, serta memberikan informasi terkait produk dan tagihan.
4. **Divisi IT/Development:** Bertanggung jawab dalam mengembangkan dan merawat perangkat lunak internal perusahaan, termasuk sistem pelaporan gangguan (ticketing system) yang digunakan oleh para staf.

## 2.4 Landasan Teori

Landasan teori merupakan dasar konseptual yang digunakan untuk mendukung pelaksanaan kegiatan magang dan perancangan prototipe sistem laporan gangguan (*ticketing system*). Dalam konteks operasional penyedia layanan internet (ISP), pengelolaan data keluhan pelanggan membutuhkan pendekatan yang sistematis, terstruktur, dan berbasis teknologi agar penanganan masalah yang dihasilkan memiliki kualitas yang baik. Oleh karena itu, pemahaman terhadap teori sistem informasi, pengembangan perangkat lunak, basis data, serta arsitektur web menjadi sangat penting.

Perkembangan teknologi informasi telah mendorong instansi dan perusahaan untuk memanfaatkan sistem berbasis web dalam pengelolaan data operasional mereka. Sistem tersebut umumnya didukung oleh basis data relasional, proses pengolahan data yang terintegrasi, serta kemampuan pemantauan status penanganan secara *real-time*. Konsep-konsep teknologi mutakhir seperti penggunaan *framework* MVC, *containerization*, dan pendekatan *full-stack development* menjadi landasan utama dalam perancangan prototipe *ticketing system* pada kegiatan magang ini.

Landasan teori juga berfungsi untuk mengaitkan praktik kerja di lapangan dengan konsep akademik yang relevan. Dengan memahami teori yang digunakan, penulis dapat merancang prototipe sistem yang tidak hanya sesuai dengan kebutuhan nyata operasional perusahaan, tetapi juga memiliki dasar ilmiah yang kuat. Hal ini menjadikan solusi yang diusulkan lebih terarah, efisien, dan dapat dipertanggungjawabkan secara akademik.

### 2.4.1 Sistem Informasi Berbasis Web
Sistem informasi berbasis web merupakan sebuah aplikasi yang mengintegrasikan pengelolaan data, proses bisnis, dan antarmuka pengguna melalui jaringan internet (atau intranet) dan dapat diakses menggunakan aplikasi peramban (*web browser*). Implementasi aplikasi berbasis web sangat krusial bagi sebuah instansi karena memungkinkan akses informasi yang *platform-independent*, terpusat, dan dapat dipantau secara *real-time*. Dalam konteks manajemen persediaan maupun pengelolaan keluhan, pendekatan berbasis web meminimalisasi redudansi pekerjaan administratif dan mempermudah sinkronisasi data antar divisi (Christanto & Somya, 2023).

### 2.4.2 PHP (Hypertext Preprocessor)
PHP merupakan bahasa pemrograman *server-side* yang *open-source* dan didesain khusus untuk pengembangan web yang dinamis. Skrip PHP dieksekusi di sisi *server* sebelum dikirimkan kembali sebagai HTML murni ke peramban pengguna. Sebagai salah satu teknologi tertua namun tetap paling banyak digunakan, PHP memungkinkan pemrosesan logika bisnis yang kompleks dan mampu menjembatani interaksi antara aplikasi (*front-end*) dengan *database* secara aman. Penggunaan PHP yang optimal sering dikombinasikan dengan *framework* guna mempercepat dan merapikan penulisan struktur kode dalam pengembangan Sistem Informasi (Azkiyatun et al., 2023).

### 2.4.3 Framework Laravel
Laravel adalah kerangka kerja (*framework*) berbasis PHP yang mengadopsi pola arsitektur *Model-View-Controller* (MVC). *Framework* ini hadir dengan serangkaian fitur bawaan yang lengkap (*batteries-included*), seperti *routing*, *middleware* untuk autentikasi keamanan, migrasi *database*, dan sistem *template Blade*. Penggunaan Laravel sangat menunjang perancangan sistem informasi berskala besar karena menawarkan sintaks yang ekspresif, tingkat keamanan yang tinggi terhadap serangan (*SQL Injection, CSRF*), serta ekosistem yang terstandarisasi. Dalam pengembangan sistem pendaftaran maupun layanan digital lainnya, Laravel mempercepat siklus pengembangan (Wahab & Bhakti, 2026).

### 2.4.4 Livewire
Livewire merupakan sebuah *full-stack framework* pendamping Laravel yang memungkinkan pengembang untuk membangun antarmuka dinamis dan reaktif (seperti *Single Page Application*) tanpa harus meninggalkan kenyamanan ekosistem PHP. Livewire bekerja dengan melakukan pembaruan parsial pada antarmuka (DOM) melalui permintaan AJAX *background* setiap kali ada perubahan *state*, sehingga *developer* tidak perlu menuliskan *script* JavaScript yang berulang. Pendekatan *Rapid Application Development* dengan memanfaatkan Livewire terbukti sangat efektif untuk menghemat waktu pengembangan *front-end* yang interaktif (Prasetyo dkk., 2023).

### 2.4.5 Filament Admin Panel
Filament merupakan kumpulan komponen antarmuka, *form builder*, dan *table builder* mutakhir (*state-of-the-art*) yang dibangun di atas *stack* teknologi Laravel, Livewire, Alpine.js, dan Tailwind CSS (sering disebut *TALL stack*). Filament sangat populer digunakan untuk mempercepat pembuatan *Admin Panel* dan Sistem Informasi manajemen konten (*CRUD*). Dengan memanfaatkan ekosistem Filament, proses pengembangan sistem pelaporan dan pengelolaan basis data dapat dilakukan dengan jauh lebih efisien, elegan secara desain, serta terstruktur (Nugroho dkk., 2023).

### 2.4.6 Database Management System (MySQL/MariaDB)
*Database Management System* (DBMS) relasional seperti MySQL (atau MariaDB) adalah *software* yang dirancang untuk membangun dan mengelola basis data secara terstruktur dengan menggunakan bahasa SQL (*Structured Query Language*). DBMS bertanggung jawab menjaga integritas data relasional, mengamankan *query*, serta memastikan manajemen data terpusat (khususnya untuk data pelanggan, riwayat *ticketing*, dan status penanganan). Integrasi DBMS yang tepat di dalam kerangka kerja Laravel memastikan efisiensi penarikan data (*data retrieval*) dan pelaporan pada Enterprise Resource Planning atau aplikasi serupa (Astuti et al., 2026).

### 2.4.7 Docker dan Containerization
Docker merupakan sebuah *platform* perangkat lunak yang menggunakan virtualisasi tingkat sistem operasi (disebut *containerization*) untuk mengemas (*package*) kode aplikasi beserta seluruh dependensinya ke dalam satu unit *container* yang standar. Penggunaan *container* menjamin konsistensi bahwa aplikasi web akan senantiasa berjalan dengan mulus tanpa terikat (*environment-agnostic*) pada sistem operasi komputer yang berbeda-beda. Pemanfaatan Docker sangat fundamental bagi *web development* era modern dalam memfasilitasi pembentukan lingkungan kerja yang terisolasi, skenario deployment yang cepat, serta integrasi arsitektur perangkat lunak yang skalabel (Jumistik, 2023; Teknika, 2021).

### 2.4.8 Fullstack Developer
*Fullstack Developer* adalah praktisi rekayasa perangkat lunak yang memiliki kompetensi teknis ganda dalam memprogram dan merancang aplikasi baik dari sisi antarmuka (*front-end*) maupun dari segi logika sistem dan *database* (*back-end*). Peran *full-stack developer* menuntut pemahaman menyeluruh terhadap arsitektur web modern, integrasi basis data, penerapan metodologi pengembangan (seperti *Agile* atau *Scrum*), serta pemanfaatan otomasi dan perangkat *container*. Penggunaan teknologi *full-stack* dan otomatisasi menjadi elemen krusial yang secara signifikan mengoptimalkan efisiensi dan efektivitas siklus pengembangan sebuah perangkat lunak (Drofa, 2025).

### 2.4.9 Figma (Perancangan UI/UX)
Figma adalah sebuah aplikasi desain antarmuka (*User Interface*) dan prototipe berbasis *cloud* yang memungkinkan kolaborasi antar pengembang secara *real-time*. Dalam proses rekayasa perangkat lunak, Figma digunakan untuk merancang antarmuka (*wireframing*) dan pengalaman pengguna (*User Experience*) sebelum sistem diimplementasikan ke dalam bentuk kode. Penggunaan Figma secara signifikan mempermudah visualisasi alur aplikasi dan tata letak informasi, sehingga tim pengembang dapat melakukan evaluasi dan iterasi desain secara interaktif dan meminimalisasi kesalahan pada tahap *development* (Kharisma et al., 2023).
