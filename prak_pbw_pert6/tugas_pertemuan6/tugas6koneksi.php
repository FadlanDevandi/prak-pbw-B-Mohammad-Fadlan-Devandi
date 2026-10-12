<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';
$dbname = 'akademik';

// Modifikasi 1: Validasi koneksi database
$koneksi = @mysqli_connect($host, $user, $password, $dbname);

if (!$koneksi) {
    die("
        <div style='font-family: Arial; margin: 30px; padding: 20px;
                    border: 1px solid #dc2626; border-radius: 8px;
                    background: #fef2f2; color: #991b1b;'>
            <h2>Koneksi Database Gagal!</h2>
            <p>Database tidak dapat dihubungkan.</p>
            <p>Detail: " . htmlspecialchars(mysqli_connect_error()) . "</p>
        </div>
    ");
}

// Modifikasi 2: Mengatur karakter UTF-8
if (!mysqli_set_charset($koneksi, "utf8mb4")) {
    die("Gagal mengatur karakter database.");
}

// Modifikasi 3: Menampilkan status koneksi
echo "
<div style='font-family: Arial; margin: 30px; padding: 20px;
            border: 1px solid #16a34a; border-radius: 8px;
            background: #f0fdf4; color: #166534;'>
    <h2>Koneksi Database Berhasil!</h2>
    <p>Database: " . htmlspecialchars($dbname) . "</p>
    <p>Server: " . htmlspecialchars($host) . "</p>
    <p>Karakter: UTF-8 (utf8mb4)</p>
</div>
";
?>
