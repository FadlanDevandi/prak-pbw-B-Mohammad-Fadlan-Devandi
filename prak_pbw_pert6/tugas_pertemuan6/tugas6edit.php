<?php
include "tugas6koneksi.php";

$nim = $_GET['nim'] ?? '';

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT * FROM mahasiswa WHERE nim = ?"
);

mysqli_stmt_bind_param($stmt, "s", $nim);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data mahasiswa tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Ubah Data Mahasiswa</title>
</head>
<body class="bg-gray-50 p-6 font-sans text-gray-800">

    <form action="tugas6update.php" method="POST"
        class="max-w-sm mx-auto bg-white p-6 rounded-lg shadow-md flex flex-col">

        <h2 class="text-2xl font-bold mb-4">
            Ubah Data <?= htmlspecialchars($data['nim']); ?>
        </h2>

        <label for="nim" class="text-sm font-semibold mb-1">NIM:</label>
        <input type="text" id="nim" name="nim"
            value="<?= htmlspecialchars($data['nim']); ?>"
            readonly required
            class="mb-4 p-2 border border-gray-300 rounded bg-gray-100">

        <label for="nama" class="text-sm font-semibold mb-1">Nama:</label>
        <input type="text" id="nama" name="nama"
            value="<?= htmlspecialchars($data['nama']); ?>" required
            class="mb-4 p-2 border border-gray-300 rounded">

        <label for="email" class="text-sm font-semibold mb-1">Email:</label>
        <input type="email" id="email" name="email"
            value="<?= htmlspecialchars($data['email']); ?>" required
            class="mb-4 p-2 border border-gray-300 rounded">

        <label for="prodi" class="text-sm font-semibold mb-1">Prodi:</label>
        <select id="prodi" name="prodi" required
            class="mb-4 p-2 border border-gray-300 rounded">

            <option value="Teknik Informatika"
                <?= $data['prodi'] == 'Teknik Informatika' ? 'selected' : ''; ?>>
                Teknik Informatika
            </option>

            <option value="Teknik Industri"
                <?= $data['prodi'] == 'Teknik Industri' ? 'selected' : ''; ?>>
                Teknik Industri
            </option>

            <option value="Teknik Elektro"
                <?= $data['prodi'] == 'Teknik Elektro' ? 'selected' : ''; ?>>
                Teknik Elektro
            </option>

            <option value="Teknik Sipil"
                <?= $data['prodi'] == 'Teknik Sipil' ? 'selected' : ''; ?>>
                Teknik Sipil
            </option>

            <option value="Arsitektur"
                <?= $data['prodi'] == 'Arsitektur' ? 'selected' : ''; ?>>
                Arsitektur
            </option>
        </select>

        <label for="angkatan" class="text-sm font-semibold mb-1">Angkatan:</label>
        <input type="number" id="angkatan" name="angkatan"
            min="2000" max="2030"
            value="<?= htmlspecialchars($data['angkatan']); ?>" required
            class="mb-4 p-2 border border-gray-300 rounded">

        <label for="ipk" class="text-sm font-semibold mb-1">IPK:</label>
        <input type="number" id="ipk" name="ipk"
            value="<?= htmlspecialchars($data['ipk']); ?>"
            min="0" max="4" step="0.01" required
            class="mb-6 p-2 border border-gray-300 rounded">

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded">
            Simpan Perubahan
        </button>

        <a href="tugas6index.php"
            class="text-center text-blue-600 mt-4 hover:underline">
            Batal
        </a>
    </form>

</body>
</html>