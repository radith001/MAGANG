from docx import Document
from docx.shared import Inches, Pt, Cm, RGBColor
from docx.enum.text import WD_ALIGN_PARAGRAPH
from docx.enum.table import WD_ALIGN_VERTICAL
from docx.oxml.ns import qn
from docx.oxml import OxmlElement
import copy

doc = Document()

# Set page margins
section = doc.sections[0]
section.page_width = Cm(21)
section.page_height = Cm(29.7)
section.left_margin = Cm(3)
section.right_margin = Cm(2)
section.top_margin = Cm(2)
section.bottom_margin = Cm(2)

def set_cell_border(cell, top=None, bottom=None, start=None, end=None):
    tc = cell._tc
    tcPr = tc.get_or_add_tcPr()
    tcBorders = OxmlElement('w:tcBorders')
    for border_name, val in [('top', top), ('bottom', bottom), ('start', start), ('end', end)]:
        if val:
            border_el = OxmlElement(f'w:{border_name}')
            border_el.set(qn('w:val'), 'single')
            border_el.set(qn('w:sz'), '4')
            border_el.set(qn('w:space'), '0')
            border_el.set(qn('w:color'), '000000')
            tcBorders.append(border_el)
    tcPr.append(tcBorders)

def set_cell_bg(cell, color_hex):
    tc = cell._tc
    tcPr = tc.get_or_add_tcPr()
    shd = OxmlElement('w:shd')
    shd.set(qn('w:val'), 'clear')
    shd.set(qn('w:color'), 'auto')
    shd.set(qn('w:fill'), color_hex)
    tcPr.append(shd)

def set_cell_vertical_align(cell, align):
    tc = cell._tc
    tcPr = tc.get_or_add_tcPr()
    vAlign = OxmlElement('w:vAlign')
    vAlign.set(qn('w:val'), align)
    tcPr.append(vAlign)

# Title
title = doc.add_paragraph()
title.alignment = WD_ALIGN_PARAGRAPH.CENTER
run = title.add_run('LOGBOOK KEGIATAN MAGANG')
run.bold = True
run.font.size = Pt(13)
run.font.name = 'Times New Roman'

subtitle = doc.add_paragraph()
subtitle.alignment = WD_ALIGN_PARAGRAPH.CENTER
run2 = subtitle.add_run('BRS NET — 18 Maret s.d. 21 Agustus 2026')
run2.bold = True
run2.font.size = Pt(11)
run2.font.name = 'Times New Roman'

doc.add_paragraph()

