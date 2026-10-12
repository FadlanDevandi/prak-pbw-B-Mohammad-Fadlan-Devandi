# LAPORAN PRAKTIKUM
# PEMROGRAMAN BERBASIS WEB

---

# TUGAS 5

# 1. Modifikasi `Form.php`

## MODIFIKASI

1. Menambahkan dropdown pada prodi
2. Menambahkan field jenis kelamin

---

# SOURCE CODE

## Sebelum

![Source Code Sebelum](screenshots/sourcecodeformsebelum.png)

## Sesudah

![Source Code Sesudah](screenshots/sourcecodeformsesudah.png)

---

# RUN

## Sebelum

![Run Form Sebelum](screenshots/runformsebelum.png)

## Sesudah

![Run Form Sesudah](screenshots/runformsesudah.png)

![Run Form Sesudah 2](screenshots/runformsesudah2.png)

![Run Form Sesudah 3](screenshots/runformsesudah3.png)

---

# 2. Modifikasi `Simpan.php`

## MODIFIKASI

1. Validasi IPK di sisi server, sehingga nilai di luar rentang 0–4 ditolak.
2. Pengecekan NIM sebelum INSERT, sehingga NIM yang sudah digunakan tidak menyebabkan Fatal error karena duplikat.

---

# SOURCE CODE

## Sebelum

![Source Code Simpan Sebelum](screenshots/sourcecodesimpansebelum.png)

## Sesudah

![Source Code Simpan Sesudah](screenshots/sourcecodesimpansesudah.png)

---

# RUN

## Sebelum

![Run Simpan Sebelum](screenshots/runsimpansebelum.png)

## Sesudah

![Run Simpan Sesudah](screenshots/runsimpansesudah.png)

![Run Simpan Sesudah 2](screenshots/runsimpansesudah2.png)

---

# PENJELASAN SINGKAT LIMA BAGIAN KODE YANG PALING PENTING

## 1. Koneksi Database (`koneksi.php`)

```php
mysqli_connect()
```

Penjelasan:

Kode `mysqli_connect()` digunakan untuk menghubungkan PHP dengan database MySQL bernama `akademik`.

---

## 2. Menampilkan Data dari Database (`data.php`)

```php
mysqli_query()
```

Penjelasan:

Kode `mysqli_query()` digunakan untuk mengambil seluruh data dari tabel mahasiswa menggunakan perintah `SELECT * FROM mahasiswa`.

---

## 3. Form Input Data (`form.php`)

```html
<form>
```

Penjelasan:

Elemen HTML `<form>` digunakan untuk menerima data mahasiswa berupa NIM, nama, email, program studi, angkatan, dan IPK.

---

## 4. Menyimpan Data ke Database (`simpan.php`)

```php
$_POST
```

Penjelasan:

Variabel `$_POST` digunakan untuk mengambil data yang dikirim dari formulir. Data tersebut kemudian dimasukkan ke tabel mahasiswa menggunakan perintah SQL `INSERT INTO`.

---

## 5. Modifikasi Tugas `simpan.php`: Validasi IPK dan NIM Duplikat

Penjelasan:

Pada file tugas5simpan.php, ditambahkan validasi IPK agar nilainya berada di antara 0 dan 4. Selain itu, program memeriksa apakah NIM sudah terdaftar menggunakan query `SELECT` sebelum menyimpan data.

---

# ERROR YANG PERNAH MUNCUL

## Error: Duplicate entry for key nim

Error ini muncul ketika NIM yang dimasukkan sudah terdaftar di database.

---

# PENYEBAB

NIM yang dimasukkan sudah terdaftar di database. Kolom `nim` tidak mengizinkan nilai duplikat.

---

# LANGKAH PERBAIKAN

Saya menambahkan pengecekan NIM menggunakan query `SELECT` sebelum proses `INSERT`.

Jika NIM sudah terdaftar, program menampilkan pesan bahwa pengguna harus memakai NIM lain. Jika NIM belum terdaftar, data dapat disimpan.

---

# HASIL

Program berhasil menyimpan data dengan NIM baru dan menampilkan pesan Data berhasil disimpan.

---
