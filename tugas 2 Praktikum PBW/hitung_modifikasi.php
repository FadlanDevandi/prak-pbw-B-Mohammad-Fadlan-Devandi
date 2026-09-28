<?php
// hitung_modifikasi.php

interface BisaDihitung
{
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung
{
    public function __construct(
        protected string $nama,
        protected float $harga
    ) {}

    public function hargaAkhir(): float
    {
        return $this->harga;
    }

    public function getNama(): string
    {
        return $this->nama;
    }
}

class ProdukDiskon extends Produk
{
    public function __construct(
        string $nama,
        float $harga,
        private float $diskon
    ) {
        parent::__construct($nama, $harga);
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 - $this->diskon / 100);
    }
}

$daftar = [
    new Produk('Keyboard', 250000),

    // MODIFIKASI 2
    new ProdukDiskon('Mouse', 200000, 10),

    // MODIFIKASI 1 
    // Menambahkan produk baru yaitu Headset
    // Harga Rp300.000 dengan diskon 10%
    new ProdukDiskon('Headset', 300000, 10)
];

foreach ($daftar as $produk) {
    echo $produk->getNama() . ' Rp. ' .
        number_format(
            $produk->hargaAkhir(),
            0,
            ',',
            '.'
        ) . '<br>';
}
?>