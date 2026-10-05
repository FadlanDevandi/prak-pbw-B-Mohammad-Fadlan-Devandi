# LAPORAN PRAKTIKUM
# PEMROGRAMAN BERBASIS WEB

---

## TUGAS 3

### NAMA MAHASISWA

| Keterangan | Data |
|---|---|
| Nama | Mohammad Fadlan Devandi |
| NPM | 4523210065 |
| Mata Kuliah | Pemrograman Berbasis Web |
| Tugas | Tugas 3 |

---

# MODIFIKASI

## 1. Menambahkan Field Baru (`no_hp`) pada Tabel `mahasiswa`

Menambahkan field baru:

```sql
no_hp VARCHAR(15) NOT NULL,
```

## 2. Menambahkan Field Baru (`alamat`) pada Tabel `mahasiswa`

Menambahkan field baru:

```sql
alamat VARCHAR(200) NOT NULL,
```

---

# SOURCE CODE

## Sebelum

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
    ) ENGINE=InnoDB",

    "CREATE TABLE IF NOT EXISTS dosen (
        id BIGINT
        UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nidn VARCHAR(20) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL
        UNIQUE
    ) ENGINE=InnoDB"
];
```

## Sesudah

```php
$sqlCreateTables = [
    "CREATE TABLE IF NOT EXISTS mahasiswa (
        id BIGINT
        UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nim VARCHAR(15) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL
        UNIQUE,

        no_hp VARCHAR(15) NOT NULL,
        alamat VARCHAR(200) NOT NULL,

        prodi VARCHAR(80) NOT NULL,
        angkatan YEAR NOT NULL,
        ipk DECIMAL(3,2) DEFAULT 0.00
    ) ENGINE=InnoDB",

    "CREATE TABLE IF NOT EXISTS dosen (
        id BIGINT
        UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nidn VARCHAR(20) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL
        UNIQUE
    ) ENGINE=InnoDB"
];
```

---

# RUN

## Sebelum

Struktur tabel `mahasiswa` sebelum dilakukan modifikasi:

- `id`
- `nim`
- `nama`
- `email`
- `prodi`
- `angkatan`
- `ipk`

## Sesudah

Struktur tabel `mahasiswa` setelah dilakukan modifikasi:

- `id`
- `nim`
- `nama`
- `email`
- `no_hp`
- `alamat`
- `prodi`
- `angkatan`
- `ipk`

Penambahan field `no_hp` dan `alamat` terlihat pada struktur tabel database.

---

# PENJELASAN 5 BAGIAN KODE YANG PENTING

## 1. Koneksi ke MySQL

```php
require_once 'koneksi.php';
```

Kode ini digunakan untuk memanggil file `koneksi.php` yang berisi konfigurasi dan koneksi PHP dengan server MySQL. Dengan adanya koneksi ini, program dapat menjalankan perintah SQL melalui PHP.

---

## 2. Membuat Database

```php
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";
```

```php
if (mysqli_query($koneksi, $sqlCreateDB)) {
    echo "Database berhasil dibuat atau sudah ada.\n";
}
```

Bagian ini digunakan untuk membuat database dengan nama `akademik`.

Perintah `IF NOT EXISTS` membuat database hanya dibuat apabila database tersebut belum tersedia.

---

## 3. Memilih Database

```php
mysqli_select_db($koneksi, 'akademik');
```

Kode ini digunakan untuk memilih database `akademik` sebagai database yang akan digunakan untuk proses pembuatan tabel dan pengolahan data.

---

## 4. Membuat Tabel

```php
$sqlCreateTables = [
    "CREATE TABLE IF NOT EXISTS mahasiswa (...) ENGINE=InnoDB",
    "CREATE TABLE IF NOT EXISTS dosen (...) ENGINE=InnoDB",
    "CREATE TABLE IF NOT EXISTS mata_kuliah (...) ENGINE=InnoDB",
    "CREATE TABLE IF NOT EXISTS krs (...) ENGINE=InnoDB",
    "CREATE TABLE IF NOT EXISTS mk_krs (...) ENGINE=InnoDB"
];
```

Bagian ini berisi kumpulan perintah SQL untuk membuat tabel-tabel yang dibutuhkan dalam database `akademik`.

Tabel tersebut terdiri dari:

1. `mahasiswa`
2. `dosen`
3. `mata_kuliah`
4. `krs`
5. `mk_krs`

---

## 5. Menjalankan Query Pembuatan Tabel

```php
foreach ($sqlCreateTables as $namaTabel => $query) {
    if (mysqli_query($koneksi, $query)) {
        echo "Tabel berhasil dibuat atau sudah ada.\n";
    } else {
        echo "Gagal membuat tabel: "
        . mysqli_error($koneksi) . "\n";
    }
}
```

`foreach` digunakan untuk menjalankan setiap query yang terdapat dalam array `$sqlCreateTables`.

Jika query berhasil dijalankan, program menampilkan pesan berhasil.

Jika terjadi kesalahan, program menampilkan pesan error dari MySQL.

---

# ERROR YANG PERNAH MUNCUL

Error yang pernah muncul adalah:

```text
Fatal error: Uncaught Error:
mysqli object is already closed
```

Error tersebut terjadi ketika program mencoba menggunakan koneksi `$koneksi` setelah koneksi MySQL sudah ditutup dengan:

```php
mysqli_close($koneksi);
```

Akibatnya, fungsi seperti:

```php
mysqli_select_db($koneksi, 'akademik');
```

tidak dapat dijalankan lagi karena objek koneksi sudah ditutup.

---

# PENYEBAB

Koneksi MySQL ditutup terlalu awal menggunakan:

```php
mysqli_close($koneksi);
```

---

# LANGKAH PERBAIKAN

Perintah:

```php
mysqli_close($koneksi);
```

dipindahkan ke bagian paling akhir program, setelah seluruh query selesai dijalankan.

Dengan demikian, koneksi MySQL tetap aktif selama proses pembuatan database dan tabel berlangsung, kemudian baru ditutup setelah seluruh proses selesai.

---

# KESIMPULAN TUGAS 3

Pada Tugas 3 dilakukan modifikasi pada tabel `mahasiswa` dengan menambahkan dua field baru, yaitu:

```text
no_hp VARCHAR(15) NOT NULL
alamat VARCHAR(200) NOT NULL
```

Modifikasi tersebut menyebabkan struktur tabel `mahasiswa` menjadi lebih lengkap karena memiliki informasi nomor telepon dan alamat.

Selain itu, dilakukan pemahaman terhadap beberapa bagian penting kode PHP, seperti koneksi ke MySQL, pembuatan database, pemilihan database, pembuatan tabel, dan proses menjalankan query.

Permasalahan koneksi MySQL `mysqli object is already closed` juga diperbaiki dengan memindahkan `mysqli_close($koneksi);` ke bagian akhir program.

---

# TUGAS 4

## MODIFIKASI

### 1. Menambahkan Field Baru (`jenis_kelamin`) pada Tabel `mahasiswa`

Pada Tugas 4 dilakukan penambahan field baru pada tabel `mahasiswa`, yaitu:

```text
jenis_kelamin
```

Source code sebelum modifikasi:

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

Source code sesudah modifikasi:

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

Field `jenis_kelamin` menggunakan tipe data:

```sql
ENUM('L', 'P')
```

dengan nilai default:

```sql
'L'
```

---

# RUN TUGAS 4

## Sebelum

Struktur tabel `mahasiswa` sebelum modifikasi:

- `id`
- `nim`
- `nama`
- `email`
- `prodi`
- `angkatan`
- `ipk`

## Sesudah

Struktur tabel `mahasiswa` setelah modifikasi:

- `id`
- `nim`
- `nama`
- `email`
- `prodi`
- `angkatan`
- `ipk`
- `jenis_kelamin`

Penambahan field `jenis_kelamin` dapat dilihat pada struktur tabel database.

---

# 2. MENAMBAHKAN VALIDASI & LOGIKA ERROR HANDLING PADA PROSES PEMBUATAN TABEL

Menambahkan validasi untuk mengecek apakah koneksi database berhasil, serta penanganan error yang lebih informatif.

Jika pembuatan tabel gagal, script akan menampilkan:

- Nama tabel yang gagal
- Kode error MySQL
- Pesan error

---

# SOURCE CODE

## Sebelum

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

---

# SESUDAH

## Validasi Koneksi Database

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

---

## Array Nama Tabel Agar Pesan Error Lebih Informatif

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

# RUN TUGAS 4

## Sebelum

Program dijalankan tanpa validasi koneksi database dan tanpa pesan error yang lebih detail.

## Sesudah

Program telah ditambahkan validasi koneksi database dan error handling.

Jika koneksi database gagal, program akan menampilkan pesan:

```text
Koneksi database gagal
```

Jika terjadi kesalahan ketika membuat tabel, program akan menampilkan:

```text
[ERROR] Gagal membuat tabel
Kode Error
Pesan Error
```

Dengan demikian, proses troubleshooting menjadi lebih mudah karena informasi error yang ditampilkan lebih lengkap.

---

# PENJELASAN 5 BAGIAN KODE YANG PENTING

## 1. `require_once 'koneksi.php';`

```php
require_once 'koneksi.php';
```

Penjelasan:

Menghubungkan file utama dengan file konfigurasi database agar tidak perlu menulis ulang kredensial dan koneksi hanya dimuat sekali.

---

## 2. `require_once 'koneksi.php';`

```php
require_once 'koneksi.php';
```

Penjelasan:

Menghubungkan file utama dengan file konfigurasi database agar tidak perlu menulis ulang kredensial dan koneksi hanya dimuat sekali.

---

## 3. `require_once 'koneksi.php';`

```php
require_once 'koneksi.php';
```

Penjelasan:

Menghubungkan file utama dengan file konfigurasi database agar tidak perlu menulis ulang kredensial dan koneksi hanya dimuat sekali.

---

## 4. `require_once 'koneksi.php';`

```php
require_once 'koneksi.php';
```

Penjelasan:

Menghubungkan file utama dengan file konfigurasi database agar tidak perlu menulis ulang kredensial dan koneksi hanya dimuat sekali.

---

## 5. `require_once 'koneksi.php';`

```php
require_once 'koneksi.php';
```

Penjelasan:

Menghubungkan file utama dengan file konfigurasi database agar tidak perlu menulis ulang kredensial dan koneksi hanya dimuat sekali.

---

# ERROR YANG PERNAH MUNCUL

## Error: Cannot add foreign key constraint

```text
Kode Error: 1215
```

Penyebab:

Error ini muncul saat membuat tabel `mata_kuliah`.

Penyebabnya adalah urutan pembuatan tabel tidak tepat — tabel `mata_kuliah` dibuat sebelum tabel `dosen` ada, sehingga MySQL tidak bisa membuat foreign key yang mengarah ke tabel `dosen`.

Penyebab lain bisa juga karena tipe data kolom `dosen_id` tidak sama dengan kolom `id` di tabel `dosen`.

Keduanya harus menggunakan:

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

### 1. Pastikan urutan pembuatan tabel benar

Tabel `dosen` harus dibuat sebelum tabel `mata_kuliah`, karena `mata_kuliah` mereferensikan tabel `dosen`.

### 2. Pastikan tipe data kolom sama

Pastikan tipe data kolom yang direferensikan sama persis, yaitu:

```text
BIGINT UNSIGNED
```

di kedua sisi.

### 3. Pastikan engine tabel sama

Pastikan kedua tabel menggunakan:

```text
InnoDB
```

karena foreign key tidak didukung oleh engine MyISAM.

### 4. Jalankan perintah berikut untuk mengecek struktur tabel

```sql
SHOW CREATE TABLE dosen;
```

```sql
SHOW CREATE TABLE mata_kuliah;
```

---

# KESIMPULAN

Berdasarkan praktikum yang telah dilakukan, modifikasi database berhasil dilakukan dengan menambahkan beberapa field baru pada tabel `mahasiswa`, yaitu `no_hp`, `alamat`, dan `jenis_kelamin`.

Selain itu, program juga dikembangkan dengan menambahkan validasi koneksi database serta error handling yang lebih informatif.

Error yang terjadi selama proses pembuatan database dan tabel dapat diketahui penyebabnya dan diperbaiki dengan melakukan pengecekan koneksi, urutan pembuatan tabel, tipe data foreign key, serta penggunaan engine InnoDB.

Dengan adanya modifikasi dan validasi tersebut, program menjadi lebih informatif dan lebih mudah dalam proses troubleshooting.
