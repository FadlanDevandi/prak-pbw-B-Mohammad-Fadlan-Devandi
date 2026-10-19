<?php
include "models/ProdukModel.php";
class ProdukController {
    private $model;
    private $koneksi;
    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
        $this->model = new ProdukModel($koneksi);
    }
    public function index() {
        $dataProduk = $this->model->getAllProduk();
        include "views/produk/index.php";
    }
    public function create() {
        if (isset($_POST['simpan'])) {
            $nama = mysqli_real_escape_string($this->koneksi, $_POST['nama_produk']);
            $harga = (int) $_POST['harga'];
            $stok = (int) $_POST['stok'];
            $this->model->tambahProduk($nama, $harga, $stok);
            header("Location: index.php");
            exit;
        }
        include "views/produk/create.php";
    }
    public function edit() {
        $id = (int) $_GET['id'];
        if (isset($_POST['update'])) {
            $nama = mysqli_real_escape_string($this->koneksi, $_POST['nama_produk']);
            $harga = (int) $_POST['harga'];
            $stok = (int) $_POST['stok'];
            $this->model->updateProduk($id, $nama, $harga, $stok);
            header("Location: index.php");
            exit;
        }
        $produk = $this->model->getProdukById($id);
        include "views/produk/edit.php";
    }
    public function hapus() {
        $id = (int) $_GET['id'];
        $this->model->hapusProduk($id);
        header("Location: index.php");
        exit;
    }
}
?>