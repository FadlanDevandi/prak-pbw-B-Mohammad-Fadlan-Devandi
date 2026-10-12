<?php
include "tugas6koneksi.php";

// Modifikasi 1: Mengurutkan data berdasarkan nama
$query = mysqli_query(
    $koneksi,
    "SELECT * FROM mahasiswa ORDER BY nama ASC"
);

if (!$query) {
    die("Gagal mengambil data mahasiswa.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Data Mahasiswa</title>
</head>
<body class="bg-gray-50 p-6 font-sans text-gray-800">

    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Data Mahasiswa</h2>

        <a href="tugas6create.php"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded mb-4">
            + Tambah Mahasiswa
        </a>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-200 p-3">NIM</th>
                        <th class="border border-gray-200 p-3">Nama</th>
                        <th class="border border-gray-200 p-3">Email</th>
                        <th class="border border-gray-200 p-3">Prodi</th>
                        <th class="border border-gray-200 p-3">Angkatan</th>
                        <th class="border border-gray-200 p-3">IPK</th>
                        <th class="border border-gray-200 p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border border-gray-200 p-3">
                            <?= htmlspecialchars($data['nim']); ?>
                        </td>
                        <td class="border border-gray-200 p-3">
                            <?= htmlspecialchars($data['nama']); ?>
                        </td>
                        <td class="border border-gray-200 p-3">
                            <?= htmlspecialchars($data['email']); ?>
                        </td>
                        <td class="border border-gray-200 p-3">
                            <?= htmlspecialchars($data['prodi']); ?>
                        </td>
                        <td class="border border-gray-200 p-3">
                            <?= htmlspecialchars($data['angkatan']); ?>
                        </td>
                        <td class="border border-gray-200 p-3">
                            <?= htmlspecialchars($data['ipk']); ?>
                        </td>
                        <td class="border border-gray-200 p-3 text-center">
                            <a href="tugas6edit.php?nim=<?= urlencode($data['nim']); ?>"
                                class="text-blue-600 hover:underline font-medium">
                                Edit
                            </a>

                            <span class="mx-1 text-gray-300">|</span>

                            <a href="tugas6delete.php?nim=<?= urlencode($data['nim']); ?>"
                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                class="text-red-600 hover:underline font-medium">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>

                    <?php if (mysqli_num_rows($query) === 0) { ?>
                    <tr>
                        <td colspan="7" class="border p-4 text-center text-gray-500">
                            Belum ada data mahasiswa.
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>