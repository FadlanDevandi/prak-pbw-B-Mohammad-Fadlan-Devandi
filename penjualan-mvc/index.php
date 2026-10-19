<?php
include "koneksi.php";
include "controllers/ProdukController.php";

$controller = new ProdukController($koneksi);
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'index';

switch ($aksi) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'hapus':
        $controller->hapus();
        break;
    default:
        $controller->index();
}
?>