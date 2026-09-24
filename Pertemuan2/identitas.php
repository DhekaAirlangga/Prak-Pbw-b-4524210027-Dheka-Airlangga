<?php
interface Identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;

    private string $jurusan; 
    protected float $ipk;

    public function __construct(string $nim, string $nama, string $jurusan, float $ipk)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->jurusan = $jurusan;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('IPK harus 0 sampai 4.');
        }
        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function getPredikat(): string
    {
        if ($this->ipk >= 3.51) return 'Cumlaude';
        if ($this->ipk >= 3.00) return 'Sangat Memuaskan';
        if ($this->ipk >= 2.76) return 'Memuaskan';
        return 'Cukup';
    }

    public function ringkasan(): string
    {
        return "NIM: {$this->nim} | Nama: {$this->nama} | Jurusan: {$this->jurusan} | IPK: {$this->ipk} ({$this->getPredikat()})";
    }
}

$mhs = new Mahasiswa('4524210027', 'Dheka Airlangga', 'Teknik Informatika', 3.75);

echo $mhs->ringkasan();
?>