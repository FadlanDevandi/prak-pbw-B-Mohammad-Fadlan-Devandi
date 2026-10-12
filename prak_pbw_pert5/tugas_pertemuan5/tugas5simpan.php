<?php
include "../koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$prodi = $_POST['prodi'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$angkatan = $_POST['angkatan'];
$ipk = $_POST['ipk'];

// Modifikasi 1: Validasi IPK
if (!is_numeric($ipk) || $ipk < 0 || $ipk > 4) {
    die("IPK harus berada di antara 0 dan 4");
}

// Modifikasi 2: Pengecekan NIM duplikat
$cek = mysqli_query(
    $koneksi,
    "SELECT nim FROM mahasiswa WHERE nim='$nim'"
);

if (mysqli_num_rows($cek) > 0) {
    die("NIM sudah terdaftar! Silakan gunakan NIM lain.");
}

$query = mysqli_query(
    $koneksi,
    "INSERT INTO mahasiswa
    (nim, nama, email, prodi, jenis_kelamin, angkatan, ipk)
    VALUES
    ('$nim', '$nama', '$email', '$prodi', '$jenis_kelamin', '$angkatan', '$ipk')"
);

if ($query) {
    echo "Data berhasil disimpan";
} else {
    echo "Data gagal disimpan";
}
?>
