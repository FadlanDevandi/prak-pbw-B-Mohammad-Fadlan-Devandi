<?php
require_once 'koneksi.php';

mysqli_select_db($koneksi, 'akademik');

$sqlInsert = "INSERT IGNORE INTO mahasiswa (nim, nama, email, prodi, angkatan, ipk) VALUES
('2026001','Andi Pratama','andi@kampus.ac.id','Teknik Informatika',2026,3.75),
('2026002','Siti Rahma','siti@kampus.ac.id','Sistem Informasi',2026,3.82),
('2025003','Budi Santoso','budi@kampus.ac.id','Teknik Informatika',2025,3.20)";

if (mysqli_query($koneksi, $sqlInsert)) {
    echo "[INSERT] Data mahasiswa berhasil dimasukkan ke tabel.\n\n";
} else {
    echo "[ERROR] Gagal memasukkan data: " . mysqli_error($koneksi) . "\n\n";
}


$sqlSelect = "SELECT nim, nama, prodi, ipk
              FROM mahasiswa
              WHERE ipk >= 3.50
              ORDER BY ipk DESC, nama ASC
              LIMIT 10";

$result = mysqli_query($koneksi, $sqlSelect);


echo "--- HASIL QUERY SELECT ---\n";
// Cek apakah ada data yang memenuhi kriteria (IPK >= 3.50)
if (mysqli_num_rows($result) > 0) {
    // Karena menggunakan LIMIT 1, loop ini hanya akan berjalan 1 kali (menampilkan Siti Rahma)
    while ($row = mysqli_fetch_assoc($result)) {
        echo "NIM : " . $row['nim'] . "\n";
        echo "Nama : " . $row['nama'] . "\n";
        echo "Prodi: " . $row['prodi'] . "\n";
        echo "IPK : " . $row['ipk'] . "\n";
    }
} else {
    echo "Tidak ada data mahasiswa dengan kriteria tersebut.\n";
}

mysqli_close($koneksi);

?>

<?php
require_once 'koneksi.php';

// Memilih database
mysqli_select_db($koneksi, 'akademik');

// ========================================
// 1. UPDATE: Mengubah data IPK
// ========================================
echo "=== 1. PROSES UPDATE DATA ===\n";
$sqlUpdate = "UPDATE mahasiswa SET ipk = 3.40 WHERE nim = '2025003'";
if (mysqli_query($koneksi, $sqlUpdate)) {
    echo "Data IPK mahasiswa dengan NIM 2025003 berhasil diubah menjadi 3.40.\n\n";
} else {
    echo "Gagal UPDATE: " . mysqli_error($koneksi) . "\n\n";
}

// ========================================
// 2. SELECT & GROUP BY: Rekap jumlah mahasiswa per prodi
// ========================================
echo "=== 2. REKAP MAHASISWA PER PRODI ===\n";
$sqlRekap = "SELECT prodi, COUNT(*) AS jumlah, ROUND(AVG(ipk),2) AS
rata_ipk
             FROM mahasiswa
             GROUP BY prodi
             ORDER BY jumlah DESC";

$resultRekap = mysqli_query($koneksi, $sqlRekap);

if (mysqli_num_rows($resultRekap) > 0) {
    while ($row = mysqli_fetch_assoc($resultRekap)) {
        echo "Prodi        : " . $row['prodi'] . "\n";
        echo "Jumlah       : " . $row['jumlah'] . " Mahasiswa\n";
        echo "Rata-rata IPK : " . $row['rata_ipk'] . "\n";
        echo "-----------------------------\n";
    }
} else {
    echo "Belum ada data rekap prodi.\n";
}
echo "\n";

// ========================================
// 3. SELECT: Verifikasi sebelum penghapusan
// ========================================
echo "=== 3. VERIFIKASI DATA (NIM 2025003) ===\n";
$sqlVerifikasi = "SELECT * FROM mahasiswa WHERE nim =
'2025003'";
$resultVerifikasi = mysqli_query($koneksi,
$sqlVerifikasi);

// Cek apakah data yang mau dihapus benar-benar ada
if (mysqli_num_rows($resultVerifikasi) > 0) {
    $row = mysqli_fetch_assoc($resultVerifikasi);
    echo "Data Ditemukan!\n";
    echo "NIM  : " . $row['nim'] . "\n";
    echo "Nama : " . $row['nama'] . "\n";
    echo "IPK  : " . $row['ipk'] . "\n";

// ========================================
// 4. DELETE: Menghapus data
// ========================================
echo "=== 4. PROSES HAPUS DATA ===\n";
$sqlDelete = "DELETE FROM mahasiswa WHERE nim = '2025003'";
if (mysqli_query($koneksi, $sqlDelete)) {
    echo "[SUKSES] Data mahasiswa dengan NIM 2025003 berhasil dihapus dari database.\n";
} else {
    echo "[ERROR] Gagal menghapus data: " . mysqli_error($koneksi) . "\n";
}

} else {
    echo "Data mahasiswa dengan NIM 2025003 TIDAK DITEMUKAN (Mungkin sudah terhapus sebelumnya).\n";
}

mysqli_close($koneksi);
?>