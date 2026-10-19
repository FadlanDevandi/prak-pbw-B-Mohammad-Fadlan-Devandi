<h2>Data Produk</h2>
<a href="index.php?aksi=create">Tambah Produk</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
    <?php while ($produk = mysqli_fetch_assoc($dataProduk)) { ?>
    <tr>
        <td><?= $produk['id']; ?></td>
        <td><?= $produk['nama_produk']; ?></td>
        <td><?= $produk['harga']; ?></td>
        <td><?= $produk['stok']; ?></td>
        <td>
            <a href="index.php?aksi=edit&id=<?= $produk['id']; ?>">Edit</a>
            <a href="index.php?aksi=hapus&id=<?= $produk['id']; ?>">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>