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

![Code Biodata Sebelum 2](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_biodata_sebelum2.png)

**Output Sebelum Modifikasi**

![Biodata Sebelum](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/biodata_sebelum.png)

### MODIFIKASI

**Modifikasi 1**

Menambahkan **program studi (prodi)** pada data mahasiswa. Program studi dimasukkan sebagai data baru pada array `$mahasiswa` dan kemudian ditampilkan pada halaman biodata.

**Modifikasi 2**

Menambahkan **status kelulusan berdasarkan IPK**. Program menggunakan fungsi `statusKelulusan()` untuk menentukan keterangan berdasarkan nilai IPK. Jika IPK ≥ 3.50 maka statusnya **"Sangat Memuaskan"**, jika IPK ≥ 3.00 maka **"Memuaskan"**, dan jika kurang dari 3.00 maka **"Perlu Peningkatan"**.

### Source Code Sesudah Modifikasi

![Code Biodata Sesudah](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_biodata_sesudah.png)

![Code Biodata Sesudah 2](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/code_biodata_sesudah2.png)

### Output Sesudah Modifikasi

![Biodata Sesudah](screenshot/screenshot%20tugas%201%20Praktikum%20PBW/biodata_sesudah.png)
   