# Logbook data
# Format: (no, tanggal, kegiatan, catatan_screenshot)
entries = [
    (
        "1",
        "Rabu,\n18 Maret 2026",
        "Pengenalan lingkungan kerja BRS NET dan pembagian jobdesk di divisi IT",
        "📸 Screenshot suasana ruang kerja/kantor BRS NET, atau foto bersama tim IT (foto langsung dengan kamera HP)"
    ),
    (
        "2",
        "Rabu,\n25 Maret 2026\n(Libur Idul Fitri)",
        "LIBUR HARI RAYA IDUL FITRI 1446 H",
        "—"
    ),
    (
        "3",
        "Rabu,\n1 April 2026",
        "Observasi dan analisis alur penanganan gangguan internet pelanggan yang masih dilakukan secara manual via WhatsApp dan spreadsheet",
        "📸 Foto tampilan WhatsApp/spreadsheet yang digunakan untuk mencatat keluhan secara manual (foto langsung dengan kamera HP)"
    ),
    (
        "4",
        "Rabu,\n8 April 2026",
        "Merancang konsep dan kebutuhan fitur Sistem Informasi Manajemen Gangguan Pelanggan BRS NET berdasarkan hasil observasi",
        "📸 Foto catatan/sketsa alur sistem atau dokumen analisis kebutuhan (foto langsung dengan kamera HP)"
    ),
    (
        "5",
        "Rabu,\n15 April 2026",
        "Perancangan desain antarmuka (UI/UX) Sistem Informasi Laporan Gangguan menggunakan aplikasi Figma",
        "📸 Screenshot tampilan desain mockup di Figma (Dashboard, Form Tiket, Tabel Data Pelanggan)"
    ),
    (
        "6",
        "Rabu,\n22 April 2026",
        "Instalasi dan konfigurasi lingkungan pengembangan: Docker, Laravel, dan Filament Admin Panel",
        "📸 Screenshot terminal/command prompt yang menampilkan proses instalasi Composer dan perintah 'php artisan serve' yang berhasil dijalankan"
    ),
    (
        "7",
        "Rabu,\n29 April 2026",
        "Pembuatan struktur basis data: migrasi tabel statuses, keluhans, dan pelanggans menggunakan Laravel Migration",
        "📸 Screenshot kode file migrasi:\n- 2026_07_08_145014_create_statuses_table.php\n- 2026_07_08_145023_create_keluhans_table.php\n- 2026_07_08_145041_create_nama_pelanggans_table.php\n(Lokasi: src/database/migrations/)"
    ),
    (
        "8",
        "Rabu,\n6 Mei 2026",
        "Pembuatan Model Eloquent NamaPelanggan, Keluhan, dan Status beserta relasi antar tabel (belongsTo/hasMany)",
        "📸 Screenshot kode file Model:\n- src/app/Models/NamaPelanggan.php\n- src/app/Models/Keluhan.php\n- src/app/Models/Status.php"
    ),
    (
        "9",
        "Rabu,\n13 Mei 2026",
        "Pembuatan Filament Resource untuk modul Keluhan: KeluhanResource, KeluhanForm, dan KeluhansTable",
        "📸 Screenshot kode file:\n- src/app/Filament/Admin/Resources/Keluhans/KeluhanResource.php\n- src/app/Filament/Admin/Resources/Keluhans/Schemas/KeluhanForm.php"
    ),
    (
        "10",
        "Rabu,\n20 Mei 2026",
        "Pembuatan Filament Resource untuk modul Status: StatusResource, StatusForm, dan StatusesTable",
        "📸 Screenshot kode file:\n- src/app/Filament/Admin/Resources/Statuses/StatusResource.php\n- src/app/Filament/Admin/Resources/Statuses/Tables/StatusesTable.php"
    ),
    (
        "11",
        "Rabu,\n27 Mei 2026",
        "Pembuatan Filament Resource untuk modul utama Data Pelanggan (NamaPelangganResource) beserta form input dan tabel tampilan data",
        "📸 Screenshot kode file:\n- src/app/Filament/Admin/Resources/NamaPelanggans/NamaPelangganResource.php\n- src/app/Filament/Admin/Resources/NamaPelanggans/Schemas/NamaPelangganForm.php"
    ),
    (
        "12",
        "Rabu,\n3 Juni 2026",
        "Implementasi kolom tabel data pelanggan: Kode Tiket, Nama, Alamat, Keluhan (badge), Status (badge), dan Tanggal Dibuat",
        "📸 Screenshot kode file:\n- src/app/Filament/Admin/Resources/NamaPelanggans/Tables/NamaPelanggansTable.php\n(fokus pada bagian ->columns([...]))"
    ),
    (
        "13",
        "Rabu,\n10 Juni 2026",
        "Penambahan fitur auto-generate Kode Tiket unik secara otomatis (menggunakan Observer atau mutator pada model NamaPelanggan)",
        "📸 Screenshot kode pada:\n- src/app/Models/NamaPelanggan.php\n(bagian static boot() atau booted() untuk auto-generate kode tiket)"
    ),
    (
        "14",
        "Rabu,\n17 Juni 2026",
        "Penambahan kolom lokasi (latitude, longitude, google_maps_link) pada tabel pelanggans melalui migrasi baru",
        "📸 Screenshot kode file migrasi:\n- src/database/migrations/2026_07_16_000001_add_location_to_pelanggans_table.php"
    ),
    (
        "15",
        "Rabu,\n24 Juni 2026",
        "Implementasi fitur tautan Google Maps pada tabel data pelanggan dengan tombol '📍 Lihat Lokasi' yang membuka tab baru",
        "📸 Screenshot kode pada:\n- src/app/Filament/Admin/Resources/NamaPelanggans/Tables/NamaPelanggansTable.php\n(fokus pada bagian kolom google_maps_link dan ->url(..., shouldOpenInNewTab: true))"
    ),
    (
        "16",
        "Rabu,\n1 Juli 2026",
        "Perancangan dan konfigurasi arsitektur basis data terdistribusi (MySQL Master-Slave Replication) menggunakan Docker Compose",
        "📸 Screenshot kode file:\n- docker-compose.yml\n- db/conf.d/my.cnf\n(lokasi: root folder LaporanGangguanBRS/)"
    ),
    (
        "17",
        "Rabu,\n8 Juli 2026",
        "Konfigurasi skrip otomatisasi replikasi basis data master ke slave (db_slave1 dan db_slave2) menggunakan Bash script",
        "📸 Screenshot kode file:\n- setup-replication.sh\n(lokasi: root folder LaporanGangguanBRS/)"
    ),
    (
        "18",
        "Rabu,\n15 Juli 2026",
        "Konfigurasi koneksi database di Laravel agar operasi tulis (INSERT/UPDATE/DELETE) diarahkan ke db_master dan operasi baca (SELECT) ke db_slave",
        "📸 Screenshot isi file:\n- src/.env\n(bagian konfigurasi DB_HOST, DB_HOST_READ / koneksi database)"
    ),
    (
        "19",
        "Rabu,\n22 Juli 2026",
        "Pengujian fungsional (Black Box Testing) seluruh modul: login, tambah tiket, update status, kelola master data, dan manajemen user",
        "📸 Screenshot tampilan web aplikasi:\n- Halaman Dashboard Filament setelah login berhasil\n- Tabel data pelanggan yang menampilkan badge status berwarna"
    ),
    (
        "20",
        "Rabu,\n29 Juli 2026",
        "Perbaikan dan penyempurnaan (bugfixing) aplikasi berdasarkan hasil pengujian: validasi form, tampilan badge status, dan responsivitas tabel",
        "📸 Screenshot tampilan web:\n- Form tambah tiket pelanggan baru yang sudah berjalan dengan baik\n- Notifikasi pop-up hijau 'Saved successfully' setelah data berhasil disimpan"
    ),
    (
        "21",
        "Rabu,\n5 Agustus 2026",
        "Dokumentasi kode program dan penyusunan laporan Bab III (Pelaksanaan dan Pembahasan): analisis sistem, perancangan DFD/ERD, dan implementasi sistem",
        "📸 Screenshot tampilan web:\n- Halaman tabel Master Data Keluhan yang menampilkan daftar jenis gangguan\n- Halaman manajemen User yang menampilkan daftar akun beserta tombol aksi"
    ),
    (
        "22",
        "Rabu,\n12 Agustus 2026",
        "Penyusunan laporan Bab IV (Hasil dan Pembahasan): pengujian Black Box Testing, pembahasan sistem, dan relevansi mata kuliah dengan kegiatan magang",
        "📸 Screenshot tampilan web:\n- Halaman tabel utama Data Pelanggan lengkap dengan kolom Kode Tiket, Keluhan (badge), Status (badge), dan tombol Lokasi Maps"
    ),
    (
        "23",
        "Kamis,\n21 Agustus 2026",
        "Finalisasi laporan magang secara keseluruhan (Bab I–V), persiapan presentasi, dan penarikan resmi peserta magang dari BRS NET",
        "📸 Foto bersama tim divisi IT BRS NET pada hari penarikan magang (foto langsung dengan kamera HP)"
    ),
]

