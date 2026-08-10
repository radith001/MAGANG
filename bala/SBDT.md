Pelanggan kirim Form Pengaduan
         │
         ▼
   [Laravel App]
         │
         ├─── INSERT/UPDATE/DELETE ──→ 🟢 db_master (Database Utama)
         │                                      │
         │                              Binary Log terpancar
         │                              ↙              ↘
         │                    [db_slave1]          [db_slave2]
         │                    Cabang 1 ✅           Cabang 2 ✅
         │
         └─── SELECT (baca) ──→ 🔵 db_slave1 ATAU db_slave2
                                   (Laravel pilih acak / load balancing)
