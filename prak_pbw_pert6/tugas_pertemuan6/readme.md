# LAPORAN PRAKTIKUM
# PEMROGRAMAN BERBASIS WEB

---

# TUGAS 6

# 1. Modifikasi `Koneksi.php`

## MODIFIKASI

1. Menggunakan `mysqli_connect()` untuk menghubungkan PHP dengan database.
2. Menggunakan `mysqli_set_charset()` dengan utf8mb4 agar database dapat menangani berbagai karakter, termasuk simbol dan emoji.
3. Menambahkan tampilan status koneksi menggunakan HTML dan CSS.

---

# SOURCE CODE

## Sebelum

![Source Code Koneksi Sebelum](screenshot/sourcecodekoneksisebelum.png)

## Sesudah

![Source Code Koneksi Sesudah](screenshot/sourcecodekoneksisesudah.png)

---

# RUN

## Sebelum

![Run Koneksi Sebelum](screenshot/runkoneksisebelum.png)

## Sesudah

![Run Koneksi Sesudah](screenshot/runkoneksisesudah.png)

---

# 2. Modifikasi `Create.php`

## MODIFIKASI

1. Mengubah input prodi menjadi pilihan dropdown agar pengguna memilih prodi yang tersedia.
2. Validasi Angkatan dan IPK: Menambahkan batas angkatan 2000–2030 dan IPK 0–4 agar data yang dimasukkan sesuai ketentuan.

---

# SOURCE CODE

## Sebelum

![Source Code Create Sebelum](screenshot/sourcecodecreatesebelum.png)

## Sesudah

![Source Code Create Sesudah](screenshot/sourcecodecreatesesudah.png)

---

# RUN

## Sebelum

![Run Create Sebelum](screenshot/runcreatesebelum.png)

## Sesudah

![Run Create Sesudah](screenshot/runcreatesesudah.png)

![Run Create Sesudah 2](screenshot/runcreatesesudah2.png)

---

# 3. Modifikasi `Store.php`

## MODIFIKASI

1. Memeriksa kelengkapan data, format email, pilihan prodi, angkatan, dan IPK sebelum menyimpan data.
2. Memeriksa apakah NIM sudah terdaftar agar tidak terjadi penyimpanan data mahasiswa dengan NIM yang sama.

---

# SOURCE CODE

## Sebelum

![Source Code Store Sebelum](screenshot/sourcecodestoresebelum.png)

## Sesudah

![Source Code Store Sesudah](screenshot/sourcecodestoresesudah.png)

![Source Code Store Sesudah 2](screenshot/sourcecodestoresesudah2.png)

---

# RUN

## Sebelum

![Run Store Sebelum](screenshot/runstoresebelum.png)

## Sesudah

![Run Store Sesudah](screenshot/runstoresesudah.png)

---

# 4. Modifikasi `Index.php`

## MODIFIKASI

1. Menggunakan `ORDER BY nama ASC` agar data mahasiswa ditampilkan berdasarkan nama secara alfabetis.
2. Menggunakan `htmlspecialchars()` untuk mencegah teks dari database ditampilkan sebagai kode HTML atau JavaScript.

---

# SOURCE CODE

## Sebelum

![Source Code Index Sebelum](screenshot/sourcecodeindexsebelum.png)

## Sesudah

![Source Code Index Sesudah](screenshot/sourcecodeindexsesudah.png)

![Source Code Index Sesudah 2](screenshot/sourcecodeindexsesudah2.png)

---

# RUN

## Sebelum

![Run Index Sebelum](screenshot/runindexsebelum.png)

## Sesudah

![Run Index Sesudah](screenshot/runindexsesudah.png)

---

# 5. Modifikasi `Edit.php`

## MODIFIKASI

1. Menggunakan prepared statement untuk mencari data mahasiswa berdasarkan NIM yang dipilih.
2. Menampilkan data lama pada formulir dan memilih prodi yang sesuai dengan data mahasiswa.

---

# SOURCE CODE

## Sebelum

![Source Code Edit Sebelum](screenshot/sourcecodeeditsebelum.png)

## Sesudah

![Source Code Edit Sesudah](screenshot/sourcecodeeditsesudah.png)

