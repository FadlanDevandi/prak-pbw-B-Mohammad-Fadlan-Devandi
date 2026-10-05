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

![Source Code Sebelum 1](<prak_pbw_pert4/screenshot tugas 4 Praktikum PBW/sourcecodesebelum1tugas4.jpg>)

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
```

## Sesudah

![Source Code Sesudah](sourcecodesesudah1tugas4.jpg)

```php
$sqlCreateTables = [
    // Modifikasi 1: Menambahkan field jenis_kelamin
    "CREATE TABLE IF NOT EXISTS mahasiswa (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nim VARCHAR(15) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL UNIQUE,
        prodi VARCHAR(80) NOT NULL,
        angkatan YEAR NOT NULL,
        ipk DECIMAL(3,2) DEFAULT 0.00,
        jenis_kelamin ENUM('L', 'P') DEFAULT 'L'
    ) ENGINE=InnoDB"
];
```

---

# RUN

## Sebelum

![Database Sebelum](rundatabasesebelumtugas4.jpg)

Struktur tabel `mahasiswa` sebelum dilakukan modifikasi:

- `id`
- `nim`
- `nama`
- `email`
- `prodi`
- `angkatan`
- `ipk`

## Sesudah

![Database Sesudah](rundatabasesudahtugas4.jpg)

Struktur tabel `mahasiswa` setelah dilakukan modifikasi:

- `id`
- `nim`
- `nama`
- `email`
- `prodi`
- `angkatan`
- `ipk`
- `jenis_kelamin`

---

# 2. Menambahkan Validasi & Logika Error Handling pada Proses Pembuatan Tabel

Menambahkan validasi untuk mengecek apakah koneksi database berhasil, serta penanganan error yang lebih informatif.

Jika pembuatan tabel gagal, script akan menampilkan:

- Nama tabel yang gagal
- Kode error MySQL
- Pesan error

---

# SOURCE CODE

## Sebelum

![Source Code Sebelum](sourcecodese%20belum2tugas4.jpg)

```php
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";

if (mysqli_query($koneksi, $sqlCreateDB)) {
    echo "Database berhasil dibuat atau sudah ada.\n";
} else {
    echo "Error membuat database: " . mysqli_error($koneksi) . "\n";
}

mysqli_set_charset($koneksi, "utf8mb4");

mysqli_select_db($koneksi, 'akademik');

foreach ($sqlCreateTables as $namaTabel => $query) {
    if (mysqli_query($koneksi, $query)) {
        echo
        "Tabel berhasil dibuat atau sudah ada.\n";
    } else {
        echo "Gagal membuat tabel: "
        . mysqli_error($koneksi) . "\n";
    }
}
```

## Sesudah

![Source Code Sesudah](sourcecodesesudah2tugas4.jpg)

### Validasi Koneksi Database

```php
// Modifikasi 2: Validasi koneksi database
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";

if (mysqli_query($koneksi, $sqlCreateDB)) {
    echo "[OK] Database berhasil dibuat atau sudah ada.\n";
} else {
    echo "[ERROR] Gagal membuat database: "
        . mysqli_error($koneksi) . "\n";

    exit; // Modifikasi 2: hentikan script jika database gagal dibuat
}
```

### Array Nama Tabel Agar Pesan Error Lebih Informatif

```php
// Modifikasi 2: Array nama tabel agar pesan error lebih informatif
$namaTabel = ['mahasiswa', 'dosen', 'mata_kuliah'];