# Create table: 4 columns
table = doc.add_table(rows=1, cols=4)
table.style = 'Table Grid'
table.allow_autofit = False

# Set column widths to sum to exactly 16.0 Cm (fits page size 21cm minus 3cm left and 2cm right margins)
col_widths = [Cm(1.2), Cm(2.8), Cm(7.0), Cm(5.0)]

# Header row
header_cells = table.rows[0].cells
headers = ['NO', 'HARI/TANGGAL', 'KEGIATAN', 'FOTO KEGIATAN\n(Catatan Screenshot)']
for i, (cell, text) in enumerate(zip(header_cells, headers)):
    cell.width = col_widths[i]
    set_cell_bg(cell, 'BDD7EE')
    set_cell_vertical_align(cell, 'center')
    p = cell.paragraphs[0]
    p.alignment = WD_ALIGN_PARAGRAPH.CENTER
    run = p.add_run(text)
    run.bold = True
    run.font.size = Pt(10)
    run.font.name = 'Times New Roman'

# Data rows
for entry in entries:
    row_cells = table.add_row().cells
    no, tanggal, kegiatan, screenshot = entry

    # Set widths for all cells in the row
    for i in range(4):
        row_cells[i].width = col_widths[i]

    # NO
    row_cells[0].text = ''
    set_cell_vertical_align(row_cells[0], 'center')
    p0 = row_cells[0].paragraphs[0]
    p0.alignment = WD_ALIGN_PARAGRAPH.CENTER
    r0 = p0.add_run(no)
    r0.font.size = Pt(10)
    r0.font.name = 'Times New Roman'

    # Libur: merge and center
    if 'LIBUR' in kegiatan:
        set_cell_bg(row_cells[1], 'FFF2CC')
        set_cell_bg(row_cells[2], 'FFF2CC')
        set_cell_bg(row_cells[3], 'FFF2CC')

    # TANGGAL
    row_cells[1].text = ''
    set_cell_vertical_align(row_cells[1], 'center')
    p1 = row_cells[1].paragraphs[0]
    p1.alignment = WD_ALIGN_PARAGRAPH.CENTER
    r1 = p1.add_run(tanggal)
    r1.font.size = Pt(9)
    r1.font.name = 'Times New Roman'
    if 'LIBUR' in kegiatan:
        r1.bold = True

    # KEGIATAN
    row_cells[2].text = ''
    set_cell_vertical_align(row_cells[2], 'center')
    p2 = row_cells[2].paragraphs[0]
    p2.alignment = WD_ALIGN_PARAGRAPH.LEFT
    r2 = p2.add_run(kegiatan)
    r2.font.size = Pt(10)
    r2.font.name = 'Times New Roman'
    if 'LIBUR' in kegiatan:
        r2.bold = True
        p2.alignment = WD_ALIGN_PARAGRAPH.CENTER

    # FOTO KEGIATAN
    row_cells[3].text = ''
    set_cell_vertical_align(row_cells[3], 'center')
    p3 = row_cells[3].paragraphs[0]
    p3.alignment = WD_ALIGN_PARAGRAPH.LEFT
    r3 = p3.add_run(screenshot)
    r3.font.size = Pt(8.5)
    r3.font.name = 'Times New Roman'
    if screenshot == '—':
        p3.alignment = WD_ALIGN_PARAGRAPH.CENTER

output_path = '/root/perkuliahan/projek-magang/Logbook_Magang_BRS_NET.docx'
doc.save(output_path)
print(f"File berhasil dibuat: {output_path}")
