<?php
include "tugas6koneksi.php";

// Modifikasi 1: Validasi parameter NIM
$nim = $_GET['nim'] ?? '';

if ($nim === '') {
    die("NIM tidak ditemukan.");
}

// Modifikasi 2: Menghapus dengan prepared statement
$stmt = mysqli_prepare(
    $koneksi,
    "DELETE FROM mahasiswa WHERE nim = ?"
);

mysqli_stmt_bind_param($stmt, "s", $nim);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "<script>
        alert('Data mahasiswa berhasil dihapus');
        window.location.href = 'tugas6index.php';
    </script>";
} else {
    echo "<script>
        alert('Data tidak ditemukan atau gagal dihapus');
        window.location.href = 'tugas6index.php';
    </script>";
}

mysqli_stmt_close($stmt);
?>