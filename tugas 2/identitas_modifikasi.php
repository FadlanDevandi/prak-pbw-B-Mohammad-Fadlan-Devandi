<?php
// identitas_modifikasi.php
interface Identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;
    private string $prodi;
    private float $ipk;

    public function __construct(
        string $nim,
        string $nama,
        string $prodi,
        float $ipk
    ) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException(
                'IPK harus 0 sampai 4.'
            );
        }

        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    // MODIFIKASI 2
    public function predikat(): string
    {
        if ($this->ipk >= 3.50) {
            return 'Sangat Memuaskan';
        }

        if ($this->ipk >= 3.00) {
            return 'Memuaskan';
        }

        return 'Perlu Peningkatan';
    }

    public function ringkasan(): string
    {
        return $this->nim . ' - ' .
               $this->nama . ' - ' .
               $this->prodi . ' - IPK: ' .
               $this->ipk;
    }
}

// MODIFIKASI 1
$mhs = new Mahasiswa(
    '4523210065',
    'Mohammad Fadlan Devandi',
    'Teknik Informatika',
    3.39
);

echo $mhs->ringkasan();
echo '<br>';
echo 'Predikat: ' . $mhs->predikat();