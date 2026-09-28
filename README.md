# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS WEB

## PERTEMUAN 1

### NAMA MAHASISWA

| Keterangan | Data |
|---|---|
| Nama | Mohammad Fadlan Devandi |
| Mata Kuliah | Pemrograman Berbasis Web |
| Pertemuan | Pertemuan 1 |

---

# TUGAS 1

## 1. kalkulator.php

### Source Code Sebelum Modifikasi

![Code Kalkulator Sebelum](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_kalkulator_sebelum.png)

![Code Kalkulator Sebelum](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_kalkulator_sebelum2.png)

### Output Sebelum Modifikasi

![Kalkulator Sebelum](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/kalkulator_sebelum.png)

### MODIFIKASI

**Modifikasi 1**

menambahkan operator pangkat (^) pada kalkulator. Operasi ini menggunakan operator ** pada PHP sehingga pengguna dapat menghitung nilai perpangkatan, contohnya 2 pangkat 3 menghasilkan 8.

**Modifikasi 2**

menambahkan operator modulus (%) untuk menghitung sisa hasil pembagian. Saya juga menambahkan validasi agar modulus dengan angka 0 tidak diperbolehkan.

### Source Code Sesudah Modifikasi

![Code Kalkulator Sesudah](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_kalkulator_sesudah.png)

![Code Kalkulator Sesudah](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_kalkulator_sesudah2.png)

### Output Sesudah Modifikasi

![Kalkulator Sesudah](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/kalkulator_sesudah.png)

---

## 2. Biodata.php

### Source Code Sebelum Modifikasi

![Code Biodata Sebelum](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_biodata_sebelum.png)

### Output Sebelum Modifikasi

![Biodata Sebelum](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/biodata_sebelum.png)

### MODIFIKASI

**Modifikasi 1**

menambahkan field email pada data mahasiswa. Field ini digunakan untuk menyimpan dan menampilkan alamat email mahasiswa. Karena data ditampilkan menggunakan foreach, email secara otomatis ditampilkan pada halaman biodata.

**Modifikasi 2**

menambahkan fungsi statusMahasiswa() untuk menentukan status mahasiswa berdasarkan semester. Semester 1–2 dikategorikan sebagai Mahasiswa Baru, semester 3–6 sebagai Mahasiswa Aktif, dan semester 7 ke atas sebagai Mahasiswa Tingkat Akhir.

### Source Code Sesudah Modifikasi

![Code Biodata Sesudah](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_biodata_sesudah.png)

![Code Biodata Sesudah 2](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_biodata_sesudah2.png)

### Output Sesudah Modifikasi

![Biodata Sesudah](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/biodata_sesudah.png)

---

# TUGAS 2

## 1. identitas.php

### Identitas PHP

### Source Code Sebelum Modifikasi

![Code Identitas Sebelum](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_identitas_sebelum.png)

![Code Identitas Sebelum 2](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_identitas_sebelum2.png)

### Output Sebelum Modifikasi

![Identitas Sebelum](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/identitas_sebelum.png)

### MODIFIKASI

**Modifikasi 1**

menambahkan atribut prodi pada class Mahasiswa. Data program studi dimasukkan melalui constructor dan ditampilkan pada method ringkasan().

**Modifikasi 2**

menambahkan method predikat() untuk menentukan predikat mahasiswa berdasarkan nilai IPK. Jika IPK ≥ 3,50 maka predikatnya "Sangat Memuaskan", jika IPK ≥ 3,00 maka "Memuaskan", dan jika di bawah 3,00 maka "Perlu Peningkatan".

### Source Code Sesudah Modifikasi

![Code Identitas Sesudah](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_identitas_sesudah.png)

![Code Identitas Sesudah 2](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_identitas_sesudah2.png)

### Output Sesudah Modifikasi

![Identitas Sesudah](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/identitas_sesudah.png)

---

## 2. identitas.php

### Hitung PHP

### Source Code Sebelum Modifikasi

![Code Hitung Sebelum](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_hitung_sebelum.png)

### Output Sebelum Modifikasi

![Hitung Sebelum](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/hitung_sebelum.png)

### MODIFIKASI

**Modifikasi 1**

Menambahkan produk Headset pada array $daftar. Produk Headset dibuat menggunakan class ProdukDiskon dengan harga Rp300.000 dan diskon 10%, sehingga harga akhirnya menjadi Rp270.000.

**Modifikasi 2**

Mengubah harga Mouse dari Rp150.000 menjadi Rp200.000. Diskon Mouse tetap 10%, sehingga harga akhirnya berubah dari Rp135.000 menjadi Rp180.000.

### Source Code Sesudah Modifikasi

![Code Hitung Sesudah](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_hitung_sesudah.png)

![Code Hitung Sesudah 2](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_hitung_sesudah2.png)

### Output Sesudah Modifikasi

![Hitung Sesudah](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/hitung_sesudah.png)

---

# 5 Bagian Kode yang Paling Penting

## 1. Interface `BisaDihitung`

```php
interface BisaDihitung
{
    public function hargaAkhir(): float;
}
```

Interface BisaDihitung digunakan sebagai aturan bahwa class yang mengimplementasikannya harus memiliki method hargaAkhir(). Method tersebut digunakan untuk menghitung harga akhir produk.

## 2. Constructor pada Class Produk

```php
public function __construct(
    protected string $nama,
    protected float $harga
) {}
```

Constructor digunakan untuk memberikan nilai awal pada object ketika object dibuat. Pada program ini, constructor menerima nama dan harga produk.

## 3. Inheritance pada ProdukDiskon

```php
class ProdukDiskon extends Produk
```

Kode tersebut menunjukkan konsep inheritance atau pewarisan. ProdukDiskon merupakan turunan dari Produk, sehingga dapat menggunakan property dan method yang terdapat pada class Produk.

## 4. Perhitungan Harga Setelah Diskon

```php
public function hargaAkhir(): float
{
    return $this->harga * (1 - $this->diskon / 100);
}
```

Method hargaAkhir() digunakan untuk menghitung harga produk setelah dikurangi diskon. Perhitungan dilakukan berdasarkan harga awal dan persentase diskon.

## 5. Perulangan foreach

```php
foreach ($daftar as $produk) {
    echo $produk->getNama() . ' Rp. ' .
        number_format($produk->hargaAkhir(), 0, ',', '.') . '<br>';
}
```

foreach digunakan untuk mengambil setiap object produk yang terdapat di dalam array $daftar. Kemudian nama dan harga akhir setiap produk ditampilkan pada halaman.

---

# Error yang Pernah Muncul

## Error: Author identity unknown

Salah satu error yang muncul saat menggunakan Git adalah:

```text
Author identity unknown
```

### Penyebab

Error tersebut terjadi karena Git belum memiliki konfigurasi nama dan email pengguna. Git membutuhkan informasi tersebut untuk mengetahui identitas pengguna yang melakukan commit.

### Langkah Perbaikan

Saya memperbaikinya dengan mengatur nama pengguna Git menggunakan:

```bash
git config --global user.name "Fadlan Devandi"
```

Kemudian mengatur email:

```bash
git config --global user.email "EMAIL_GITHUB"
```

Setelah konfigurasi berhasil, saya melakukan commit kembali:

```bash
git commit -m "Menambahkan laporan dan screenshot"
```

Kemudian perubahan dikirim ke repository GitHub menggunakan:

```bash
git push
```
