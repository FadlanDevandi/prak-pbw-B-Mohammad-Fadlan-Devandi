<form action="tugas5simpan.php" method="post">
    NIM:
    <input type="text" name="nim" required>
    <br><br>

    Nama:
    <input type="text" name="nama" required>
    <br><br>

    Email:
    <input type="email" name="email" required>
    <br><br>

    Prodi:
    <select name="prodi" required>
    <option value="">-- Pilih Program Studi --</option>
    <option value="Teknik Informatika">Teknik Informatika</option>
    <option value="Teknik Industri">Teknik Industri</option>
    <option value="Teknik Elektro">Teknik Elektro</option>
    <option value="Arsitektur">Arsitektur</option>
    <option value="Teknik Sipil">Teknik Sipil</option>
    </select>
    <br><br>

    Jenis Kelamin:
    <select name="jenis_kelamin" required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
    <br><br>

    Angkatan:
    <input type="number" name="angkatan" required>
    <br><br>

    IPK:
    <input type="number" step="0.01" min="0" max="4"
           name="ipk" required>
    <br><br>

    <button type="submit">Simpan</button>
</form>
