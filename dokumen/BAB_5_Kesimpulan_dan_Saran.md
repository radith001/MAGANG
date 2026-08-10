# BAB V
# KESIMPULAN DAN SARAN

## 5.1 Kesimpulan
Berdasarkan hasil perancangan, implementasi, dan pengujian sistem pelaporan gangguan jaringan (*Ticketing System*) berbasis web yang dikembangkan selama kegiatan magang di BRS NET, dapat ditarik beberapa kesimpulan sebagai berikut:

1. Permasalahan utama yang ditemukan selama magang adalah proses pencatatan keluhan pelanggan yang masih dilakukan secara manual dan tersebar melalui aplikasi pesan singkat (WhatsApp) atau *spreadsheet*. Proses tersebut menyulitkan pelacakan status perbaikan, rentan terhadap kehilangan data, dan menghambat koordinasi antara tim layanan pelanggan dengan teknisi lapangan. Kondisi ini menunjukkan perlunya sistem terpusat yang efisien untuk mendukung manajemen insiden jaringan.
2. Sistem *Ticketing* yang dikembangkan berhasil menyelesaikan masalah operasional tersebut dengan menyediakan *platform back-office* terpusat menggunakan *framework* Laravel dan Filament Admin Panel. Otomatisasi penomoran tiket dan fitur pembaruan status (*Open*, *In Progress*, *Resolved*) memungkinkan manajemen keluhan diproses dengan jauh lebih cepat dan terstruktur dibandingkan metode manual.
3. Penerapan konsep basis data terdistribusi dan relasional menggunakan MySQL mampu mendukung pengelolaan data secara sistematis melalui relasi antar tabel (tabel pelanggan, keluhan, dan status), penerapan *primary key*, serta pembatasan hak akses berbasis otorisasi (*user management*). Hal ini secara signifikan meningkatkan keamanan dan keteraturan integritas data sistem.
4. Fitur tautan (*link*) peta lokasi pelanggan berbasis koordinat yang terintegrasi langsung dengan *Google Maps* memberikan nilai tambah operasional yang luar biasa. Fitur ini sangat mempermudah dan mempercepat mobilitas teknisi di lapangan dalam menemukan titik lokasi perbaikan secara presisi tanpa harus mengetik ulang alamat secara manual.
5. Hasil pengujian sistem menggunakan metode *Black Box Testing* menunjukkan bahwa seluruh modul utama, meliputi *login*, pembuatan tiket, pengubahan status, pengelolaan *master data*, tautan peta lokasi, dan manajemen *user*, berjalan dengan lancar sesuai spesifikasi yang dirancang. Seluruh skenario pengujian fungsional dinyatakan berhasil (LULUS), sehingga sistem dinilai siap dan layak untuk dioperasikan.
6. Kegiatan magang ini menunjukkan tingkat keselarasan yang tinggi antara teori akademik dan praktik dunia kerja. Pemahaman dari berbagai mata kuliah, seperti Arsitektur Berbasis Layanan, Sistem Basis Data Terdistribusi, Interaksi Manusia Komputer, hingga etika Keprofesian Teknologi Informasi, terbukti dapat diaplikasikan secara nyata dalam memecahkan masalah industri yang konkrit.

Secara keseluruhan, sistem *Ticketing* pelaporan gangguan yang dikembangkan mampu meningkatkan efisiensi waktu, akurasi data, dan kemudahan kolaborasi tim dibandingkan prosedur konvensional sebelumnya. Sistem ini telah menjadi solusi nyata yang memfasilitasi transformasi digital pada layanan *helpdesk* di lingkungan operasional BRS NET.

## 5.2 Saran
Meskipun purarupa sistem pelaporan ini telah berjalan dengan baik dan berhasil menjawab kebutuhan dasar pengelolaan keluhan di BRS NET, masih terdapat beberapa ruang eksplorasi yang dapat dikembangkan lebih lanjut untuk memaksimalkan fungsionalitas sistem, antara lain:

1. **Pengembangan *Dashboard* Analitik Lanjutan**
Sistem dapat dikembangkan dengan menambahkan fitur analitik visual tingkat lanjut, seperti grafik statistik tren jenis gangguan per bulan atau kalkulasi otomatis target *Service Level Agreement* (SLA) teknisi. Hal ini akan sangat membantu manajemen dalam proses evaluasi performa layanan dan pengambilan keputusan strategis.

2. **Implementasi ke *Server Cloud* (Daring)**
Sistem *ticketing* saat ini diinisiasi dalam lingkup pengembangan lokal. Pengembangan selanjutnya sangat disarankan untuk melakukan *deployment* aplikasi ke *server cloud* (VPS) secara *online*. Tujuannya agar aplikasi dapat diakses dengan mudah oleh para teknisi yang sedang berada di luar kantor menggunakan jaringan internet publik.

3. **Integrasi *Gateway* Notifikasi (*WhatsApp/Email*)**
Peningkatan responsibilitas sistem dapat dicapai dengan menanamkan fitur *webhook API* menuju *WhatsApp Gateway* atau *Email Server*. Fitur ini akan memberikan notifikasi otomatis secara *real-time* kepada pelanggan ketika status gangguan internet mereka sudah ditangani atau selesai diperbaiki.

4. **Pengembangan Validasi *Live-Tracking* Geospasial**
Penambahan validasi otomatis menggunakan *Geolocation API* pada perangkat pengguna dapat dipertimbangkan. Fitur ini dapat membantu sistem melacak posisi terkini teknisi lapangan, sehingga penugasan perbaikan jaringan dapat dialokasikan secara dinamis kepada teknisi yang berjarak paling dekat dengan titik gangguan.

5. **Pengembangan Antarmuka Khusus (*Mobile App*)**
Optimalisasi di masa depan dapat diarahkan pada pembuatan antarmuka aplikasi *mobile* *native* (Android/iOS) yang khusus diperuntukkan bagi teknisi lapangan, sehingga pengoperasian penutupan tiket dapat dilakukan secara lebih responsif, praktis, dan ramah pengguna (*user-friendly*) dari layar ponsel.

6. **Integrasi dengan Sistem *Billing* Internal**
Sistem *ticketing* dapat dikembangkan lebih lanjut agar saling "berbicara" dengan perangkat lunak internal BRS NET lainnya, seperti sistem tagihan (*billing*). Integrasi ini berpotensi memungkinkan adanya kompensasi pemotongan biaya tagihan secara otomatis jika durasi *downtime* gangguan internet melebihi batas waktu toleransi yang ditetapkan. 

Dengan adanya peta jalan pengembangan berkelanjutan ini, diharapkan sistem *ticketing* BRS NET tidak hanya menjadi solusi operasional jangka pendek, tetapi berevolusi menjadi instrumen *Customer Relationship Management* (CRM) skala penuh yang mendukung kemajuan layanan di masa depan.
