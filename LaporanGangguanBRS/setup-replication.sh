#!/bin/bash
# ============================================================
# setup-replication.sh
# Script untuk mengaktifkan replikasi SBDT Master → Slave 1 & 2
# Jalankan SATU KALI setelah "docker compose up -d"
# ============================================================

set -e

MASTER_HOST="db_master"
SLAVE1_HOST="db_slave1"
SLAVE2_HOST="db_slave2"
ROOT_PASS="p455w0rd"
REPL_USER="replicator"
REPL_PASS="repl_p455w0rd"
DB_NAME="laravel"

echo ""
echo "╔══════════════════════════════════════════════════════╗"
echo "║     SBDT BRS NET — Setup Replikasi Master-Slave      ║"
echo "╚══════════════════════════════════════════════════════╝"
echo ""

# Tunggu semua database siap menerima koneksi
echo "⏳ Menunggu Database Utama (Master) siap..."
until docker exec db_master mysqladmin -uroot -p"${ROOT_PASS}" ping --silent 2>/dev/null; do
  sleep 2
done
echo "✅ Master siap."

echo "⏳ Menunggu Database Cabang 1 (Slave 1) siap..."
until docker exec db_slave1 mysqladmin -uroot -p"${ROOT_PASS}" ping --silent 2>/dev/null; do
  sleep 2
done
echo "✅ Slave 1 siap."

echo "⏳ Menunggu Database Cabang 2 (Slave 2) siap..."
until docker exec db_slave2 mysqladmin -uroot -p"${ROOT_PASS}" ping --silent 2>/dev/null; do
  sleep 2
done
echo "✅ Slave 2 siap."

echo ""
echo "📋 [1/5] Membuat user replikasi di Database Utama (Master)..."
docker exec db_master mysql -uroot -p"${ROOT_PASS}" -e "
  CREATE USER IF NOT EXISTS '${REPL_USER}'@'%' IDENTIFIED BY '${REPL_PASS}';
  GRANT REPLICATION SLAVE ON *.* TO '${REPL_USER}'@'%';
  FLUSH PRIVILEGES;
"
echo "    ✅ User '${REPL_USER}' berhasil dibuat di Master."

echo ""
echo "📋 [2/5] Mengambil posisi Binary Log dari Master..."
MASTER_STATUS=$(docker exec db_master mysql -uroot -p"${ROOT_PASS}" -e "SHOW MASTER STATUS\G" 2>/dev/null)
MASTER_LOG_FILE=$(echo "$MASTER_STATUS" | grep "File:" | awk '{print $2}')
MASTER_LOG_POS=$(echo "$MASTER_STATUS"  | grep "Position:" | awk '{print $2}')
echo "    📄 Binary Log File : ${MASTER_LOG_FILE}"
echo "    📍 Log Position    : ${MASTER_LOG_POS}"

echo ""
echo "📋 [3/5] Dump data dari Master → Import ke Slave 1 & 2..."
docker exec db_master mysqldump -uroot -p"${ROOT_PASS}" \
  --single-transaction --master-data=2 --routines --triggers \
  "${DB_NAME}" > /tmp/brs_master_dump.sql
echo "    ✅ Dump selesai (brs_master_dump.sql)."

docker cp /tmp/brs_master_dump.sql db_slave1:/tmp/master_dump.sql
docker exec db_slave1 mysql -uroot -p"${ROOT_PASS}" "${DB_NAME}" < /dev/stdin < /tmp/brs_master_dump.sql 2>/dev/null || \
docker exec -i db_slave1 mysql -uroot -p"${ROOT_PASS}" "${DB_NAME}" < /tmp/brs_master_dump.sql
echo "    ✅ Data berhasil diimpor ke Slave 1."

docker cp /tmp/brs_master_dump.sql db_slave2:/tmp/master_dump.sql
docker exec -i db_slave2 mysql -uroot -p"${ROOT_PASS}" "${DB_NAME}" < /tmp/brs_master_dump.sql
echo "    ✅ Data berhasil diimpor ke Slave 2."

echo ""
echo "📋 [4/5] Menghubungkan Database Cabang 1 (Slave 1) ke Master..."
docker exec db_slave1 mysql -uroot -p"${ROOT_PASS}" -e "
  STOP SLAVE;
  CHANGE MASTER TO
    MASTER_HOST='${MASTER_HOST}',
    MASTER_USER='${REPL_USER}',
    MASTER_PASSWORD='${REPL_PASS}',
    MASTER_LOG_FILE='${MASTER_LOG_FILE}',
    MASTER_LOG_POS=${MASTER_LOG_POS};
  START SLAVE;
"
echo "    ✅ Slave 1 terhubung ke Master."

echo ""
echo "📋 [5/5] Menghubungkan Database Cabang 2 (Slave 2) ke Master..."
docker exec db_slave2 mysql -uroot -p"${ROOT_PASS}" -e "
  STOP SLAVE;
  CHANGE MASTER TO
    MASTER_HOST='${MASTER_HOST}',
    MASTER_USER='${REPL_USER}',
    MASTER_PASSWORD='${REPL_PASS}',
    MASTER_LOG_FILE='${MASTER_LOG_FILE}',
    MASTER_LOG_POS=${MASTER_LOG_POS};
  START SLAVE;
"
echo "    ✅ Slave 2 terhubung ke Master."

echo ""
echo "╔══════════════════════════════════════════════════════╗"
echo "║  Verifikasi Status Replikasi                         ║"
echo "╚══════════════════════════════════════════════════════╝"

echo ""
echo "📊 Status Slave 1:"
docker exec db_slave1 mysql -uroot -p"${ROOT_PASS}" -e \
  "SHOW SLAVE STATUS\G" 2>/dev/null | grep -E "(Slave_IO_Running|Slave_SQL_Running|Seconds_Behind_Master|Last_Error)"

echo ""
echo "📊 Status Slave 2:"
docker exec db_slave2 mysql -uroot -p"${ROOT_PASS}" -e \
  "SHOW SLAVE STATUS\G" 2>/dev/null | grep -E "(Slave_IO_Running|Slave_SQL_Running|Seconds_Behind_Master|Last_Error)"

echo ""
echo "╔══════════════════════════════════════════════════════╗"
echo "║  ✅ SBDT BRS NET AKTIF!                              ║"
echo "║                                                      ║"
echo "║  • Database Utama  (Master) : db_master:3306         ║"
echo "║  • Database Cabang 1 (Slave1): db_slave1:3306        ║"
echo "║  • Database Cabang 2 (Slave2): db_slave2:3306        ║"
echo "║                                                      ║"
echo "║  Laravel sudah otomatis:                             ║"
echo "║  WRITE → db_master   |   READ → db_slave1/slave2    ║"
echo "╚══════════════════════════════════════════════════════╝"
echo ""