![Source Code Edit Sesudah 2](screenshot/sourcecodeeditsesudah2.png)

---

# RUN

## Sebelum

![Run Edit Sebelum](screenshot/runeditsebelum.png)

## Sesudah

![Run Edit Sesudah](screenshot/runeditsesudah.png)

---

# 6. Modifikasi `Update.php`

## MODIFIKASI

1. Memeriksa format email, pilihan prodi, angkatan, dan IPK sebelum memperbarui data.
2. Menggunakan parameter pada query UPDATE untuk memperbarui data mahasiswa dengan lebih aman.

---

# SOURCE CODE

## Sebelum

![Source Code Update Sebelum](screenshot/sourcecodeupdatesebelum.png)

## Sesudah

![Source Code Update Sesudah](screenshot/sourcecodeupdatesesudah.png)

![Source Code Update Sesudah 2](screenshot/sourcecodeupdatesesudah2.png)

---

# RUN

## Sebelum

![Run Update Sebelum](screenshot/runupdatesebelum.png)

## Sesudah

![Run Update Sesudah](screenshot/runupdatesesudah.png)

---

# 7. Modifikasi `Delete.php`

## MODIFIKASI

1. Memeriksa apakah parameter NIM tersedia sebelum menjalankan proses penghapusan.
2. Menggunakan parameter pada query DELETE agar penghapusan data berdasarkan NIM dilakukan dengan lebih aman.

---

# SOURCE CODE

## Sebelum

![Source Code Delete Sebelum](screenshot/sourcecodedeletesebelum.png)

## Sesudah

![Source Code Delete Sesudah](screenshot/sourcecodedeletesesudah.png)

---

# RUN

## Sebelum

![Run Delete Sebelum](screenshot/rundeletesebelum.png)

## Sesudah

![Run Delete Sesudah](screenshot/rundeletesesudah.png)

---

# PENJELASAN LIMA BAGIAN KODE YANG PALING PENTING

## 1. Koneksi Database (`tugas6koneksi.php`)

```php
mysqli_connect()
```

Penjelasan:

Kode `mysqli_connect()` digunakan untuk menghubungkan program PHP dengan database MySQL bernama `akademik`.

---

## 2. Validasi Input (`tugas6store.php`)

Penjelasan:

Kode validasi digunakan untuk memeriksa data mahasiswa sebelum disimpan, seperti kelengkapan NIM dan nama, format email, pilihan program studi, batas angkatan, serta IPK antara 0 sampai 4.

---

## 3. Penyimpanan Data (`tugas6store.php`)

```sql
INSERT INTO mahasiswa
```

Penjelasan:

Kode `INSERT INTO mahasiswa` digunakan untuk menambahkan data mahasiswa baru ke database.

---

## 4. Menampilkan dan Mengurutkan Data (`tugas6index.php`)

```sql
SELECT * FROM mahasiswa ORDER BY nama ASC
```

Penjelasan:

Kode `SELECT * FROM mahasiswa ORDER BY nama ASC` digunakan untuk mengambil dan menampilkan seluruh data mahasiswa dengan urutan nama secara alfabetis.

---

## 5. Memperbarui Data (`tugas6update.php`)

```sql
UPDATE mahasiswa
```

Penjelasan:

Kode `UPDATE mahasiswa` digunakan untuk memperbarui data mahasiswa yang sudah ada berdasarkan NIM.

---

# ERROR YANG PERNAH MUNCUL

## Error: Unknown database 'akademik_tidak_ada'

Error ini muncul ketika nama database yang digunakan tidak sesuai dengan database yang tersedia.

---

# PENYEBAB

Nama database pada file `tugas6koneksi.php` diubah menjadi `akademik_tidak_ada`, sedangkan database yang sebenarnya digunakan adalah `akademik`.

---

# LANGKAH PERBAIKAN

Mengembalikan nilai `$dbname` menjadi `'akademik'`, memastikan database tersebut tersedia di MySQL melalui phpMyAdmin, kemudian menyimpan file dan mencoba koneksi kembali.

---

# HASIL

Koneksi dapat berjalan kembali setelah nama database sesuai dengan database yang tersedia.