foreach ($sqlCreateTables as $index => $query) {

    if (mysqli_query($koneksi, $query)) {

        echo "[OK] Tabel {$namaTabel[$index]} berhasil dibuat atau sudah ada.\n";

    } else {

        // Modifikasi 2: Pesan error lebih detail dan hentikan proses
        echo "[ERROR] Gagal membuat tabel: {$namaTabel[$index]}\n";
        echo "Kode Error : " . mysqli_errno($koneksi) . "\n";
        echo "Pesan Error: " . mysqli_error($koneksi) . "\n";

        exit; // Hentikan script agar tidak lanjut error berantai
    }
}
```

---

# RUN

## Sebelum

![Run Sebelum](runsebelumtugas4.jpg)

Program dijalankan sebelum penambahan validasi koneksi database dan error handling.

## Sesudah

![Run Sesudah](runsudahtugas4.jpg)

Program dijalankan setelah penambahan validasi koneksi database dan error handling.

Hasil program menampilkan informasi yang lebih jelas ketika proses berhasil maupun ketika terjadi kesalahan.

---

# PENJELASAN 5 BAGIAN KODE YANG PENTING

## 1. `require_once 'koneksi.php';`

```php
require_once 'koneksi.php';
```

Penjelasan:

Menghubungkan file utama dengan file konfigurasi database agar tidak perlu menulis ulang kredensial dan koneksi hanya dimuat sekali.

---

## 2. Membuat Database

```php
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";
```

Penjelasan:

Kode tersebut digunakan untuk membuat database dengan nama `akademik`.

Perintah `IF NOT EXISTS` digunakan agar database tidak dibuat ulang apabila database tersebut sudah tersedia.

---

## 3. Memilih Database

```php
mysqli_select_db($koneksi, 'akademik');
```

Penjelasan:

Kode tersebut digunakan untuk memilih database `akademik` yang akan digunakan dalam proses pembuatan dan pengolahan tabel.

---

## 4. Validasi Koneksi Database

```php
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
```

Penjelasan:

Kode tersebut digunakan untuk mengecek apakah koneksi ke database berhasil.

Jika koneksi gagal, program akan dihentikan dan menampilkan pesan error koneksi database.

---

## 5. Error Handling

```php
echo "[ERROR] Gagal membuat tabel: {$namaTabel[$index]}\n";
echo "Kode Error : " . mysqli_errno($koneksi) . "\n";
echo "Pesan Error: " . mysqli_error($koneksi) . "\n";
```

Penjelasan:

Kode tersebut digunakan untuk menampilkan informasi error secara lebih lengkap.

Informasi yang ditampilkan meliputi:

- Nama tabel yang mengalami error
- Kode error MySQL
- Pesan error dari MySQL

Dengan informasi tersebut, proses pencarian dan perbaikan kesalahan menjadi lebih mudah.

---

# ERROR YANG PERNAH MUNCUL

## Error: Cannot add foreign key constraint

```text
Kode Error: 1215
```

Error ini muncul saat membuat tabel `mata_kuliah`.

---

# PENYEBAB

Error terjadi karena urutan pembuatan tabel tidak tepat.

Tabel `mata_kuliah` dibuat sebelum tabel `dosen` ada, sehingga MySQL tidak dapat membuat foreign key yang mengarah ke tabel `dosen`.

Penyebab lain dapat terjadi karena tipe data kolom `dosen_id` tidak sama dengan kolom `id` pada tabel `dosen`.

Kedua kolom harus menggunakan:

```text
BIGINT UNSIGNED
```

Selain itu, engine tabel harus menggunakan:

```text
InnoDB
```

karena foreign key didukung oleh engine InnoDB.

---

# LANGKAH PERBAIKAN

### 1. Pastikan Urutan Pembuatan Tabel Benar

Tabel `dosen` harus dibuat sebelum tabel `mata_kuliah`, karena `mata_kuliah` mereferensikan tabel `dosen`.

### 2. Pastikan Tipe Data Kolom Sama

Pastikan tipe data kolom yang direferensikan sama persis:

```text
BIGINT UNSIGNED
```

di kedua sisi.

### 3. Pastikan Engine Tabel Sama

Pastikan kedua tabel menggunakan:

```text
InnoDB
```

Foreign key tidak didukung oleh engine MyISAM.

### 4. Cek Struktur Tabel

Gunakan perintah:

```sql
SHOW CREATE TABLE dosen;
```

Kemudian:

```sql
SHOW CREATE TABLE mata_kuliah;
```

Perintah tersebut digunakan untuk mengecek struktur tabel dan memastikan konfigurasi foreign key sudah sesuai.

---

