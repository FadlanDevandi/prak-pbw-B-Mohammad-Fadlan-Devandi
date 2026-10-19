<h2>Tambah Produk</h2>

<form method="POST" action="index.php?aksi=create">
    Nama Produk:
    <input type="text" name="nama_produk" required>
    <br><br>

    Harga:
    <input type="number" name="harga" required>
    <br><br>

    Stok:
    <input type="number" name="stok" required>
    <br><br>

    <button type="submit" name="simpan">Simpan</button>
    <a href="index.php">Kembali</a>
</form>