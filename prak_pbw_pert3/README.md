# LAPORAN PRAKTIKUM
# PEMROGRAMAN BERBASIS WEB

---

## NAMA MAHASISWA

| Keterangan | Data |
|---|---|
| Nama | Mohammad Fadlan Devandi |
| NPM | 4523210065 |
| Mata Kuliah | Pemrograman Berbasis Web |
| Tugas | Tugas 3 |

---

# TUGAS 3

## Modifikasi

### 1. Menambahkan Field Baru (`no_hp`) pada Tabel mahasiswa

```sql
no_hp VARCHAR(15) NOT NULL,
```

### 2. Menambahkan Field Baru (`alamat`) pada Tabel mahasiswa

```sql
alamat VARCHAR(200) NOT NULL,
```

---

# Source code:

## Sebelum:

![Source Code Sebelum](screenshot/sourcodesebelumtugas3.jpg)

```php
$sqlCreateTables = [
    "CREATE TABLE IF NOT EXISTS
    mahasiswa (
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

## Sesudah:

![Source Code Sesudah](screenshot/sourcodesudahtugas3.jpg)

```php
$sqlCreateTables = [
    "CREATE TABLE IF NOT EXISTS
    mahasiswa (
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

# Run

## Sebelum

![Database Sebelum](screenshot/database%20tugas3sebelum.jpg)

Struktur tabel `mahasiswa` sebelum dilakukan modifikasi:

- `id : bigint(20) unsigned`
- `nim : varchar(15)`
- `nama : varchar(100)`
- `email : varchar(120)`
- `prodi : varchar(80)`
- `angkatan : year(4)`
- `ipk : decimal(3,2)`

## Sesudah

![Database Sesudah](screenshot/database%20tugas3sesudah.jpg)

Struktur tabel `mahasiswa` setelah dilakukan modifikasi:

- `id : bigint(20) unsigned`
- `nim : varchar(15)`
- `nama : varchar(100)`
- `email : varchar(120)`
- `no_hp : varchar(15)`
- `alamat : varchar(200)`
- `prodi : varchar(80)`
- `angkatan : year(4)`
- `ipk : decimal(3,2)`

---

# Penjelasan 5 Bagian Kode yang Penting

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

Bagian ini digunakan untuk membuat database dengan nama `akademik`. Perintah `IF NOT EXISTS` membuat database hanya dibuat apabila database tersebut belum tersedia.

---

## 3. Memilih Database

```php
mysqli_select_db($koneksi, 'akademik');
```

Kode ini digunakan untuk memilih database `akademik` sebagai database yang akan digunakan untuk proses pembuatan tabel dan pengolahan data.

---

## 4. Membuat tabel

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

# Error yang Pernah Muncul

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

# Penyebab

Koneksi MySQL ditutup terlalu awal menggunakan:

```php
mysqli_close($koneksi);
```

---

# Langkah Perbaikan

Perintah:

```php
mysqli_close($koneksi);
```

dipindahkan ke bagian paling akhir program, setelah seluruh query selesai dijalankan.

Dengan demikian, koneksi MySQL tetap aktif selama proses pembuatan database dan tabel berlangsung, kemudian baru ditutup setelah seluruh proses selesai.

---

