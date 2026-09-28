<?php
// biodata_modifikasi.php
function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}


// MODIFIKASI 2
function statusMahasiswa(int $semester): string
{
    if ($semester <= 2) {
        return 'Mahasiswa Baru';
    }

    if ($semester <= 6) {
        return 'Mahasiswa Aktif';
    }

    return 'Mahasiswa Tingkat Akhir';
}


$mahasiswa = [
    'nim' => '4523210065',
    'nama' => 'Mohammad Fadlan Devandi',
    'prodi' => 'Teknik Informatika',
    'semester' => 7,

    // MODIFIKASI 1
    'email' => 'fadlandevandi@gmail.com',

    'ipk' => 3.39,
];

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata</title>
</head>

<body>

    <h1>Biodata Mahasiswa</h1>

    <ul>

        <?php foreach ($mahasiswa as $kunci => $nilai): ?>

            <li>
                <?= ucfirst($kunci) ?>:
                <?= htmlspecialchars((string)$nilai) ?>
            </li>

        <?php endforeach; ?>

    </ul>

    <p>
        Predikat:
        <?= statusKelulusan($mahasiswa['ipk']) ?>
    </p>


    <!-- MODIFIKASI 2 -->

    <p>
        Status Mahasiswa:
        <?= statusMahasiswa($mahasiswa['semester']) ?>
    </p>

</body>

</html>