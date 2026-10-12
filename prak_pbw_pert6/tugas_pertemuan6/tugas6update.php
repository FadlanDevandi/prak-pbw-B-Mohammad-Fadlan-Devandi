<?php
include "tugas6koneksi.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: tugas6index.php");
    exit;
}

$nim = $_POST['nim'] ?? '';
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$prodi = $_POST['prodi'] ?? '';
$angkatan = $_POST['angkatan'] ?? '';
$ipk = $_POST['ipk'] ?? '';

// Modifikasi 1: Validasi data
$daftarProdi = [
    'Teknik Informatika',
    'Teknik Industri',
    'Teknik Elektro',
    'Teknik Sipil',
    'Arsitektur'
];

if (
    $nim === '' ||
    $nama === '' ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    !in_array($prodi, $daftarProdi, true) ||
    !is_numeric($angkatan) ||
    (int)$angkatan < 2000 ||
    (int)$angkatan > 2030 ||
    !is_numeric($ipk) ||
    (float)$ipk < 0 ||
    (float)$ipk > 4
) {
    die("Data tidak valid. Periksa kembali formulir.");
}

// Modifikasi 2: Update menggunakan prepared statement
$angkatan = (int)$angkatan;
$ipk = (float)$ipk;

$stmt = mysqli_prepare(
    $koneksi,
    "UPDATE mahasiswa
     SET nama = ?, email = ?, prodi = ?, angkatan = ?, ipk = ?
     WHERE nim = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "sssids",
    $nama,
    $email,
    $prodi,
    $angkatan,
    $ipk,
    $nim
);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>
        alert('Data mahasiswa berhasil diperbarui!');
        window.location.href = 'tugas6index.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal memperbarui data: " . addslashes(mysqli_stmt_error($stmt)) . "');
        window.history.back();
    </script>";
}

mysqli_stmt_close($stmt);
?>