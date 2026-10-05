<?php
require_once 'koneksi.php';

// Modifikasi 2: Validasi koneksi database
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";

if (mysqli_query($koneksi, $sqlCreateDB)) {
    echo "[OK] Database berhasil dibuat atau sudah ada.\n";
} else {
    echo "[ERROR] Gagal membuat database: " . mysqli_error($koneksi) . "\n";
    exit; // Modifikasi 2: hentikan script jika database gagal dibuat
}

mysqli_set_charset($koneksi, "utf8mb4");
mysqli_select_db($koneksi, 'akademik');

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
    ) ENGINE=InnoDB",

    "CREATE TABLE IF NOT EXISTS dosen (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nidn VARCHAR(20) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL UNIQUE
    ) ENGINE=InnoDB",

    "CREATE TABLE IF NOT EXISTS mata_kuliah (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        kode_mk VARCHAR(12) NOT NULL UNIQUE,
        nama_mk VARCHAR(100) NOT NULL,
        sks TINYINT UNSIGNED NOT NULL,
        dosen_id BIGINT UNSIGNED,
        CONSTRAINT fk_mk_dosen
        FOREIGN KEY (dosen_id) REFERENCES dosen(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
    ) ENGINE=InnoDB"
];

// Modifikasi 2: Array nama tabel agar pesan error lebih informatif
$namaTabel = ['mahasiswa', 'dosen', 'mata_kuliah'];

foreach ($sqlCreateTables as $index => $query) {
    if (mysqli_query($koneksi, $query)) {
        echo "[OK] Tabel '{$namaTabel[$index]}' berhasil dibuat atau sudah ada.\n";
    } else {
        // Modifikasi 2: Pesan error lebih detail dan hentikan proses
        echo "[ERROR] Gagal membuat tabel '{$namaTabel[$index]}'.\n";
        echo "        Kode Error : " . mysqli_errno($koneksi) . "\n";
        echo "        Pesan Error: " . mysqli_error($koneksi) . "\n";
        exit; // Hentikan script agar tidak error berantai
    }
}

echo "\n[SUKSES] Semua tabel berhasil disiapkan.\n";
mysqli_close($koneksi);
?>