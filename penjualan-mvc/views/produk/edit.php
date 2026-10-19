<h2>Edit Produk</h2>

<form method="POST" action="index.php?aksi=edit&id=<?= $produk['id']; ?>">
    Nama Produk:
    <input type="text" name="nama_produk"
        value="<?= $produk['nama_produk']; ?>" required>
    <br><br>

    Harga:
    <input type="number" name="harga"
        value="<?= $produk['harga']; ?>" required>
    <br><br>

    Stok:
    <input type="number" name="stok"
        value="<?= $produk['stok']; ?>" required>
    <br><br>

    <button type="submit" name="update">Update</button>
    <a href="index.php">Kembali</a>
</form>