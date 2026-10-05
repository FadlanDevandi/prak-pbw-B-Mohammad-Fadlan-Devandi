# LAPORAN PRAKTIKUM
# PEMROGRAMAN BERBASIS WEB

---

# TUGAS 4

## MODIFIKASI

### 1. Menambahkan Field Baru (`jenis_kelamin`) pada Tabel `mahasiswa`

Menambahkan field baru `jenis_kelamin` pada tabel `mahasiswa`.

---

# SOURCE CODE

## Sebelum

![Source Code Sebelum](screenshot%20tugas%204%20Praktikum%20PBW/sourcecodesebelum1tugas4.jpg)

```php
$sqlCreateTables = [
    "CREATE TABLE IF NOT EXISTS mahasiswa (
        id BIGINT
        UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nim VARCHAR(15) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL
        UNIQUE,
        prodi VARCHAR(80) NOT NULL,
        angkatan YEAR NOT NULL,
        ipk DECIMAL(3,2) DEFAULT 0.00
    ) ENGINE=InnoDB"
];
