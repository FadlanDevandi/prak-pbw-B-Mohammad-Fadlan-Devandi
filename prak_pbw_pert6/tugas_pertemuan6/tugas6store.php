<?php
include "tugas6koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = trim($_POST['nim'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $prodi = $_POST['prodi'] ?? '';
    $angkatan = $_POST['angkatan'] ?? '';
    $ipk = $_POST['ipk'] ?? '';

    // Modifikasi 1: Validasi data
    if (
        $nim === '' ||
        $nama === '' ||
        !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        !in_array($prodi, [
            'Teknik Informatika',
            'Teknik Industri',
            'Teknik Elektro',
            'Teknik Sipil',
            'Arsitektur'
        ], true) ||
        !is_numeric($angkatan) ||
        (int)$angkatan < 2000 ||
        (int)$angkatan > 2030 ||
        !is_numeric($ipk) ||
        (float)$ipk < 0 ||
        (float)$ipk > 4
    ) {
        die("Data tidak valid. Periksa kembali formulir.");
    }

    // Modifikasi 2: Memeriksa NIM duplikat
    $cek = mysqli_prepare(
        $koneksi,
        "SELECT nim FROM mahasiswa WHERE nim = ?"
    );

    mysqli_stmt_bind_param($cek, "s", $nim);
    mysqli_stmt_execute($cek);
    mysqli_stmt_store_result($cek);

    if (mysqli_stmt_num_rows($cek) > 0) {
        mysqli_stmt_close($cek);
        die("NIM sudah terdaftar. Gunakan NIM lain.");
    }

    mysqli_stmt_close($cek);

    $angkatan = (int)$angkatan;
    $ipk = (float)$ipk;

    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO mahasiswa
        (nim, nama, email, prodi, angkatan, ipk)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssssid",
        $nim,
        $nama,
        $email,
        $prodi,
        $angkatan,
        $ipk
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
            alert('Data mahasiswa berhasil disimpan');
            window.location.href = 'tugas6index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal disimpan');
            window.history.back();
        </script>";
    }

    mysqli_stmt_close($stmt);
} else {
    header("Location: tugas6create.php");
    exit;
}
?>