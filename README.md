# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS WEB

## PERTEMUAN 1

### NAMA MAHASISWA
| Keterangan | Data |
|---|---|
| Nama | Mohammad Fadlan Devandi |
| Mata Kuliah | Pemrograman Berbasis Web |
| Pertemuan | Pertemuan 1 |

#TUGAS 1
1. kalkulator.php
   Source Code Sebelum Modifikasi
   ![Code Kalkulator Sebelum](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_kalkulator_sebelum.png)
   ![Code Kalkulator Sebelum](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_kalkulator_sebelum2.png)

   Output Sebelum Modifikasi
   ![Kalkulator Sebelum](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/kalkulator_sebelum.png)
   
   MODIFIKASI
   Modifikasi 1 menambahkan operator pangkat (^) pada kalkulator. Operasi ini menggunakan operator ** pada PHP
   sehingga pengguna dapat menghitung nilai perpangkatan, contohnya 2 pangkat 3 menghasilkan 8.
   
   Modifikasi 2
   menambahkan operator modulus (%) untuk menghitung sisa hasil pembagian. Saya juga menambahkan validasi agar modulus
   dengan angka 0 tidak diperbolehkan.


   Source Code Sesudah Modifikasi
   ![Code Kalkulator Sesudah](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_kalkulator_sesudah.png)
   ![Code Kalkulator Sesudah](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_kalkulator_sesudah2.png)

   Output Sesudah Modifikasi
   ![Kalkulator Sesudah](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/kalkulator_sesudah.png)


2. Biodata.php
   **Source Code Sebelum Modifikasi**

![Code Biodata Sebelum](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_biodata_sebelum.png)


**Output Sebelum Modifikasi**

![Biodata Sebelum](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/biodata_sebelum.png)

### MODIFIKASI

Modifikasi 1
menambahkan field email pada data mahasiswa. Field ini digunakan untuk menyimpan dan menampilkan alamat email mahasiswa. Karena data ditampilkan menggunakan foreach, email secara otomatis ditampilkan pada halaman biodata.

Modifikasi 2 
menambahkan fungsi statusMahasiswa() untuk menentukan status mahasiswa berdasarkan semester. Semester 1–2 dikategorikan sebagai Mahasiswa Baru, semester 3–6 sebagai Mahasiswa Aktif, dan semester 7 ke atas sebagai Mahasiswa Tingkat Akhir.


### Source Code Sesudah Modifikasi

![Code Biodata Sesudah](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_biodata_sesudah.png)

![Code Biodata Sesudah 2](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_biodata_sesudah2.png)

### Output Sesudah Modifikasi

![Biodata Sesudah](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/biodata_sesudah.png)
   

#TUGAS 2
1. identitas.php
   ### Identitas PHP

**Source Code Sebelum Modifikasi**

![Code Identitas Sebelum](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_identitas_sebelum.png)

![Code Identitas Sebelum 2](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_identitas_sebelum2.png)

**Output Sebelum Modifikasi**

![Identitas Sebelum](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/identitas_sebelum.png)

### MODIFIKASI

Modifikasi 1
menambahkan atribut prodi pada class Mahasiswa. Data program studi dimasukkan melalui constructor dan ditampilkan pada method ringkasan().

Modifikasi 2
menambahkan method predikat() untuk menentukan predikat mahasiswa berdasarkan nilai IPK. Jika IPK ≥ 3,50 maka predikatnya "Sangat Memuaskan", jika IPK ≥ 3,00 maka "Memuaskan", dan jika di bawah 3,00 maka "Perlu Peningkatan".



### Source Code Sesudah Modifikasi

![Code Identitas Sesudah](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_identitas_sesudah.png)

![Code Identitas Sesudah 2](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_identitas_sesudah2.png)

### Output Sesudah Modifikasi

![Identitas Sesudah](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/identitas_sesudah.png)

2. identitas.php
   ### Hitung PHP

**Source Code Sebelum Modifikasi**

![Code Hitung Sebelum](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_hitung_sebelum.png)

**Output Sebelum Modifikasi**

![Hitung Sebelum](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/hitung_sebelum.png)

### MODIFIKASI

**Modifikasi 1**

Menambahkan **produk baru berupa Headset** ke dalam daftar produk. Produk Headset memiliki harga Rp300.000 dan dapat dihitung menggunakan method `hargaAkhir()` seperti produk lainnya.

**Modifikasi 2**

Menambahkan **produk dengan diskon berbeda**, yaitu Headset dengan diskon 10%. Program secara otomatis menghitung harga akhir setelah diskon menggunakan class `ProdukDiskon`.

### Source Code Sesudah Modifikasi

![Code Hitung Sesudah](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_hitung_sesudah.png)

![Code Hitung Sesudah 2](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/code_hitung_sesudah2.png)

### Output Sesudah Modifikasi

![Hitung Sesudah](screenshot/screenshot%20tugas%202%20Praktikum%20PBW/hitung_sesudah.png)



